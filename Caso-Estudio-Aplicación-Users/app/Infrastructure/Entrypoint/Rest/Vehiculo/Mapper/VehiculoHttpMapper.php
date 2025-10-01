<?php

namespace app\Infrastructure\Entrypoint\Rest\Vehiculo\Mapper;

use app\Domain\vehiculo\Entity\Vehiculo;

class VehiculoHttpMapper
{
    public static function toArray(Vehiculo $vehiculo): array
    {
        return [
            'placa'       => $vehiculo->getPlaca(),
            'marca'       => $vehiculo->getMarca(),
            'modelo'      => $vehiculo->getModelo(),
            'version'     => $vehiculo->getVersion(),
            'color'       => $vehiculo->getColor(),
            'numPuestos'  => $vehiculo->getNumPuestos(),
            'numPuertas'  => $vehiculo->getNumPuertas(),
            'combustible' => $vehiculo->getCombustible(),
            'kilometraje'  => $vehiculo->getKilometraje(),
            'cilindraje'  => $vehiculo->getCilindraje(),
            'categoria'   => $vehiculo->getCategoria(),
        ];
    }
}
