<?php

namespace App\Http\Controllers;

use App\Services\GameService;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $games = GameService::get();
        return response()->json($games, 200);
    }

    public function update()
    {
        $response = GameService::updateAll();
        return response()->json([
            "response" => $response
        ], 200);
    }
}
