<?php

namespace App\Application\Service;

use App\Domain\ValueObject\VehiculoId;
use App\Application\Port\In\DeleteVehiculoUseCase;
use App\Application\Port\Out\VehiculoRepositoryPort;

class DeleteVehiculoService implements DeleteVehiculoUseCase
{
    public function __construct(private VehiculoRepositoryPort $repository) {}

    public function execute(VehiculoId $vehiculoid): void
    {
        //delegar al repositorio para eliminar vehículo
    }
}
