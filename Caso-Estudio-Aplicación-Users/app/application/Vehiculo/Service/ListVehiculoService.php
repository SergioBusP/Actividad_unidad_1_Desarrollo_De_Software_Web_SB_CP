<?php

namespace App\Application\Service;

use App\Application\Port\In\ListVehiculoUseCase;
use App\Application\Port\Out\VehiculoRepositoryPort;

class ListVehiculoService implements ListVehiculoUseCase
{
    public function __construct(private VehiculoRepositoryPort $repository) {}

    public function execute(): void
    {
        //delegar al repositorio para listar todos los vehículos
    }
}
