<?php

namespace App\Http\Controllers;

use App\Services\PlatformService;
use Illuminate\Http\Request;

class PlatformController extends Controller
{
    public function index()
    {
        $platforms = PlatformService::get();
        return response()->json([
            "platforms" => $platforms,
        ], 200);
        // return response()->json([
        //     "message" => "hello world"
        // ]);
    }
}
