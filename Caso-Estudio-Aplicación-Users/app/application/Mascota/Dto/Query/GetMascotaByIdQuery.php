<?php

namespace Application\Mascota\Dto\Query;

use Domain\Mascota\ValueObject\MascotaId;

class GetMascotaByIdQuery
{
    public MascotaId $id;

    public function __construct(MascotaId $id)
    {
        // Constructor sin implementación
    }
}
