<?php

namespace Application\Users\Port\In;

interface LogoutUseCase
{
    /**
     * Ejecuta el caso de uso de logout.
     *
     * @param string $userId   Identificador único del usuario que desea cerrar sesión.
     *
     * @return void
     */
    public function logout(string $userId): void;
}
