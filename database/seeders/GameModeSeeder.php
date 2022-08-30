<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameModeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("game_modes")->insert([
            "id" => 1,
            "name" => "Single player",
            "slug" => "single-player",
        ]);
        DB::table("game_modes")->insert([
            "id" => 2,
            "name" => "Multiplayer",
            "slug" => "multiplayer",
        ]);
        DB::table("game_modes")->insert([
            "id" => 3,
            "name" => "Co-operative",
            "slug" => "co-operative",
        ]);
        DB::table("game_modes")->insert([
            "id" => 4,
            "name" => "Split screen",
            "slug" => "split-screen",
        ]);
        DB::table("game_modes")->insert([
            "id" => 5,
            "name" => "Massively Multiplayer Online (MMO)",
            "slug" => "massively-multiplayer-o])nline-mmo",
        ]);
        DB::table("game_modes")->insert([
            "id" => 6,
            "name" => "Battle Royale",
            "slug" => "battle-royale",
        ]);
    }
}
