<?php

namespace App\DTO;

// todo: test

class PostListDTO
{
    private $name;
    private $description;
    private $user;

    public function __construct($request, $user)
    {
        $this->name = $request->name;
        $this->description = $request->description;
        $this->user = $user;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function asArray()
    {
        return [
            "name" => $this->name,
            "description" => $this->description,
            "user_id" => $this->user->id
        ];
    }
}
