<?php

namespace App\Http\Controllers;

use App\DTO\UserRegisterDTO;
use App\Http\Requests\API\RegisterPostRequest;
use App\Models\User;
use App\Serivces\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(RegisterPostRequest $request)
    {
        $dto = new UserRegisterDTO($request);
        $response = AuthService::create($dto, "auth_token");
        return response()->json($response, 201);
    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only("email", "password"))) {
            return response()->json([
                "message" => "Invalid login details"
            ], 401);
        }
        $user = User::where("email", $request["email"])->firstOrFail();
        $token = $user->createToken("auth_token")->plainTextToken;
        return response()->json([
            "access_token" => $token,
            "token_type" => "Bearer"
        ]);
    }

    public function info(Request $request)
    {
        return $request->user();
    }
}
