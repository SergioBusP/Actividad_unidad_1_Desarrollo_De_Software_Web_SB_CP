<?php

namespace Application\Mascota\Port\In;

use Domain\Mascota\ValueObject\MascotaId;

interface DeleteMascotaUseCase
{
    public function execute(MascotaId $id): void;
}
