<?php

namespace App\Domain\Exception;

class MotorInvalidoException extends DomainException
{
    public function __construct(string $mensaje = "El motor seleccionado no es válido.")
    {
        parent::__construct($mensaje);
    }
}