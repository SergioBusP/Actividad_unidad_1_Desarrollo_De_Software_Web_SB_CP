<?php

namespace Application\Vehiculo\Mapper;

use Domain\Vehiculo\Entity\Vehiculo;
use Application\Vehiculo\Dto\Response\VehiculoResponse;

class Vehiculo
{
    public static function toResponse(Vehiculo $vehiculo): VehiculoResponse
    {
        // Convierte una entidad Vehiculo en un DTO VehiculoResponse
    }

    /**
     * @param Vehiculo[] $vehiculos
     * @return VehiculoResponse[]
     */
    public static function toResponseList(array $Vehiculos): array
    {
        // Convierte un array de entidades vehiculo en un array de vehiculoResponse
    }
}
