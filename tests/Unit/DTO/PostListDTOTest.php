<?php

namespace Tests\Unit\DTO;

use App\DTO\PostListDTO;
use App\Models\ListModel;
use App\Models\User;
use Tests\DBTestCase;

class PostListDTOTest extends DBTestCase
{
    /** @test */
    public function should_instantiate_post_list_dto()
    {
        $user = User::factory()
            ->create();
        $list = ListModel::factory()
            ->with_user($user)
            ->make();
        $dto = new PostListDTO($list, $user);
        $this->assertInstanceOf(PostListDTO::class, $dto);
        $this->assertEquals($list->name, $dto->getName());
        $this->assertEquals($list->description, $dto->getDescription());
        $this->assertEquals($user, $dto->getUser());
        $arr = $dto->asArray();
        $this->assertIsArray($arr);
        $this->assertArrayHasKey("name", $arr);
        $this->assertEquals($list->name, $arr["name"]);
        $this->assertArrayHasKey("description", $arr);
        $this->assertEquals($list->description, $arr["description"]);
        $this->assertArrayHasKey("user_id", $arr);
        $this->assertEquals($user->id, $arr["user_id"]);
    }
}
