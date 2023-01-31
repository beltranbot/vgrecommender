<?php

namespace App\DTO;

class PutListDTO
{
    private $name;
    private $description;


    public function __construct($request)
    {
        $this->name = $request->name;
        $this->description = $request->description;
    }

    public function asArray()
    {
        return [
            "name" => $this->name,
            "description" => $this->description,
        ];
    }
}
