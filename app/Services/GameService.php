<?php

namespace App\Services;

use App\Jobs\ProcessUpdateGames;
use App\Repositories\IGDB\GameRepository;

class GameService
{
    public static function get()
    {
        $games = GameRepository::get();
        return $games;
    }

    public static function updateAll()
    {
        ProcessUpdateGames::dispatch();
        return true;
    }
}