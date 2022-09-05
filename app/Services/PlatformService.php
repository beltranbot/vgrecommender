<?php

namespace App\Services;

use App\Jobs\ProcessUpdatePlatforms;

class PlatformService
{
    public static function get()
    {
        ProcessUpdatePlatforms::dispatch();
        return true;
    }
}
