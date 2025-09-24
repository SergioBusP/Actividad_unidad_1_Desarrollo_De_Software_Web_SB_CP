<?php

namespace App\Application\User\Command;

class UpdatePasswordCommand
{
    private string $userId;
    private string $oldPassword;
    private string $newPassword;

    public function __construct(string $userId, string $oldPassword, string $newPassword)
    {
        if (empty($userId)) {
            throw new \InvalidArgumentException("El ID del usuario no puede estar vacío");
        }

        if (strlen($newPassword) < 8) {
            throw new \InvalidArgumentException("La nueva contraseña debe tener al menos 8 caracteres");
        }

        $this->userId = $userId;
        $this->oldPassword = $oldPassword;
        $this->newPassword = $newPassword;
    }

    public function getUserId(): string
    {
        return $this->userId;
    }

    public function getOldPassword(): string
    {
        return $this->oldPassword;
    }

    public function getNewPassword(): string
    {
        return $this->newPassword;
    }
}
