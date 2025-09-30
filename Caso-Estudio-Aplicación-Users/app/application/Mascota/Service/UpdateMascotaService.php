<?php

namespace Application\Mascota\Service;

use Application\Mascota\Port\In\UpdateMascotaUseCase;
use Application\Mascota\Dto\Command\UpdateMascotaCommand;
use Application\Mascota\Port\Out\MascotaRepositoryPort;
use Domain\Mascota\ValueObject\MascotaId;
use Domain\Mascota\Entity\Mascota;

class UpdateMascotaService implements UpdateMascotaUseCase
{
    private MascotaRepositoryPort $repository;

    public function __construct(MascotaRepositoryPort $repository)
    {
        // Constructor sin implementación
    }

    public function execute(UpdateMascotaCommand $command): void
    {
        // Aquí va la lógica para actualizar una mascota existente
    }
}
