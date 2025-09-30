<?php

namespace Domain\Mascota\ValueObject;

use InvalidArgumentException;

class MascotaId
{
    private string $id;

    public function __construct(string $id)
    {
        // Constructor sin implementación
        // Aquí normalmente validaría que el id sea un UUID válido o algo similar
    }

    public function getId(): string
    {
        // ...
    }

    public function __toString(): string
    {
        // ...
    }

    public function equals(MascotaId $other): bool
    {
        // Compara si dos MascotaId son iguales
    }
}
