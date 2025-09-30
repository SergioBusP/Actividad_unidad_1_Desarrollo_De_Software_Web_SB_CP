<?php

namespace Application\Vehiculo\Dto\Command;

use Domain\Vehiculo\ValueObject\VehiculoId;

class DeleteVehiculoCommand
{
    public VehiculoId $vehiculoid;

    public function __construct(
        VehiculoId $vehiculoid
    ) {
        // Constructor sin implementación
    }
}