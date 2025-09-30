<?php

namespace Application\Mascota\Service;

use Application\Mascota\Port\In\ListMascotaUseCase;
use Application\Mascota\Port\Out\MascotaRepositoryPort;
use Application\Mascota\Mapper\MascotaMapper;
use Application\Mascota\Dto\Response\MascotaListResponse;

class ListMascotaService implements ListMascotaUseCase
{
    private MascotaRepositoryPort $repository;

    public function __construct(MascotaRepositoryPort $repository)
    {
        // Constructor sin implementación
    }

    public function execute(): MascotaListResponse
    {
        // Aquí va la lógica para obtener todas las mascotas y devolver un MascotaListResponse
    }
}
