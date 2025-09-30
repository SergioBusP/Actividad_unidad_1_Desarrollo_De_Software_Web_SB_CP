<?php

namespace App\Application\Service;

use App\Application\Dto\Command\RequestPasswordResetCommand;
use App\Application\Port\In\RequestPasswordResetUseCase;
use App\Application\Port\Out\UserRepositoryPort;
use App\Application\Port\Out\PasswordResetTokenPort;
use App\Domain\User\ValueObject\Username;
use App\Domain\Exception\UserNotFoundException;

class RequestPasswordResetService implements RequestPasswordResetUseCase
{
    private UserRepositoryPort $userRepository;
    private PasswordResetTokenPort $passwordResetTokenPort;

    public function __construct(
        UserRepositoryPort $userRepository,
        PasswordResetTokenPort $passwordResetTokenPort
    ) {
        $this->userRepository = $userRepository;
        $this->passwordResetTokenPort = $passwordResetTokenPort;
    }

    public function requestPasswordReset(RequestPasswordResetCommand $command): string
    {
        // 1. Buscar el usuario por username o email
        $username = new Username($command->getUsername());
        $user = $this->userRepository->findByUsername($username);

        if (!$user) {
            throw new UserNotFoundException("El usuario '{$command->getUsername()}' no existe.");
        }

        // 2. Generar un token de reseteo de contraseña
        $token = $this->passwordResetTokenPort->generateToken($user->getId());

        // 3. (Opcional) aquí se podría enviar un correo al usuario con el token

        // 4. Retornar el token (o confirmación)
        return $token;
    }
}
