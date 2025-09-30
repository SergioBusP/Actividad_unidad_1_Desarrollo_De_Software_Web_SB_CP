<?php

namespace Application\Users\Port\Out;

interface PasswordResetTokenPort
{
    /**
     * Genera y persiste un nuevo token de restablecimiento para un usuario.
     *
     * @param string $userId
     * @return string   El token generado.
     */
    public function createToken(string $userId): string;

    /**
     * Verifica si un token es válido y lo asocia al usuario correspondiente.
     *
     * @param string $token
     * @return string|null   Retorna el userId si es válido, null si no lo es.
     */
    public function validateToken(string $token): ?string;

    /**
     * Elimina un token (ej. cuando ya fue usado o ha expirado).
     *
     * @param string $token
     * @return void
     */
    public function invalidateToken(string $token): void;
}
