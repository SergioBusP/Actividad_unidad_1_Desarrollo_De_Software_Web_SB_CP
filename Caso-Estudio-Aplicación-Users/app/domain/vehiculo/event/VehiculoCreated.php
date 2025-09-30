<?php

namespace App\Domain\Event;

class VehiculoCreado
{
    private int $vehiculoId;
    private \DateTimeImmutable $fecha;

    public function __construct(int $vehiculoId, \DateTimeImmutable $fecha)
    {
        
    }

    public function getVehiculoId(): int
    {
        
    }

    public function getFecha(): \DateTimeImmutable
    {
       
    }
}