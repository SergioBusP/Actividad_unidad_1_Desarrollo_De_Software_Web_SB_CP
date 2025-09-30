<?php

namespace App\Application\Port\In;

use Application\Vehiculo\Dto\Command\CrearVehiculoCommand;

interface CreateVehiculoUseCase
{
    public function execute(CrearVehiculoCommand $command): void
    {
        
    }
}
