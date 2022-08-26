<?php

namespace Tests\Unit\Services;

use App\DTO\UserRegisterDTO;
use App\Models\User;
use App\Services\AuthService;
use Laravel\Sanctum\Sanctum;
use Tests\DBTestCase;

class AuthServiceTest extends DBTestCase
{
    /** @test */
    public function should_create_new_user()
    {
        $user = User::factory()->make();
        $request = (object) [
            "name" => $user->name,
            "email" => $user->email,
            "password" => $user->password
        ];
        $dto = new UserRegisterDTO($request);
        $response = AuthService::create($dto, "auth_token");
        $this->assertIsArray($response);
        $this->assertArrayHasKey("access_token", $response);
        $this->assertArrayHasKey("token_type", $response);
        $this->assertEquals("Bearer", $response["token_type"]);
        $user = User::first();
        $this->assertNotNull($user);
        $this->assertEquals($request->name, $user->name);
        $this->assertEquals($request->email, $user->email);
        $token = $response["access_token"];
        $token = explode("|", $token)[1];
        $this->assertTrue(
            hash_equals($user->tokens[0]->token, hash("sha256", $token))
        );
    }

    /** @test */
    public function user_should_be_able_to_authenticate_with_generated_token()
    {
        Sanctum::actingAs(
            User::factory()->create(),
            []
        );
        $response = $this->get("/api/user");
        $response->assertOk();
    }
}
