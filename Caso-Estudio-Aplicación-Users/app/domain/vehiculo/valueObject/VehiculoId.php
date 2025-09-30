<?php

namespace App\Domain\ValueObject;

use App\Domain\Exception\VehiculoDomainException;

final class VehiculoId
{
    private int $valor;

    private function __construct(int $valor)
    {
        if ($valor <= 0) {
            throw new DomainException("El Id debe ser un entero positivo.");
        }
        $this->valor = $valor;
    }

    public static function fromInt(int $valor): self
    {
        
    }

    public function value(): int
    {
        
    }

    public function equals(VehiculoId $other): bool
    {
        
    }

    public function __toString(): string
    {
        
    }
}
