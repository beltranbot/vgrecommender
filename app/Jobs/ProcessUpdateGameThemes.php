<?php

namespace App\Jobs;

use App\Models\GameTheme;
use App\Models\UpdateBacklog;
use App\Repositories\IGDB\GameThemeRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ProcessUpdateGameThemes implements ShouldQueue
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
        $backlog = UpdateBacklog::where("name", "game_themes")->first();
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
        $gameThemes = GameThemeRepository::get(
            skip: $skip,
            take: $take
        );
        $upsert = [];
        foreach ($gameThemes as $gameTheme) {
            // update entries
            $upsert[] = [
                "id" => $gameTheme->id,
                "name" => $gameTheme->name,
                "slug" => $gameTheme->slug,
            ];
        }
        GameTheme::upsert($upsert, ["id"], [
            "name", "slug"
        ]);
        // after finalizing adding new entries, update the entry in the backlog
        UpdateBacklog::updateOrCreate(
            ["name" => "game_themes"],
            [
                "skip" => $skip,
                "take" => $take,
                "entries" => $gameThemes->count(),
                "fetch_current_page" => ($gameThemes->count() !== 500)
            ]
        );
        // if there are more entries to update, register a new job
    }
}
