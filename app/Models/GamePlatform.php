<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GamePlatform extends Model
{
    use HasFactory;
    protected $table = "game_platforms";
    protected $fillable = [
        "game_id",
        "platform_id"
    ];
}
