<?php

namespace App\Application\Users\Dto\Command;

use App\Domain\Users\ValueObject\UserId;
use App\Domain\Users\ValueObject\UserName;
use App\Domain\Users\ValueObject\Role;

final class UpdateUserCommand
{
    private UserId $userId;
    private UserName $userName;
    private Role $role;

    public function __construct(UserId $userId, UserName $userName, Role $role)
    {
        $this->userId   = $userId;
        $this->userName = $userName;
        $this->role     = $role;
    }

    public function userId(): UserId
    {
        return $this->userId;
    }

    public function userName(): UserName
    {
        return $this->userName;
    }

    public function role(): Role
    {
        return $this->role;
    }

    /**
     * Factoría estática desde datos primitivos
     */
    public static function fromPrimitives(string $id, string $username, string $role): self
    {
        return new self(
            new UserId($id),
            new UserName($username),
            new Role($role)
        );
    }
}
