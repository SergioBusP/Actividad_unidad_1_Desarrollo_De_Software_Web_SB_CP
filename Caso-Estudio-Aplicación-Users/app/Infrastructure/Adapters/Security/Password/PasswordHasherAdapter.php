<?php

namespace Infrastructure\Adapters\Security\Password;

use Application\users\Port\Out\PasswordHasherPort;

class PasswordHasherAdapter implements PasswordHasherPort
{
    public function hash(string $plainPassword): string
    {
        return password_hash($plainPassword, PASSWORD_BCRYPT);
    }

    public function verify(string $plainPassword, string $hashedPassword): bool
    {
        return password_verify($plainPassword, $hashedPassword);
    }
}
