<?php

namespace App\Application\Users\Dto\Response;

final class UserListResponse
{
    /** @var UserResponse[] */
    private array $users;

    /**
     * @param UserResponse[] $users
     */
    public function __construct(array $users)
    {
        $this->users = $users;
    }

    /**
     * @return UserResponse[]
     */
    public function users(): array
    {
        return $this->users;
    }

    public static function fromArray(array $users): self
    {
        return new self($users);
    }
}
