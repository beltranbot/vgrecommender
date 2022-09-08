<?php

namespace App\Services;

use App\DTO\PostListDTO;
use App\Models\ListModel;
use App\Models\User;


class ListService
{
    public static function store(PostListDTO $dto)
    {
        $position = ListModel::getMaxPositionByUser($dto->getUser());
        $list = new ListModel(array_merge(
            $dto->asArray(),
            ["position" => ($position + 1)]
        ));
        $list->save();
        return ["list" => $list];
    }

    public static function getByUser(User $user)
    {
        $lists = ListModel::getByUser($user);
        return ["lists" => $lists];
    }
}
