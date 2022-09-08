<?php

namespace App\Http\Controllers;

use App\DTO\PostListDTO;
use App\Http\Requests\PostListRequest;
use App\Models\User;
use App\Services\ListService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListController extends Controller
{
    public function store(PostListRequest $request)
    {
        $dto = new PostListDTO($request, Auth::user());
        $response = ListService::store($dto);
        return response()->json($response, 201);
    }

    public function index(User $user)
    {
        $authUser = Auth::user();
        if ($authUser->id !== $user->id) {
            return response()->json([
                "message" => "UNPROCESSABLE ENTITY"
            ], 422);
        }
        $response = ListService::getByUser($authUser);
        return response()->json($response, 200);
    }
}
