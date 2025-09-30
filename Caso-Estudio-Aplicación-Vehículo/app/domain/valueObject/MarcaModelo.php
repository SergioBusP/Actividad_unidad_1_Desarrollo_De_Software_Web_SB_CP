<?php

namespace App\Domain\ValueObject;


final class MarcaModelo
{
    private string $marca;
    private string $modelo;

    private function __construct(string $marca, string $modelo)
    {
        $this->marca = $marca;
        $this->modelo = $modelo;
    }

    public function value_marca(): string
    {
        
    }

    public function value_modelo(): string
    {
        
    }

    public function equals(MarcaModelo $other): bool
    {
        
    }

    public function __toString(): string
    {
        
    }
}
