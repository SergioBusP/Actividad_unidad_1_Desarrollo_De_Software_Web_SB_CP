<?php

namespace Application\Users\Port\Out;

interface TokenIssuerPort
{
    /**
     * Genera un nuevo token para un usuario autenticado.
     *
     * @param string $userId   Identificador del usuario.
     * @param array  $claims   Información adicional a incluir en el token (roles, permisos, etc.).
     *
     * @return string   Token generado.
     */
    public function issueToken(string $userId, array $claims = []): string;

    /**
     * Valida un token y retorna el payload si es válido.
     *
     * @param string $token
     * @return array|null   Retorna claims (ej. userId, roles, exp) o null si es inválido.
     */
    public function validateToken(string $token): ?array;

    /**
     * Revoca un token (ej. en logout o invalidación anticipada).
     *
     * @param string $token
     * @return void
     */
    public function revokeToken(string $token): void;
}
