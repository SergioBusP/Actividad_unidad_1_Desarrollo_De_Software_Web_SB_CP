<?php

namespace Application\Mascota\Service;

use Application\Mascota\Port\In\GetMascotaByIdUseCase;
use Application\Mascota\Port\Out\MascotaRepositoryPort;
use Application\Mascota\Mapper\MascotaMapper;
use Domain\Mascota\ValueObject\MascotaId;
use Application\Mascota\Dto\Response\MascotaResponse;

class GetMascotaByIdService implements GetMascotaByIdUseCase
{
    private MascotaRepositoryPort $repository;

    public function __construct(MascotaRepositoryPort $repository)
    {
        // Constructor sin implementación
    }

    public function execute(MascotaId $id): ?MascotaResponse
    {
        // Aquí va la lógica para obtener una mascota por id y mapearla a MascotaResponse
    }
}
