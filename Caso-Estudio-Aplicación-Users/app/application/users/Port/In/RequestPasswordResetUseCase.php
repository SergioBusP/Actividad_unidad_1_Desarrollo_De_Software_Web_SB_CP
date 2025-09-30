<?php

namespace Application\Users\Port\In;

interface RequestPasswordResetUseCase
{
    /**
     * Ejecuta el caso de uso de solicitud de restablecimiento de contraseña.
     *
     * @param string $email   Correo electrónico del usuario que solicita el reseteo.
     *
     * @return void
     */
    public function requestPasswordReset(string $email): void;
}
