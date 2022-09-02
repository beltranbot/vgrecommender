<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("game_statuses")->insert([]);
        DB::table("game_statuses")->insert([
            "name" => "released",
            "id" => 0
        ]);
        DB::table("game_statuses")->insert([
            "name" => "alpha",
            "id" => 2
        ]);
        DB::table("game_statuses")->insert([
            "name" => "beta",
            "id" => 3
        ]);
        DB::table("game_statuses")->insert([
            "name" => "early_access",
            "id" => 4
        ]);
        DB::table("game_statuses")->insert([
            "name" => "offline",
            "id" => 5
        ]);
        DB::table("game_statuses")->insert([
            "name" => "cancelled",
            "id" => 6
        ]);
        DB::table("game_statuses")->insert([
            "name" => "rumored",
            "id" => 7
        ]);
        DB::table("game_statuses")->insert([
            "name" => "delisted",
            "id" => 8
        ]);
    }
}
