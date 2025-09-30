<?php

namespace App\Application\Service;

use App\Domain\Entity\Vehiculo;
use App\Domain\ValueObject\VehiculoId;
use App\Application\Port\In\UpdateVehiculoUseCase;
use App\Application\Port\Out\VehiculoRepositoryPort;

class UpdateVehiculoService implements UpdateVehiculoUseCase
{
    public function __construct(private VehiculoRepositoryPort $repository) {}

    public function execute(VehiculoId $vehiculoid, Vehiculo $vehiculo): void
    {
        //delegar al repositorio para actualizar vehículo
    }
}
