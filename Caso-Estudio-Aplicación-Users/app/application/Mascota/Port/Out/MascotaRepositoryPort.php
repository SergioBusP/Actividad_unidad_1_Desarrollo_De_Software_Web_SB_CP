<?php

namespace Application\Mascota\Port\Out;

use Domain\Mascota\Entity\Mascota;
use Domain\Mascota\ValueObject\MascotaId;

interface MascotaRepositoryPort
{
    public function save(Mascota $mascota): void;

    public function delete(MascotaId $id): void;

    public function findById(MascotaId $id): ?Mascota;

    /**
     * @return Mascota[]
     */
    public function findAll(): array;
}
