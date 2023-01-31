<?php

namespace App\Jobs;

use App\Models\Game;
use App\Models\GameGameGenre;
use App\Models\GameGameMode;
use App\Models\GameGameTheme;
use App\Models\GamePlatform;
use App\Models\UpdateBacklog;
use App\Repositories\IGDB\GameRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ProcessUpdateGames implements ShouldQueue
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
        $backlog = UpdateBacklog::where("name", "games")->first();
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
        $games = GameRepository::get(
            skip: $skip,
            take: $take
        );
        $upsertGames = [];
        $upsertGameModes = [];
        $upsertGameGenres = [];
        $upsertGamePlatforms = [];
        $upsertGameThemes = [];
        foreach ($games as $game) {
            // update entries
            $upsertGames[] = [
                "id" => $game->id,
                "game_category_id" => $game->category,
                "first_release_date" => $game->first_release_date,
                "game_status_id" => $game->status,
                "name" => $game->name,
                "slug" => $game->slug,
                "aggregated_rating" => $game->aggregated_rating,
                "aggregated_rating_count" => $game->aggregated_rating_count,
                "total_rating" => $game->total_rating,
                "total_rating_count" => $game->total_rating_count,
                "summary" => $game->summary
            ];
            if ($game->game_modes) {
                foreach ($game->game_modes as $mode) {
                    $upsertGameModes[] = [
                        "game_id" => $game->id,
                        "game_mode_id" => $mode
                    ];
                }
            }
            if ($game->genres) {
                foreach ($game->genres as $genre) {
                    $upsertGameGenres[] = [
                        "game_id" => $game->id,
                        "game_genre_id" => $genre
                    ];
                }
            }
            if ($game->platforms) {
                foreach ($game->platforms as $platform) {
                    $upsertGamePlatforms[] = [
                        "game_id" => $game->id,
                        "platform_id" => $platform
                    ];
                }
            }
            if ($game->themes) {
                foreach ($game->themes as $theme) {
                    $upsertGameThemes[] = [
                        "game_id" => $game->id,
                        "game_theme_id" => $theme
                    ];
                }
            }
        }
        Game::upsert($upsertGames, ["id"], [
            "id",
            "game_category_id",
            "first_release_date",
            "game_status_id",
            "name",
            "slug",
            "aggregated_rating",
            "aggregated_rating_count",
            "total_rating",
            "total_rating_count",
        ]);
        GameGameMode::upsert(
            $upsertGameModes,
            ["game_id", "game_mode_id"],
            ["game_id", "game_mode_id"]
        );
        GameGameGenre::upsert(
            $upsertGameGenres,
            ["game_id", "game_genre_id"],
            ["game_id", "game_genre_id"]
        );
        GamePlatform::upsert(
            $upsertGamePlatforms,
            ["game_id", "platform_id"],
            ["game_id", "platform_id"]
        );
        GameGameTheme::upsert(
            $upsertGameThemes,
            ["game_id", "game_theme_id"],
            ["game_id", "game_theme_id"]
        );

        // after finalizing adding new entries, update the entry in the backlog
        UpdateBacklog::updateOrCreate(
            ["name" => "games"],
            [
                "skip" => $skip,
                "take" => $take,
                "entries" => $games->count(),
                "fetch_current_page" => ($games->count() !== 500)
            ]
        );
        if ($games->count() === 500) {
            ProcessUpdateGames::dispatch();
        }
        // if there are more entries to update, register a new job
    }
}
