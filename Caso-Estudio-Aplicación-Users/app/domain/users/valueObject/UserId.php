<?php

namespace App\Domain\ValueObject;

use App\Domain\Exception\DomainException;

final class UserId
{
    private int $valor;

    private function __construct(int $valor)
    {
        if ($valor <= 0) {
            throw new DomainException("El UserId debe ser un entero positivo.");
        }
        $this->valor = $valor;
    }

    public static function fromInt(int $valor): self
    {
        return new self($valor);
    }

    public function value(): int
    {
        return $this->valor;
    }

    public function equals(UserId $other): bool
    {
        return $this->valor === $other->valor;
    }

    public function __toString(): string
    {
        return (string) $this->valor;
    }
}
