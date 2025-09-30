<?php

namespace App\Application\Service;

use App\Application\Dto\Command\LoginCommand;
use App\Application\Dto\Response\UserResponse;
use App\Application\Port\In\LoginUseCase;
use App\Application\Port\Out\UserRepositoryPort;
use App\Application\Port\Out\PasswordHasherPort;
use App\Application\Port\Out\TokenIssuerPort;
use App\Application\Mapper\UserMapper;
use App\Domain\User\ValueObject\Username;
use App\Domain\Exception\InvalidPasswordException;
use App\Domain\Exception\UserNotFoundException;

class LoginService implements LoginUseCase
{
    private UserRepositoryPort $userRepository;
    private PasswordHasherPort $passwordHasher;
    private TokenIssuerPort $tokenIssuer;

    public function __construct(
        UserRepositoryPort $userRepository,
        PasswordHasherPort $passwordHasher,
        TokenIssuerPort $tokenIssuer
    ) {
        $this->userRepository = $userRepository;
        $this->passwordHasher = $passwordHasher;
        $this->tokenIssuer = $tokenIssuer;
    }

    public function login(LoginCommand $command): array
    {
        // 1. Buscar usuario por username
        $username = new Username($command->getUsername());
        $user = $this->userRepository->findByUsername($username);

        if (!$user) {
            throw new UserNotFoundException("El usuario '{$command->getUsername()}' no existe.");
        }

        // 2. Validar contraseña
        if (!$this->passwordHasher->verify($command->getPassword(), $user->getPasswordHash()->value())) {
            throw new InvalidPasswordException("La contraseña ingresada es inválida.");
        }

        // 3. Emitir token de sesión (ej. JWT)
        $token = $this->tokenIssuer->issueToken([
            'userId' => $user->getId()->value(),
            'username' => $user->getUsername()->value(),
            'roles' => $user->getRoles()
        ]);

        // 4. Retornar información del usuario + token
        return [
            'user' => UserMapper::toResponse($user),
            'token' => $token
        ];
    }
}
