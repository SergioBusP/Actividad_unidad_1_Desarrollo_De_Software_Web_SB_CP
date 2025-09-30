<?php

namespace App\Domain\Exception;

class KilometrajeInvalidoException extends DomainException
{
    public function __construct(string $mensaje = "El kilómetraje es inválido.")
    {
        parent::__construct($mensaje);
    }
}