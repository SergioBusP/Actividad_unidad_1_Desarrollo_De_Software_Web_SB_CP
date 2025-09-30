<?php

namespace Infrastructure\Entrypoint\Rest\Users\Mapper;

use Application\users\Domain\User;
use Infrastructure\Entrypoint\Rest\Users\Response\UserHttpResponse;

class UserHttpMapper
{
    /**
     * @param User[] $users
     */
    public static function mapList(array $users): array
    {
        return array_map(
            fn(User $user) => UserHttpResponse::fromDomain($user),
            $users
        );
    }
}
