<?php

namespace app\Infrastructure\Entrypoint\Rest\Vehiculo\Request;

class CreateVehiculoHttpRequest
{
    public function __construct(
        public readonly string $placa,
        public readonly string $marca,
        public readonly string $modelo,
        public readonly string $version,
        public readonly string $color,
        public readonly int $numPuestos,
        public readonly int $numPuertas,
        public readonly string $combustible,
        public readonly int $kilometraje,
        public readonly int $cilindraje,
        public readonly string $categoria,
    ) {}
}
