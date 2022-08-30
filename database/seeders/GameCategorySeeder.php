<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("game_categories")->insert([
            "id" => 0,
            "name" => "main_game",
        ]);
        DB::table("game_categories")->insert([
            "id" => 1,
            "name" => "dlc_addon",
        ]);
        DB::table("game_categories")->insert([
            "id" => 2,
            "name" => "expansion",
        ]);
        DB::table("game_categories")->insert([
            "id" => 3,
            "name" => "bundle",
        ]);
        DB::table("game_categories")->insert([
            "name" => "standalone_expansion",
            "id" => 4,
        ]);
        DB::table("game_categories")->insert([
            "name" => "mod",
            "id" => 5,
        ]);
        DB::table("game_categories")->insert([
            "name" => "episode",
            "id" => 6,
        ]);
        DB::table("game_categories")->insert([
            "name" => "season",
            "id" => 7,
        ]);
        DB::table("game_categories")->insert([
            "name" => "remake",
            "id" => 8,
        ]);
        DB::table("game_categories")->insert([
            "name" => "remaster",
            "id" => 9,
        ]);
        DB::table("game_categories")->insert([
            "name" => "expanded_game",
            "id" => 10,
        ]);
        DB::table("game_categories")->insert([
            "name" => "port",
            "id" => 11,
        ]);
        DB::table("game_categories")->insert([
            "name" => "fork",
            "id" => 12,
        ]);
    }
}
