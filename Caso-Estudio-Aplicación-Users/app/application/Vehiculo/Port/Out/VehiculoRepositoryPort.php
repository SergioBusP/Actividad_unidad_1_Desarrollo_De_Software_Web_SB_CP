<?php

namespace App\Application\Port\Out;

use Domain\Vehiculo\Entity\Vehiculo;
use Domain\Vehiculo\ValueObject\VehiculoId;

interface VehiculoRepositoryPort
{
    public function save(Vehiculo $vehiculo): void;

    public function delete(VehiculoId $vehiculoid): void;

    public function findById(VehiculoId $vehiculoid): ?Vehiculo;

    public function findAll(): array;

    public function update(Vehiculo $vehiculo): void;
}
