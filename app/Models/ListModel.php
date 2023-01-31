<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListModel extends Model
{
    use HasFactory;
    protected $table = "lists";
    protected $fillable = [
        "user_id",
        "name",
        "description",
        "position"
    ];

    public static function getByUser($user)
    {
        $lists = ListModel::where("user_id", $user->id)
            ->orderBy("position", "asc")
            ->get();
        return $lists;
    }

    public static function getMaxPositionByUser(User $user)
    {
        $maxPosition = ListModel::where("user_id", $user->id)
            ->max("position");
        if (is_null($maxPosition)) {
            return 0;
        }
        return $maxPosition;
    }
}
