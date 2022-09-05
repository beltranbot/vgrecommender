<?php

namespace App\Repositories\IGDB;

use App\Utils\IGDB\Client;
use MarcReichel\IGDBLaravel\Models\Platform;

class PlatformRepository
{
    public static function get($skip = 0, $take = 500)
    {
        $fields = [
            "id",
            "abbreviation",
            "alternative_name",
            "category",
            "name",
            "slug"
        ];
        $orderBy = "id";
        $platforms = Client::get(
            class: Platform::class,
            fields: $fields,
            orderBy: $orderBy,
            skip: $skip,
            take: $take
        );
        return $platforms;
    }
}
