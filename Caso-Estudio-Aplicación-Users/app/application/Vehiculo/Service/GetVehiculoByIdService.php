<?php

namespace App\Application\Service;

use App\Domain\ValueObject\VehiculoId;
use App\Application\Port\In\GetVehiculoByIdUseCase;
use App\Application\Port\Out\VehiculoRepositoryPort;

class GetVehiculoByIdService implements GetVehiculoByIdUseCase
{
    public function __construct(private VehiculoRepositoryPort $repository) {}

    public function execute(Vehiculo $vehiculo): void
    {
        //delegar al repositorio para buscar vehículo por placa
    }
}
