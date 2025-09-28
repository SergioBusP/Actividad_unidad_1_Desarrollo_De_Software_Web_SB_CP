<?php

namespace App\Domain\Exception;

class UsuarioYaInactivoException extends DomainException
{
    public function __construct(string $mensaje = "El usuario ya se encuentra inactivo.")
    {
        parent::__construct($mensaje);
    }
}