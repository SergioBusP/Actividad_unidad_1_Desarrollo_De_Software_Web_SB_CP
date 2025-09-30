<?php

namespace Application\Mascota\Dto\Response;

class MascotaListResponse
{
    /** @var MascotaResponse[] */
    public array $mascotas;

    public function __construct(array $mascotas)
    {
        // Constructor sin implementación
        // El array debe contener instancias de MascotaResponse
    }
}
