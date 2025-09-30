<?php

namespace App\Application\Service;

use App\Application\Dto\Command\CreateUserCommand;
use App\Application\Dto\Response\UserResponse;
use App\Application\Mapper\UserMapper;
use App\Application\Port\In\CreateUserUseCase;
use App\Application\Port\Out\UserRepositoryPort;
use App\Application\Port\Out\PasswordHasherPort;
use App\Domain\User\User;
use App\Domain\User\ValueObject\UserId;
use App\Domain\User\ValueObject\Username;
use App\Domain\User\ValueObject\PasswordHash;

class CreateUserService implements CreateUserUseCase
{
    private UserRepositoryPort $userRepository;
    private PasswordHasherPort $passwordHasher;

    public function __construct(
        UserRepositoryPort $userRepository,
        PasswordHasherPort $passwordHasher
    ) {
        $this->userRepository = $userRepository;
        $this->passwordHasher = $passwordHasher;
    }

    public function createUser(CreateUserCommand $command): UserResponse
    {
        // 1. Generar ID único para el usuario
        $userId = UserId::generate();

        // 2. Hashear la contraseña
        $hashedPassword = new PasswordHash(
            $this->passwordHasher->hash($command->getPassword())
        );

        // 3. Crear entidad de dominio User
        $user = new User(
            $userId,
            new Username($command->getUsername()),
            $command->getEmail(),
            $hashedPassword
        );

        // 4. Persistir el usuario en el repositorio
        $this->userRepository->save($user);

        // 5. Devolver el DTO de respuesta
        return UserMapper::toResponse($user);
    }
}
