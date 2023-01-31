<?php

namespace App\Repositories\IGDB;

use App\Utils\IGDB\Client;
use MarcReichel\IGDBLaravel\Models\Game;

class GameRepository
{
    public static function get($skip = 0, $take = 500)
    {
        $fields = [
            "id",
            "category", #
            "game_modes",
            "first_release_date",
            "status", #
            "genres",
            "platforms",
            "name",
            "slug",
            "status",
            "themes",
            "aggregated_rating",
            "aggregated_rating_count",
            "total_rating",
            "total_rating_count",
            "summary"
        ];
        $orderBy = "id";
        $games = Client::get(
            class: Game::class,
            fields: $fields,
            orderBy: $orderBy,
            skip: $skip,
            take: $take
        );
        return $games;
    }
}
