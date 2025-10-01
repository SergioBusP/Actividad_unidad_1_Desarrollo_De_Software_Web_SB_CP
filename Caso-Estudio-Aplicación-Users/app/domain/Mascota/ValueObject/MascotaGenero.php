<?php

namespace App\Domain\Mascota\ValueObject;

use InvalidArgumentException;

final class GeneroMascota
{
    private string $genero;

    private const VALIDOS = ["macho", "hembra"];

    public function __construct(string $genero)
    {
        $genero = strtolower(trim($genero));

        if (!in_array($genero, self::VALIDOS, true)) {
            throw new InvalidArgumentException("Género de mascota inválido: $genero");
        }

        $this->genero = $genero;
    }

    public function value(): string
    {
        return $this->genero;
    }
}
