<?php

namespace Domain\Mascota\Event;

use Domain\Mascota\ValueObject\MascotaId;

class MascotaDeleted
{
    private MascotaId $id;
    private \DateTimeImmutable $fechaEvento;

    public function __construct(MascotaId $id)
    {
        // Constructor sin implementación
    }

    public function getId(): MascotaId
    {
        // ...
    }

    public function getFechaEvento(): \DateTimeImmutable
    {
        // ...
    }
}
