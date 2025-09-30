<?php

namespace Application\Users\Port\Out;

interface PasswordStrengthPolicyPort
{
    /**
     * Verifica si una contraseña cumple con la política de seguridad.
     *
     * @param string $plainPassword
     * @return bool   true si cumple, false si no.
     */
    public function isStrongEnough(string $plainPassword): bool;

    /**
     * Obtiene un mensaje de error o recomendaciones si la contraseña no cumple.
     *
     * @param string $plainPassword
     * @return string|null   Mensaje con las razones o null si es válida.
     */
    public function getValidationMessage(string $plainPassword): ?string;
}
