<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameGameMode extends Model
{
    use HasFactory;
    protected $table = "game_game_modes";
    protected $fillable = [
        "game_id",
        "game_mode_id"
    ];
}
