<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameGameTheme extends Model
{
    use HasFactory;
    protected $table = "game_game_themes";
    protected $fillabkle = [
        "game_id",
        "game_theme_id"
    ];
}
