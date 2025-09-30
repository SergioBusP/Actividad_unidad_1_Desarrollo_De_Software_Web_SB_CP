<?php

namespace Application\Mascota\Dto\Command;

use Domain\Mascota\ValueObject\MascotaId;

class DeleteMascotaCommand
{
    public MascotaId $id;

    public function __construct(MascotaId $id)
    {
        // Constructor sin implementación
    }
}
