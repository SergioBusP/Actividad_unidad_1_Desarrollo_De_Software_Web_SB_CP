<?php

namespace App\Domain\ValueObject;

use App\Domain\Exception\UsernameInvalidoException;

final class UserName
{
    private string $valor;

    private function __construct(string $valor)
    {
        $valor = trim($valor);

        if (strlen($valor) < 3) {
            throw new UsernameInvalidoException("El nombre de usuario debe tener al menos 3 caracteres.");
        }

        if (strlen($valor) > 30) {
            throw new UsernameInvalidoException("El nombre de usuario no puede exceder 30 caracteres.");
        }

        if (!preg_match('/^[a-zA-Z0-9_]+$/', $valor)) {
            throw new UsernameInvalidoException("El nombre de usuario solo puede contener letras, números y guiones bajos.");
        }

        $this->valor = $valor;
    }

    public static function fromString(string $valor): self
    {
        return new self($valor);
    }

    public function value(): string
    {
        return $this->valor;
    }

    public function equals(UserName $other): bool
    {
        return strtolower($this->valor) === strtolower($other->valor);
    }

    public function __toString(): string
    {
        return $this->valor;
    }
}
