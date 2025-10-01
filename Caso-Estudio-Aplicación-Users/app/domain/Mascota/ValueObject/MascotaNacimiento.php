<?php

namespace App\Domain\Mascota\ValueObject;

use DateTimeImmutable;
use InvalidArgumentException;

final class FechaNacimientoMascota
{
    private DateTimeImmutable $fecha;

    public function __construct(string $fecha)
    {
        $fechaObj = new DateTimeImmutable($fecha);

        if ($fechaObj > new DateTimeImmutable()) {
            throw new InvalidArgumentException("La fecha de nacimiento no puede ser futura.");
        }

        $this->fecha = $fechaObj;
    }

    public function value(): DateTimeImmutable
    {
        return $this->fecha;
    }
}
