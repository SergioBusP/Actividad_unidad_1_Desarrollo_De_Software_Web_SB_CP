<?php

namespace App\Domain\ValueObject;


final class Color
{
    private string $color;

    private function __construct(string $color)
    {
        $this->color = $color;
    }

    public function value(): string
    {
        
    }

    public function equals(Color $other): bool
    {
        
    }

    public function __toString(): string
    {
        
    }
}
