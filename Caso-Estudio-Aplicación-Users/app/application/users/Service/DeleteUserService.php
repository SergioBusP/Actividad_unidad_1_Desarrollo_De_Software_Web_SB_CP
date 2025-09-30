<?php

namespace App\Application\Service;

use App\Application\Dto\Command\DeleteUserCommand;
use App\Application\Port\In\DeleteUserUseCase;
use App\Application\Port\Out\UserRepositoryPort;
use App\Domain\User\ValueObject\UserId;
use App\Domain\Exception\UserNotFoundException;

class DeleteUserService implements DeleteUserUseCase
{
    private UserRepositoryPort $userRepository;

    public function __construct(UserRepositoryPort $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function deleteUser(DeleteUserCommand $command): void
    {
        // 1. Buscar el usuario por ID
        $userId = new UserId($command->getUserId());
        $user = $this->userRepository->findById($userId);

        if (!$user) {
            throw new UserNotFoundException("El usuario con ID {$command->getUserId()} no existe.");
        }

        // 2. Eliminar el usuario
        $this->userRepository->delete($userId);
    }
}
