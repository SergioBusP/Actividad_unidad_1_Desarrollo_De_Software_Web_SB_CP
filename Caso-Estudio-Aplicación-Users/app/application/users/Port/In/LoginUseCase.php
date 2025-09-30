<?php

namespace Application\Users\Port\In;

use Application\Users\Dto\Response\UserResponse;

interface LoginUseCase
{
    /**
     * Ejecuta el caso de uso de login.
     *
     * @param string $email    Correo del usuario.
     * @param string $password Contraseña del usuario.
     *
     * @return UserResponse    Devuelve los datos del usuario autenticado.
     *
     * @throws \DomainException Si las credenciales son inválidas.
     */
    public function login(string $email, string $password): UserResponse;
}
