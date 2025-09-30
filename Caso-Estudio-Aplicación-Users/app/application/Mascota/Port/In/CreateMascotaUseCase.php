<?php

namespace Application\Mascota\Port\In;

use Application\Mascota\Dto\Command\CreateMascotaCommand;

interface CreateMascotaUseCase
{
    public function execute(CreateMascotaCommand $command): void;
}
