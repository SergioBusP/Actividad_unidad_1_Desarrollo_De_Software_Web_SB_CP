<?php

namespace app\Infrastructure\Entrypoint\Rest\Vehiculo\Request;

class UpdateVehiculoHttpRequest
{
    public function __construct(
        public readonly ?string $marca = null,
        public readonly ?string $modelo = null,
        public readonly ?string $version = null,
        public readonly ?string $color = null,
        public readonly ?int $numPuestos = null,
        public readonly ?int $numPuertas = null,
        public readonly ?string $combustible = null,
        public readonly ?int $kilometraje = null,
        public readonly ?int $cilindraje = null,
        public readonly ?string $categoria = null,
    ) {}
}
