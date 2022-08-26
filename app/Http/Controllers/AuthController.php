<?php

namespace App\Http\Controllers;

use App\DTO\LoginPostRequestDTO;
use App\DTO\UserRegisterDTO;
use App\Http\Requests\API\LoginPostRequest;
use App\Http\Requests\API\RegisterPostRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(RegisterPostRequest $request)
    {
        $dto = new UserRegisterDTO($request);
        $response = AuthService::create($dto, "auth_token");
        return response()->json($response, 201);
    }

    public function login(LoginPostRequest $request)
    {
        $dto = new LoginPostRequestDTO($request);
        $response = AuthService::login($dto, "auth_token");
        return response()->json($response["body"], $response["status"]);
    }

    public function info(Request $request)
    {
        return $request->user();
    }
}
