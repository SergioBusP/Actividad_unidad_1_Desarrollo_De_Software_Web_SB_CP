<?php

namespace App\Application\Service;

use App\Application\Dto\Query\GetUserByIdQuery;
use App\Application\Dto\Response\UserResponse;
use App\Application\Mapper\UserMapper;
use App\Application\Port\In\GetUserByIdUseCase;
use App\Application\Port\Out\UserRepositoryPort;
use App\Domain\User\ValueObject\UserId;
use App\Domain\Exception\UserNotFoundException;

class GetUserByIdService implements GetUserByIdUseCase
{
    private UserRepositoryPort $userRepository;

    public function __construct(UserRepositoryPort $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUserById(GetUserByIdQuery $query): UserResponse
    {
        // 1. Convertir a Value Object
        $userId = new UserId($query->getUserId());

        // 2. Buscar el usuario
        $user = $this->userRepository->findById($userId);

        if (!$user) {
            throw new UserNotFoundException("El usuario con ID {$query->getUserId()} no existe.");
        }

        // 3. Mapear a respuesta DTO
        return UserMapper::toResponse($user);
    }
}
