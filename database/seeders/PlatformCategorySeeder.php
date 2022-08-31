<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlatformCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("platform_categories")->insert([
            "name" => "console",
            "id" => 1
        ]);
        DB::table("platform_categories")->insert([
            "name" => "arcade",
            "id" => 2
        ]);
        DB::table("platform_categories")->insert([
            "name" => "platform",
            "id" => 3
        ]);
        DB::table("platform_categories")->insert([
            "name" => "operating_system",
            "id" => 4
        ]);
        DB::table("platform_categories")->insert([
            "name" => "portable_console",
            "id" => 5
        ]);
        DB::table("platform_categories")->insert([
            "name" => "computer",
            "id" => 6
        ]);
    }
}
