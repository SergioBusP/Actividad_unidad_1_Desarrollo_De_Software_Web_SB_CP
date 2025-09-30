<?php

namespace Application\Mascota\Port\In;

use Application\Mascota\Dto\Command\UpdateMascotaCommand;

interface UpdateMascotaUseCase
{
    public function execute(UpdateMascotaCommand $command): void;
}
