<?php

namespace Application\Users\Port\In;

interface ResetPasswordUseCase
{
    /**
     * Ejecuta el caso de uso de restablecimiento de contraseña.
     *
     * @param string $token       Token de restablecimiento previamente generado.
     * @param string $newPassword Nueva contraseña a establecer.
     *
     * @return void
     */
    public function resetPassword(string $token, string $newPassword): void;
}
