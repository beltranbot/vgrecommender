<?php

namespace App\Http\Controllers;

use App\Services\GameThemeService;
use Illuminate\Http\Request;

class GameThemeController extends Controller
{
    public function index()
    {
        $gameThemes = GameThemeService::get();
        return response()->json([
            "game_themes" => $gameThemes,
        ], 200);
    }
}
