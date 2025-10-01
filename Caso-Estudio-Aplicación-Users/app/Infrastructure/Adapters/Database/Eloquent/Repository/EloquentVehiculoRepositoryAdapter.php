<?php

namespace Infrastructure\Adapters\Database\Eloquent\Repository;

use Application\Vehiculo\Port\Out\VehiculoRepositoryPort;
use Application\Vehiculo\Dto\Response\VehiculoListResponse;
use Domain\Vehiculo\Entity\Vehiculo;
use Domain\Vehiculo\ValueObject\VehiculoId;
use Infrastructure\Adapters\Database\Eloquent\Model\VehiculoModel;

class EloquentVehiculoRepositoryAdapter implements VehiculoRepositoryPort
{
    public function save(Vehiculo $Vehiculo): Vehiculo
    {
        
    }

    public function findById(VehiculoId $vehiculoid): ?Vehiculo
    {
        
    }

    public function findAll(): VehiculoListResponse
    {
    }

    public function deleteById(VehiculoId $vehiculoid): void
    {

    }

    private function toDomain(VehiculoModel $model): Vehiculo
    {
        
    }
}
