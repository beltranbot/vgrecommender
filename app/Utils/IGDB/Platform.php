<?php

namespace App\Utils\IGDB;

use Exception;
use Illuminate\Support\Facades\Log;
use MarcReichel\IGDBLaravel\Models\Platform as ModelsPlatform;
use MarcReichel\IGDBLaravel\Builder;

class Platform
{
    // private ModelsPlatform $platforms;
    private static Builder $platforms;

    public static function get(
        $fields = ["*"],
        $orderBy = null,
        $dir = "asc",
        $skip = 0,
        $take = 500
    ) {
        self::$platforms = ModelsPlatform::select($fields);
        self::handlOrderBy($orderBy, $dir);
        self::handleSkip($skip);
        self::handleTake($take);
        return self::$platforms->get();
    }

    private static function handlOrderBy($orderBy, $dir)
    {
        if (is_null($orderBy)) {
            return;
        }
        if (!in_array($dir, ["asc", "desc"])) {
            throw new Exception("IGDB Platform dir is not valid");
        }
        self::$platforms->orderBy($orderBy, $dir);
    }

    private static function handleSkip(int $skip)
    {
        self::$platforms->skip($skip);
    }

    private static function handleTake(int $take)
    {
        self::$platforms->take($take);
    }
}
