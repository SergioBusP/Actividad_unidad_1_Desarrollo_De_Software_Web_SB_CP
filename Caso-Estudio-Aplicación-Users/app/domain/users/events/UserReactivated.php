<?php

namespace App\Domain\Event;

class UsuarioReactivado
{
    private int $usuarioId;
    private \DateTimeImmutable $fecha;

    public function __construct(int $usuarioId, \DateTimeImmutable $fecha)
    {
        $this->usuarioId = $usuarioId;
        $this->fecha = $fecha;
    }

    public function getUsuarioId(): int
    {
        return $this->usuarioId;
    }

    public function getFecha(): \DateTimeImmutable
    {
        return $this->fecha;
    }
}