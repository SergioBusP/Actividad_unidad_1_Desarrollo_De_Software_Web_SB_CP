<?php

namespace Domain\Mascota\Exception;

use DomainException;

class MascotaDomainException extends DomainException
{
    public function __construct(string $message = "", int $code = 0, ?\Throwable $previous = null)
    {
        // Constructor sin implementación
    }
}
