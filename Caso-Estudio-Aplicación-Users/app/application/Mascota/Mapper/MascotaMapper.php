<?php

namespace Application\Mascota\Mapper;

use Domain\Mascota\Entity\Mascota;
use Application\Mascota\Dto\Response\MascotaResponse;

class MascotaMapper
{
    public static function toResponse(Mascota $mascota): MascotaResponse
    {
        // Convierte una entidad Mascota en un DTO MascotaResponse
    }

    /**
     * @param Mascota[] $mascotas
     * @return MascotaResponse[]
     */
    public static function toResponseList(array $mascotas): array
    {
        // Convierte un array de entidades Mascota en un array de MascotaResponse
    }
}
