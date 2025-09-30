<?php

namespace App\Domain\Exception;

class InvalidVehiculoState extends DomainException
{
    public function __construct(string $mensaje = "La instancia de Vehículo creada no es válida.")
    {
        parent::__construct($mensaje);
    }
}