<?php

namespace App\Domain\Event;

class KilometrakeActualizado
{
    private VehiculoId $vehiculoId;
    private \DateTimeImmutable $fecha;
    private Kilometraje $kilomentraje;

    public function __construct(VehiculoId $vehiculoId, \DateTimeImmutable $fecha, Kilometraje $kilomentraje)
    {
        
    }

    public function getVehiculoId(): VehiculoId
    {
        
    }

    public function getFecha(): \DateTimeImmutable
    {
       
    }

    public function getKilometraje(): Kilometraje
    {
       
    }
}
