<?php

namespace Application\Users\Port\In;

use Application\Users\Dto\Command\CreateUserCommand;
use Application\Users\Dto\Response\UserResponse;

interface CreateUserUseCase
{
    /**
     * Ejecuta el caso de uso de creación de usuario.
     *
     * @param CreateUserCommand $command Datos necesarios para crear el usuario.
     * @return UserResponse Información del usuario creado.
     */
    public function createUser(CreateUserCommand $command): UserResponse;
}
