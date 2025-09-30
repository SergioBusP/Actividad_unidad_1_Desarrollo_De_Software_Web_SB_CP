<?php

namespace Application\Users\Port\Out;

interface PasswordHasherPort
{
    /**
     * Genera un hash seguro de la contraseña en texto plano.
     *
     * @param string $plainPassword
     * @return string
     */
    public function hash(string $plainPassword): string;

    /**
     * Verifica si una contraseña en texto plano coincide con su hash.
     *
     * @param string $plainPassword
     * @param string $hashedPassword
     * @return bool
     */
    public function verify(string $plainPassword, string $hashedPassword): bool;
}
