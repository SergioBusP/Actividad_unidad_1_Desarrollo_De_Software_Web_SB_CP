<?php

namespace App\Domain\Exception;

class UsernameInvalidoException extends DomainException
{
    public function __construct(string $mensaje = "El nombre de usuario es inválido.")
    {
        parent::__construct($mensaje);
    }
}