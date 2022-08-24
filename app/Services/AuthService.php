<?php

namespace App\Serivces;

use App\DTO\UserRegisterDTO;
use App\Models\User;

class AuthService
{
    public static function create(UserRegisterDTO $dto, $tokenName)
    {
        $user = new User($dto->asArray());
        $user->save();
        $token = $user->createToken($tokenName)->plainTextToken;
        return [
            "access_token" => $token,
            "token_type" => "Bearer"
        ];
    }
}
