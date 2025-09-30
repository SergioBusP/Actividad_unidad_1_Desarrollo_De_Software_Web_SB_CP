<?php

namespace App\Domain\ValueObject;


final class Motor
{
    private int $cilindraje;
    private string $combustible;

    private function __construct(int $cilindraje, string $combustible)
    {
        $this->cilindraje = $cilindraje;
        $this->combustible = $combustible;
    }

    public function value_cilindraje(): int
    {
        
    }

    public function value_combustible(): string
    {
        
    }

    public function equals(Motor $other): bool
    {
        
    }

    public function __toString(): string
    {
        
    }
}
