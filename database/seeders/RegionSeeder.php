<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("regions")->insert([
            "id" => 1,
            "name" => "europe"
        ]);
        DB::table("regions")->insert([
            "name" => "north_america",
            "id" => 2
        ]);
        DB::table("regions")->insert([
            "name" => "australia",
            "id" => 3
        ]);
        DB::table("regions")->insert([
            "name" => "new_zealand",
            "id" => 4
        ]);
        DB::table("regions")->insert([
            "name" => "japan",
            "id" => 5
        ]);
        DB::table("regions")->insert([
            "name" => "china",
            "id" => 6
        ]);
        DB::table("regions")->insert([
            "name" => "asia",
            "id" => 7
        ]);
        DB::table("regions")->insert([
            "name" => "worldwide",
            "id" => 8
        ]);
        DB::table("regions")->insert([
            "name" => "korea",
            "id" => 9
        ]);
        DB::table("regions")->insert([
            "name" => "brazil",
            "id" => 10
        ]);
    }
}
