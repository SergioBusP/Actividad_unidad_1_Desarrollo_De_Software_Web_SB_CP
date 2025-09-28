<?php

namespace App\Domain\ValueObject;

use App\Domain\Exception\RolInvalidoException;

final class Rol
{
    private string $valor;

    private const ROLES_VALIDOS = [
        'ADMIN',
        'USER',
        'MODERATOR',
    ];

    private function __construct(string $valor)
    {
        if (!in_array($valor, self::ROLES_VALIDOS, true)) {
            throw new RolInvalidoException("El rol '{$valor}' no es válido.");
        }

        $this->valor = $valor;
    }

    /**
     * Crea un Rol desde un string validado.
     */
    public static function fromString(string $valor): self
    {
        return new self(strtoupper(trim($valor)));
    }

    /**
     * Devuelve el rol como string.
     */
    public function value(): string
    {
        return $this->valor;
    }

    /**
     * Compara por valor.
     */
    public function equals(Rol $other): bool
    {
        return $this->valor === $other->valor;
    }

    public function __toString(): string
    {
        return $this->valor;
    }
}
