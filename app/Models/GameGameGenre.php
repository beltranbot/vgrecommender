<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameGameGenre extends Model
{
    use HasFactory;
    protected $table = "game_game_genres";
    protected $fillable = [
        "game_id",
        "game_genre_id"
    ];
}
