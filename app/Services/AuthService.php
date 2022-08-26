<?php

namespace App\Services;

use App\DTO\LoginPostRequestDTO;
use App\DTO\UserRegisterDTO;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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

    public static function login(LoginPostRequestDTO $dto, $tokenName)
    {
        $credentials = [
            "email" => $dto->getEmail(),
            "password" => $dto->getPassword(),
        ];
        if (!Auth::attempt($credentials)) {
            return [
                "body" => ["message" => "Invalid login details"],
                "status" => 401
            ];
        }
        $user = User::where("email", $dto->getEmail())->firstOrFail();
        $token = $user->createToken($tokenName)->plainTextToken;
        return [
            "body" => [
                "access_token" => $token,
                "token_type" => "Bearer"
            ],
            "status" => 200
        ];
    }
}
