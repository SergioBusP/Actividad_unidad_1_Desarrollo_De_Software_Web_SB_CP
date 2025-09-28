<?php

namespace App\Domain\Service;

interface PasswordHasher
{
    /**
     * Genera un hash seguro a partir de una contraseña en texto plano.
     */
    public function hash(string $plainPassword): string;

    /**
     * Verifica si una contraseña en texto plano coincide con un hash almacenado.
     */
    public function verify(string $plainPassword, string $hashedPassword): bool;
}