<?php

namespace App\Domain\Exception;

class RolInvalidoException extends DomainException
{
    public function __construct(string $mensaje = "El rol ingresado es inválido.")
    {
        parent::__construct($mensaje);
    }
}