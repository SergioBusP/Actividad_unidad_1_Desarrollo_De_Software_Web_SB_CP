<?php

namespace App\Domain\Mascota\ValueObject;

use InvalidArgumentException;

final class Peso
{
    private float $valor; // en kg

    public function __construct(float $valor)
    {
        if ($valor <= 0) {
            throw new InvalidArgumentException("El peso debe ser mayor que cero.");
        }
        $this->valor = $valor;
    }

    public function value(): float
    {
        return $this->valor;
    }
}
