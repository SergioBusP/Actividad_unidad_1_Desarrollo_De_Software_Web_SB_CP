<?php

namespace Infrastructure\Entrypoint\Rest\Users\Response;

use Application\users\Domain\User;

class UserHttpResponse
{
    public static function fromDomain(User $user): array
    {
        return [
            'id' => $user->getId()->value(),
            'username' => $user->getUsername()->value(),
            'email' => $user->getEmail()->value(),
            'role' => $user->getRole()->value(),
            'active' => $user->isActive(),
        ];
    }
}
