<?php

namespace App\Domain\ValueObject;

use App\Domain\Exception\PasswordInvalidaException;

final class PasswordHash
{
    private string $hash;

    private function __construct(string $hash)
    {
        if (empty($hash)) {
            throw new PasswordInvalidaException("El hash de la contraseña no puede estar vacío.");
        }

        $this->hash = $hash;
    }

    /**
     * Fábrica para crear el VO desde un hash ya generado.
     */
    public static function fromHash(string $hash): self
    {
        return new self($hash);
    }

    /**
     * Fábrica para crear desde una contraseña en claro usando un servicio externo.
     * (El servicio de dominio PasswordHasher se usaría fuera de esta clase,
     * pero esta es otra alternativa si se quiere encapsular aún más).
     */
    public static function fromPlain(string $plainPassword, callable $hashFunction): self
    {
        $hash = $hashFunction($plainPassword);
        return new self($hash);
    }

    /**
     * Devuelve el hash como string (solo para persistencia o comparación).
     */
    public function value(): string
    {
        return $this->hash;
    }

    /**
     * Verifica si un plain password corresponde a este hash.
     */
    public function verify(string $plainPassword, callable $verifyFunction): bool
    {
        return $verifyFunction($plainPassword, $this->hash);
    }

    /**
     * Igualdad por valor.
     */
    public function equals(self $other): bool
    {
        return $this->hash === $other->hash;
    }

    public function __toString(): string
    {
        return $this->hash;
    }
}
