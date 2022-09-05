<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpdateBacklog extends Model
{
    use HasFactory;

    protected $table = "update_backlog";
    protected $fillable = [
        "name",
        "skip",
        "take",
        "entries",
        "fetch_current_page"
    ];
}
