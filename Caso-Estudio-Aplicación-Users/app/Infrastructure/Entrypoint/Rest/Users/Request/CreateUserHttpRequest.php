<?php

namespace Infrastructure\Entrypoint\Rest\Users\Request;

use Illuminate\Http\Request;

class CreateUserHttpRequest
{
    public string $username;
    public string $email;
    public string $password;

    public static function fromRequest(Request $request): self
    {
        $dto = new self();
        $dto->username = $request->input('username');
        $dto->email = $request->input('email');
        $dto->password = $request->input('password');
        return $dto;
    }
}
