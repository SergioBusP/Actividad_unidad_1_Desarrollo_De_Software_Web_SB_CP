<?php

namespace App\Application\Users\Mapper;

use App\Domain\Users\Entity\User;
use App\Application\Users\Dto\Response\UserResponse;
use App\Application\Users\Dto\Response\UserListResponse;

final class UserMapper
{
    public static function toResponse(User $user): UserResponse
    {
        return new UserResponse(
            $user->id()->value(),
            $user->username()->value(),
            $user->role()->value(),
            $user->isActive()
        );
    }

    /**
     * @param User[] $users
     */
    public static function toListResponse(array $users): UserListResponse
    {
        $userResponses = array_map(
            fn(User $user) => self::toResponse($user),
            $users
        );

        return new UserListResponse($userResponses);
    }
}
