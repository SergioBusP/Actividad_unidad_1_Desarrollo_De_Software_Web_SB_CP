<?php

namespace App\Application\Service;

use App\Application\Dto\Command\ResetPasswordCommand;
use App\Application\Port\In\ResetPasswordUseCase;
use App\Application\Port\Out\UserRepositoryPort;
use App\Application\Port\Out\PasswordHasherPort;
use App\Application\Port\Out\PasswordResetTokenPort;
use App\Application\Port\Out\PasswordStrengthPolicyPort;
use App\Domain\User\ValueObject\PasswordHash;
use App\Domain\User\ValueObject\UserId;
use App\Domain\Exception\UserNotFoundException;
use App\Domain\Exception\InvalidPasswordException;

class ResetPasswordService implements ResetPasswordUseCase
{
    private UserRepositoryPort $userRepository;
    private PasswordHasherPort $passwordHasher;
    private PasswordResetTokenPort $passwordResetTokenPort;
    private PasswordStrengthPolicyPort $passwordStrengthPolicy;

    public function __construct(
        UserRepositoryPort $userRepository,
        PasswordHasherPort $passwordHasher,
        PasswordResetTokenPort $passwordResetTokenPort,
        PasswordStrengthPolicyPort $passwordStrengthPolicy
    ) {
        $this->userRepository = $userRepository;
        $this->passwordHasher = $passwordHasher;
        $this->passwordResetTokenPort = $passwordResetTokenPort;
        $this->passwordStrengthPolicy = $passwordStrengthPolicy;
    }

    public function resetPassword(ResetPasswordCommand $command): void
    {
        // 1. Validar token
        $userIdValue = $this->passwordResetTokenPort->validateToken($command->getToken());
        if (!$userIdValue) {
            throw new InvalidPasswordException("El token de reseteo de contraseña es inválido o ha expirado.");
        }

        $userId = new UserId($userIdValue);

        // 2. Buscar usuario
        $user = $this->userRepository->findById($userId);
        if (!$user) {
            throw new UserNotFoundException("No se encontró un usuario con el ID asociado al token.");
        }

        // 3. Validar la fortaleza de la nueva contraseña
        if (!$this->passwordStrengthPolicy->isValid($command->getNewPassword())) {
            throw new InvalidPasswordException("La nueva contraseña no cumple con la política de seguridad.");
        }

        // 4. Hashear la nueva contraseña
        $newHashedPassword = new PasswordHash(
            $this->passwordHasher->hash($command->getNewPassword())
        );

        // 5. Actualizar la contraseña en la entidad
        $user->changePassword($newHashedPassword);

        // 6. Guardar cambios
        $this->userRepository->save($user);

        // 7. Invalidar el token usado
        $this->passwordResetTokenPort->invalidateToken($command->getToken());
    }
}
