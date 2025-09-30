<?php

namespace Application\Vehiculo\Dto\Response;

class VehiculoListResponse
{
    /** @var VehiculoResponse[] */
    public array $vehiculos;

    public function __construct(array $vehiculos)
    {
        // Constructor sin implementación
    }
}
