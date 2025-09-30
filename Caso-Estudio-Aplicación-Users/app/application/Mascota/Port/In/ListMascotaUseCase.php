<?php

namespace Application\Mascota\Port\In;

use Application\Mascota\Dto\Response\MascotaListResponse;

interface ListMascotaUseCase
{
    public function execute(): MascotaListResponse;
}
