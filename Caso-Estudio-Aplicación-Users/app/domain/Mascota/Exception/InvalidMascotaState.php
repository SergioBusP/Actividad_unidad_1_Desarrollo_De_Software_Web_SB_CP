<?php

namespace Domain\Mascota\Exception;

class MascotaNotFoundException extends MascotaDomainException
{
    public function __construct(string $mensaje = "Mascota no encontrada.")
    {
        // Constructor sin implementación
    }
}
