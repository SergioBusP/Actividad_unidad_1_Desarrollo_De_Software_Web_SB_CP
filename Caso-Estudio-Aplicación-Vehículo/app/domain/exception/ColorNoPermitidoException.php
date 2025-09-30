<?php

namespace App\Domain\Exception;

class ColorNoPermitidoException extends DomainException
{
    public function __construct(string $mensaje = "El color seleccionado no está permitido.")
    {
        parent::__construct($mensaje);
    }
}