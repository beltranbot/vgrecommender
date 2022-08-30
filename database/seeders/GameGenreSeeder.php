<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("game_genres")->insert([
            "id" => 2,
            "name" => "Point-and-click",
            "slug" => "point-and-click",
        ]);
        DB::table("game_genres")->insert([
            "id" => 4,
            "name" => "Fighting",
            "slug" => "fighting",
        ]);
        DB::table("game_genres")->insert([
            "id" => 5,
            "name" => "Shooter",
            "slug" => "shooter",
        ]);
        DB::table("game_genres")->insert([
            "id" => 7,
            "name" => "Music",
            "slug" => "music",
        ]);
        DB::table("game_genres")->insert([
            "id" => 8,
            "name" => "Platform",
            "slug" => "platform",
        ]);
        DB::table("game_genres")->insert([
            "id" => 9,
            "name" => "Puzzle",
            "slug" => "puzzle",
        ]);
        DB::table("game_genres")->insert([
            "id" => 10,
            "name" => "Racing",
            "slug" => "racing",
        ]);
        DB::table("game_genres")->insert([
            "id" => 11,
            "name" => "Real Time Strategy (RTS)",
            "slug" => "real-time-strategy-rts",
        ]);
        DB::table("game_genres")->insert([
            "id" => 12,
            "name" => "Role-playing (RPG)",
            "slug" => "role-playing-rpg",
        ]);
        DB::table("game_genres")->insert([
            "id" => 13,
            "name" => "Simulator",
            "slug" => "simulator",
        ]);
        DB::table("game_genres")->insert([
            "id" => 14,
            "name" => "Sport",
            "slug" => "sport",
        ]);
        DB::table("game_genres")->insert([
            "id" => 15,
            "name" => "Strategy",
            "slug" => "strategy",
        ]);
        DB::table("game_genres")->insert([
            "id" => 16,
            "name" => "Turn-based strategy (TBS)",
            "slug" => "turn-based-strategy-tbs",
        ]);
        DB::table("game_genres")->insert([
            "id" => 24,
            "name" => "Tactical",
            "slug" => "tactical",
        ]);
        DB::table("game_genres")->insert([
            "id" => 26,
            "name" => "Quiz/Trivia",
            "slug" => "quiz-trivia",
        ]);
        DB::table("game_genres")->insert([
            "id" => 25,
            "name" => "Hack and slash/Beat 'em up",
            "slug" => "hack-and-slash-beat-em-up",
        ]);
        DB::table("game_genres")->insert([
            "id" => 30,
            "name" => "Pinball",
            "slug" => "pinball",
        ]);
        DB::table("game_genres")->insert([
            "id" => 31,
            "name" => "Adventure",
            "slug" => "adventure",
        ]);
        DB::table("game_genres")->insert([
            "id" => 33,
            "name" => "Arcade",
            "slug" => "arcade",
        ]);
        DB::table("game_genres")->insert([
            "id" => 32,
            "name" => "Indie",
            "slug" => "indie",
        ]);
        DB::table("game_genres")->insert([
            "id" => 34,
            "name" => "Visual Novel",
            "slug" => "visual-novel",
        ]);
        DB::table("game_genres")->insert([
            "id" => 35,
            "name" => "Card & Board Game",
            "slug" => "card-and-board-game",
        ]);
        DB::table("game_genres")->insert([
            "id" => 36,
            "name" => "MOBA",
            "slug" => "moba",
        ]);
        
    }
}
