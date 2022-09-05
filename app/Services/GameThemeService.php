<?php

namespace App\Services;

use App\Jobs\ProcessUpdateGameThemes;

class GameThemeService
{
    public static function get()
    {
        ProcessUpdateGameThemes::dispatch();
        return true;
    }
}
