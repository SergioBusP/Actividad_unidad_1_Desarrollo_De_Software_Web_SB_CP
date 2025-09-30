<?php

namespace Application\Vehiculo\Dto\Response;

class VehiculoResponse
{
    public int $vehiculoid;
    public int $numPuertas;
    public int $numPuestos;
    public string $color;
    public int $kilometraje;
    public string $marca;
    public string $modelo;
    public int $cilindraje;
    public string $combustible;
    public string $placa;

    public function __construct(
        int $vehiculoid,
        int $numPuertas,
        int $numPuestos,
        string $color,
        int $kilometraje,
        string $marca,
        string $modelo,
        int $cilindraje,
        string $combustible,
        string $placa
    ) {
        // Constructor sin implementación
    }
}
