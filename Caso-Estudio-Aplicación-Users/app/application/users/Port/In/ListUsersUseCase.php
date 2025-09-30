<?php

namespace Application\Users\Port\In;

use Application\Users\Dto\Response\UserResponse;

interface ListUsersUseCase
{
    /**
     * Ejecuta el caso de uso de listar todos los usuarios.
     *
     * @return UserResponse[] Lista de usuarios en formato de respuesta (DTO).
     */
    public function listUsers(): array;
}
