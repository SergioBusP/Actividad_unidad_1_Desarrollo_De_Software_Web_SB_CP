<?php

namespace Application\Mascota\Port\In;

use Domain\Mascota\ValueObject\MascotaId;
use Application\Mascota\Dto\Response\MascotaResponse;

interface GetMascotaByIdUseCase
{
    public function execute(MascotaId $id): ?MascotaResponse;
}
