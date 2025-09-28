<?php

namespace App\Domain\Event;

class UsuarioRenombrado
{
    private int $usuarioId;
    private string $nombreAnterior;
    private string $nombreNuevo;
    private \DateTimeImmutable $fecha;

    public function __construct(
        int $usuarioId,
        string $nombreAnterior,
        string $nombreNuevo,
        \DateTimeImmutable $fecha
    ) {
        $this->usuarioId = $usuarioId;
        $this->nombreAnterior = $nombreAnterior;
        $this->nombreNuevo = $nombreNuevo;
        $this->fecha = $fecha;
    }

    public function getUsuarioId(): int
    {
        return $this->usuarioId;
    }

    public function getNombreAnterior(): string
    {
        return $this->nombreAnterior;
    }

    public function getNombreNuevo(): string
    {
        return $this->nombreNuevo;
    }

    public function getFecha(): \DateTimeImmutable
    {
        return $this->fecha;
    }
}