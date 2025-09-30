<?php

namespace Application\Users\Port\In;

interface DeleteUserUseCase
{
    /**
     * Ejecuta el caso de uso de eliminar un usuario.
     *
     * @param string $userId Identificador único del usuario a eliminar.
     * @return void
     */
    public function deleteUser(string $userId): void;
}
