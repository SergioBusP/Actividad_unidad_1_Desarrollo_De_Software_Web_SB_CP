<?php

namespace App\Domain\Exception;

class CategoriaInvalidaException extends DomainException
{
    public function __construct(string $mensaje = "La categoría escogida no es válida.")
    {
        parent::__construct($mensaje);
    }
}