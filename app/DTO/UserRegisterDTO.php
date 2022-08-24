<?php

namespace App\DTO;

use Illuminate\Support\Facades\Hash;

class UserRegisterDTO
{
    private $name;
    private $email;
    private $password;

    public function __construct($request)
    {
        $this->name = $request->name;
        $this->email = $request->email;
        $this->password = Hash::make($request->password);
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function asArray()
    {
        return [
            "name" => $this->name,
            "email" => $this->email,
            "password" => $this->password
        ];
    }

}
