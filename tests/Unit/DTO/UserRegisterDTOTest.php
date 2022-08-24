<?php

namespace Tests\Unit\DTO;

use App\DTO\UserRegisterDTO;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\DBTestCase;

class UserRegisterDTOTest extends DBTestCase
{
    /** @test */
    public function should_instantiate_user_register_dto()
    {
        $user = User::factory()->make();
        $request = (object) [
            "name" => $user->name,
            "email" => $user->email,
            "password" => $user->password
        ];
        $dto = new UserRegisterDTO($request);
        $this->assertInstanceOf(UserRegisterDTO::class, $dto);
        $this->assertEquals($request->name, $dto->getName());
        $this->assertEquals($request->email, $dto->getEmail());
        $this->assertTrue(Hash::check($request->password, $dto->getPassword()));
        $arr = $dto->asArray();
        $this->assertIsArray($arr);
        $this->assertEquals($request->name, $arr["name"]);
        $this->assertEquals($request->email, $arr["email"]);
        $this->assertTrue(Hash::check($request->password, $arr["password"]));
    }
}
