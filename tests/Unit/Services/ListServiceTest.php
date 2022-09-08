<?php

namespace Tests\Unit\Services;

use App\DTO\PostListDTO;
use App\Models\ListModel;
use App\Models\User;
use App\Services\ListService;
use Tests\DBTestCase;

class ListServiceTest extends DBTestCase
{
    /** @test */
    public function should_get_lists_by_user()
    {
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();
        for ($i = 0; $i < 5; $i++) {
            ListModel::factory()
                ->with_user($user1)
                ->with_next_position($user1)
                ->create();
        }
        for ($i = 0; $i < 6; $i++) {
            ListModel::factory()
                ->with_user($user2)
                ->with_next_position($user2)
                ->create();
        }
        $response = ListService::getByUser($user1);
        $i = 0;
        $this->assertCount(5, $response["lists"]);
        foreach ($response["lists"] as $key => $list) {
            $this->assertEquals($i, $key);
            $this->assertEquals($i + 1, $list->position);
            $i++;
            $this->assertEquals($user1->id, $list->user_id);
        }
    }

    /** @test */
    public function should_register_new_list()
    {
        $user = User::factory()->create();
        $request = ListModel::factory()
            ->make();
        $dto = new PostListDTO($request, $user);
        $response = ListService::store($dto);
        $this->assertIsArray($response);
        $this->assertArrayHasKey("list", $response);
        $dbList = ListModel::first();
        $list = $response["list"];
        $this->assertNotNull($dbList);
        $this->assertNotNull($list);
        $this->assertEquals($dbList->id, $list->id);
        $this->assertEquals($dbList->name, $list->name);
        $this->assertEquals($dbList->description, $list->description);
        $this->assertEquals($dbList->position, $list->position);
    }

    /** @test */
    public function should_register_new_list_with_correct_position()
    {
        $user = User::factory()->create();
        ListModel::factory()->create();
        $request = ListModel::factory()
            ->make();
        $dto = new PostListDTO($request, $user);
        $response = ListService::store($dto);
        $this->assertIsArray($response);
        $this->assertArrayHasKey("list", $response);
        $dbList = ListModel::orderBy("id", "desc")->first();
        $list = $response["list"];
        $this->assertNotNull($dbList);
        $this->assertNotNull($list);
        $this->assertEquals($dbList->id, $list->id);
        $this->assertEquals($dbList->name, $list->name);
        $this->assertEquals($dbList->description, $list->description);
        $this->assertEquals($dbList->position, $list->position);
    }
}
