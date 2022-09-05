<?php

namespace App\Jobs;

use App\Models\Platform;
use App\Models\UpdateBacklog;
use App\Repositories\IGDB\PlatformRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ProcessUpdatePlatforms implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $skip = 0;
        $take = 500;
        $fetch_current_page = true;
        // fetch by backlog by model
        $backlog = UpdateBacklog::where("name", "platforms")->first();
        if ($backlog) {
            // if no model exist, start from zero
            $skip = intval($backlog->skip);
            $take = intval($backlog->take);
            $fetch_current_page = boolval($backlog->fetch_current_page);
        }
        if (!$fetch_current_page) {
            $skip += 500;
        }
        // query igdb to check if there are new entries
        $platforms = PlatformRepository::get(
            skip: $skip,
            take: $take
        );
        $upsert = [];
        foreach ($platforms as $platform) {
            // update entries
            $upsert[] = [
                "id" => $platform->id,
                "abbreviation" => $platform->abbreviation,
                "alternative_name" => $platform->alternative_name,
                "platform_category_id" => $platform->category,
                "name" => $platform->name,
                "slug" => $platform->slug,
            ];
        }
        Platform::upsert($upsert, ["id"], [
            "id", "abbreviation", "alternative_name",
            "platform_category_id", "name"
        ]);
        // after finalizing adding new entries, update the entry in the backlog
        Log::debug(([
            "platforms_count" => $platforms->count(),
            "platforms" => $platforms
        ]));
        UpdateBacklog::updateOrCreate(
            ["name" => "platforms"],
            [
                "skip" => $skip,
                "take" => $take,
                "entries" => $platforms->count(),
                "fetch_current_page" => ($platforms->count() !== 500)
            ]
        );
        // if there are more entries to update, register a new job
    }
}
