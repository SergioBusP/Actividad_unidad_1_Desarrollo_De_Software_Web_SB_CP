<?php

namespace Application\Mascota\Service;

use Application\Mascota\Port\In\DeleteMascotaUseCase;
use Application\Mascota\Port\Out\MascotaRepositoryPort;
use Domain\Mascota\ValueObject\MascotaId;

class DeleteMascotaService implements DeleteMascotaUseCase
{
    private MascotaRepositoryPort $repository;

    public function __construct(MascotaRepositoryPort $repository)
    {
        // Constructor sin implementación
    }

    public function execute(MascotaId $id): void
    {
        // Aquí va la lógica para eliminar una mascota por id
    }
}
