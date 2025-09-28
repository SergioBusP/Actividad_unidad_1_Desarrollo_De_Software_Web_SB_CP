<?php

namespace App\Domain\Exception;

class UsuarioYaActivoException extends DomainException
{
    public function __construct(string $mensaje = "El usuario ya se encuentra activo.")
    {
        parent::__construct($mensaje);
    }
}