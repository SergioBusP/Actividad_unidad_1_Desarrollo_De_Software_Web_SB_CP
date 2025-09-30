<?php

namespace Infrastructure\Adapters\Security\Password;

use Application\users\Port\Out\PasswordStrengthPolicyPort;

class PasswordStrengthPolicyAdapter implements PasswordStrengthPolicyPort
{
    public function isStrong(string $plainPassword): bool
    {
        return strlen($plainPassword) >= 8
            && preg_match('/[A-Z]/', $plainPassword)
            && preg_match('/[a-z]/', $plainPassword)
            && preg_match('/[0-9]/', $plainPassword)
            && preg_match('/[\W]/', $plainPassword);
    }
}
