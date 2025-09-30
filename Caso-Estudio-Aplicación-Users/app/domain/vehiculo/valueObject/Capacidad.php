<?php

namespace App\Domain\ValueObject;


final class Capacidad
{
    private int $numPuestos;
    private int $numPuertas;

    private function __construct(int $numPuestos, int $numPuertas)
    {
        $this->numPuestos = $numPuestos;
        $this->numPuertas = $numPuertas;
    }

    public function value_Puestos(): int
    {
        
    }

    public function value_Puertas(): int
    {
        
    }

    public function equals(Capacidad $other): bool
    {
        
    }

    public function __toString(): string
    {
        
    }
}
