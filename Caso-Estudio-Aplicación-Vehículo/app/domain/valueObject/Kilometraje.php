<?php

namespace App\Domain\ValueObject;


final class Kilometraje
{
    private int $kilometraje;

    private function __construct(int $kilometraje)
    {
        $this->kilometraje = $kilometraje;
    }

    public function value(): int
    {
        
    }

    public function equals(Kilometraje $other): bool
    {
        
    }

    public function __toString(): string
    {
        
    }
}
