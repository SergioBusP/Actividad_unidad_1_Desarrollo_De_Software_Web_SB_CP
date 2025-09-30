<?php

namespace App\Application\Users\Dto\Response;

final class UserResponse
{
    private string $id;
    private string $username;
    private string $role;
    private bool $active;

    public function __construct(
        string $id,
        string $username,
        string $role,
        bool $active
    ) {
        $this->id = $id;
        $this->username = $username;
        $this->role = $role;
        $this->active = $active;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function username(): string
    {
        return $this->username;
    }

    public function role(): string
    {
        return $this->role;
    }

    public function active(): bool
    {
        return $this->active;
    }

    public static function fromPrimitives(
        string $id,
        string $username,
        string $role,
        bool $active
    ): self {
        return new self($id, $username, $role, $active);
    }
}
