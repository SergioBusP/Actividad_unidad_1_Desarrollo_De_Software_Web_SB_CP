<?php

namespace App\Application\Users\Dto\Command;

use App\Domain\Users\ValueObject\UserId;

final class DeleteUserCommand
{
    private UserId $userId;

    public function __construct(UserId $userId)
    {
        $this->userId = $userId;
    }

    public function userId(): UserId
    {
        return $this->userId;
    }

    public static function fromString(string $id): self
    {
        return new self(new UserId($id));
    }
}
