<?php

namespace App\Utils\IGDB;

use Exception;
use MarcReichel\IGDBLaravel\Builder;

class Client
{
    private static Builder $builder;

    public static function get(
        $class = null,
        $fields = ["*"],
        $orderBy = null,
        $dir = "asc",
        $skip = 0,
        $take = 500
    ) {
        if (!$class) {
            throw new Exception("Class is not valid");
        }
        self::$builder = $class::select($fields);
        self::handlOrderBy($orderBy, $dir);
        self::handleSkip($skip);
        self::handleTake($take);
        return self::$builder->get();
    }

    private static function handlOrderBy($orderBy, $dir)
    {
        if (is_null($orderBy)) {
            return;
        }
        if (!in_array($dir, ["asc", "desc"])) {
            throw new Exception("IGDB Platform dir is not valid");
        }
        self::$builder->orderBy($orderBy, $dir);
    }

    private static function handleSkip(int $skip)
    {
        self::$builder->skip($skip);
    }

    private static function handleTake(int $take)
    {
        self::$builder->take($take);
    }
}
