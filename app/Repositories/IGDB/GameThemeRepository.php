<?php

namespace App\Repositories\IGDB;

use App\Utils\IGDB\Client;
use MarcReichel\IGDBLaravel\Models\Theme;

class GameThemeRepository
{
    public static function get($skip = 0, $take = 500)
    {
        $fields = [
            "id",
            "name",
            "slug"
        ];
        $orderBy = "id";
        $platforms = Client::get(
            class: Theme::class,
            fields: $fields,
            orderBy: $orderBy,
            skip: $skip,
            take: $take
        );
        return $platforms;
    }
}
