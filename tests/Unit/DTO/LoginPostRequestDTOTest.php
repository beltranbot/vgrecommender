<?php

namespace Tests\Unit\DTO;

use App\DTO\LoginPostRequestDTO;
use App\Models\User;
use Tests\TestCase;

class LoginPostRequestDTOTest extends TestCase
{
    /** @test */
    public function should_instantiate_login_post_request_dto()
    {
        $user = User::factory()
            ->make();
        $request = (object) [
            "email" => $user->email,
            "password" => $user->password
        ];
        $dto = new LoginPostRequestDTO($request);
        $this->assertInstanceOf(LoginPostRequestDTO::class, $dto);
        $this->assertEquals($request->email, $dto->getEmail());
        $this->assertEquals($request->password, $dto->getPassword());
        $arr = $dto->asArray();
        $this->assertIsArray($arr);
        $this->assertEquals($request->email, $arr["email"]);
        $this->assertEquals($request->password, $arr["password"]);
    }
}
