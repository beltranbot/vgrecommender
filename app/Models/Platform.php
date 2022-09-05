<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    use HasFactory;

    protected $fillable = [
        "id",
        "abbreviation",
        "alternative_name",
        "category",
        "name",
        "slug",
    ];
}
