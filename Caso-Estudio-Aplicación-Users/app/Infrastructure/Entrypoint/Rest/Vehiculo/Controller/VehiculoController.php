<?php

namespace app\Infrastructure\Entrypoint\Rest\Vehiculo\Controller;

use app\Infrastructure\Entrypoint\Rest\Vehiculo\Request\CreateVehiculoHttpRequest;
use app\Infrastructure\Entrypoint\Rest\Vehiculo\Request\UpdateVehiculoHttpRequest;
use app\Infrastructure\Entrypoint\Rest\Vehiculo\Response\VehiculoHttpResponse;

class VehiculoController
{
    public function create(CreateVehiculoHttpRequest $request): VehiculoHttpResponse
    {
        // manejar petición para crear vehículo
    }

    public function update(string $placa, UpdateVehiculoHttpRequest $request): VehiculoHttpResponse
    {
        // manejar petición para actualizar vehículo
    }

    public function getById(string $placa): VehiculoHttpResponse
    {
        // manejar petición para obtener vehículo por placa
    }

    public function list(): VehiculoHttpResponse
    {
        // manejar petición para listar vehículos
    }

    public function delete(string $placa): VehiculoHttpResponse
    {
        // manejar petición para eliminar vehículo
    }
}
