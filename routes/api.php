<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\GameThemeController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\PlatformController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix("v1")->group(function () {
    Route::post("register", [AuthController::class, "register"])->name("register");
    Route::post("login", [AuthController::class, "login"])->name("login");
    Route::get("info", [AuthController::class, "info"])->name("info");

    Route::middleware("auth:sanctum")->group(function () {
        Route::get("platforms", [PlatformController::class, "index"])->name("platforms.index");
        Route::get("game-themes", [GameThemeController::class, "index"])->name("game-themes.index");

        Route::prefix("games")->group(function () {
            Route::get("/", [GameController::class, "index"])->name("games.index");
            Route::put("/", [GameController::class, "update"])->name("games.update");
        });

        Route::prefix("lists")->group(function () {
            Route::post("/", [ListController::class, "store"])->name("lists.store");
            Route::get("/{user}", [ListController::class, "index"])->name("lists.index");
            Route::put("/{list}", [ListController::class, "update"])->name("lists.update");
        });

    });

});
