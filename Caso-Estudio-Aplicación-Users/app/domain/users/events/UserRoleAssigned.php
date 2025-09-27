<?php

namespace App\Domain\Event;

class RolAsignadoAUsuario
{
    private int $usuarioId;
    private string $rol;
    private \DateTimeImmutable $fecha;

    public function __construct(int $usuarioId, string $rol, \DateTimeImmutable $fecha)
    {
        $this->usuarioId = $usuarioId;
        $this->rol = $rol;
        $this->fecha = $fecha;
    }

    public function getUsuarioId(): int
    {
        return $this->usuarioId;
    }

    public function getRol(): string
    {
        return $this->rol;
    }

    public function getFecha(): \DateTimeImmutable
    {
        return $this->fecha;
    }
}