<?php

namespace Application\Vehiculo\Dto\Query;

use Domain\Vehiculo\ValueObject\VehiculoId;

class GetVehiculoByIdQuery
{
    public VehiculoId $id;

    public function __construct(VehiculoId $id)
    {
        // Constructor sin implementación
    }
}
