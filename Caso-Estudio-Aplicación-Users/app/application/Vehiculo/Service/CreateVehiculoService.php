<?php

namespace App\Application\Service;

use App\Domain\Entity\Vehiculo;
use App\Application\Port\In\CreateVehiculoUseCase;
use App\Application\Port\Out\VehiculoRepositoryPort;

class CreateVehiculoService implements CreateVehiculoUseCase
{
    public function __construct(private VehiculoRepositoryPort $repository) {}

    public function execute(Vehiculo $vehiculo): void
    {
        //delegar al repositorio para guardar vehículo
    }
}
