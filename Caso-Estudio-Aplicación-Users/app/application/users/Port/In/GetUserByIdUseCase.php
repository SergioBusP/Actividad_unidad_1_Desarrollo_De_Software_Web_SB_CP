<?php

namespace Application\Users\Port\In;

use Application\Users\Dto\Response\UserResponse;

interface GetUserByIdUseCase
{
    /**
     * Ejecuta el caso de uso de obtener un usuario por su ID.
     *
     * @param string $userId Identificador único del usuario.
     * @return UserResponse
     */
    public function getUserById(string $userId): UserResponse;
}
