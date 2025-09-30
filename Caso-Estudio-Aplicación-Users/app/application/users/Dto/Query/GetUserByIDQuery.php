<?php

namespace App\Application\Users\Dto\Query;

use App\Domain\Users\ValueObject\UserId;

final class GetUserByIdQuery
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

    public static function fromPrimitives(string $id): self
    {
        return new self(new UserId($id));
    }
}
