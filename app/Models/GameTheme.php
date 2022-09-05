<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameTheme extends Model
{
    use HasFactory;
    protected $table = "game_themes";
    protected $fillable = [
        "id",
        "name",
        "slug"
    ];
}
