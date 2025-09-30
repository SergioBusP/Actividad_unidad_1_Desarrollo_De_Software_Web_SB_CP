<?php

namespace App\Application\Service;

use App\Application\Dto\Command\LogoutCommand;
use App\Application\Port\In\LogoutUseCase;
use App\Application\Port\Out\TokenIssuerPort;

class LogoutService implements LogoutUseCase
{
    private TokenIssuerPort $tokenIssuer;

    public function __construct(TokenIssuerPort $tokenIssuer)
    {
        $this->tokenIssuer = $tokenIssuer;
    }

    public function logout(LogoutCommand $command): void
    {
        // 1. Invalidar el token actual
        // Dependiendo de la implementación de TokenIssuerPort,
        // esto podría ser agregar el token a una blacklist o
        // simplemente eliminarlo en almacenamiento de sesiones.
        
        $this->tokenIssuer->invalidateToken($command->getToken());
    }
}
