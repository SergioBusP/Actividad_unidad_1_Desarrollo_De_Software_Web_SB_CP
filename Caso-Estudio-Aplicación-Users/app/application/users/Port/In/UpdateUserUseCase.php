<?php

namespace Application\Users\Port\In;

interface UpdateUserUseCase
{
    /**
     * Ejecuta el caso de uso de actualización de un usuario.
     *
     * @param string $userId   Identificador único del usuario a actualizar.
     * @param array  $data     Datos a actualizar (ej. username, email, roles, estado).
     *
     * @return void
     */
    public function updateUser(string $userId, array $data): void;
}
