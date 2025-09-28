<?php

namespace App\Domain\Exception;

class PasswordInvalidaException extends DomainException
{
    public function __construct(string $mensaje = "La contraseña ingresada es inválida.")
    {
        parent::__construct($mensaje);
    }
}