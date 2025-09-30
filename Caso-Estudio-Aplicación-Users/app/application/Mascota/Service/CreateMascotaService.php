<?php

namespace Application\Mascota\Service;

use Application\Mascota\Port\In\CreateMascotaUseCase;
use Application\Mascota\Dto\Command\CreateMascotaCommand;
use Application\Mascota\Port\Out\MascotaRepositoryPort;
use Domain\Mascota\Entity\Mascota;
use Domain\Mascota\ValueObject\MascotaId;

class CreateMascotaService implements CreateMascotaUseCase
{
    private MascotaRepositoryPort $repository;

    public function __construct(MascotaRepositoryPort $repository)
    {
        // Constructor sin implementación
    }

    public function execute(CreateMascotaCommand $command): void
    {
        // Aquí va la lógica para crear una nueva entidad Mascota y guardarla
    }
}
