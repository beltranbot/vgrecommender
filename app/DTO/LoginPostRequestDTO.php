<?php

namespace App\DTO;

class LoginPostRequestDTO
{
    private $email;
    private $password;

    public function __construct($request)
    {
        $this->email = $request->email;
        $this->password = $request->password;
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
            "email" => $this->email,
            "password" => $this->password
        ];
    }
}
