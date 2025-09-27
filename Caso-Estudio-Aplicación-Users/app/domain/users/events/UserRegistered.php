<?php

namespace App\Domain\Event;

class UsuarioRegistrado
{
    private int $usuarioId;
    private string $email;
    private \DateTimeImmutable $fecha;

    public function __construct(int $usuarioId, string $email, \DateTimeImmutable $fecha)
    {
        $this->usuarioId = $usuarioId;
        $this->email = $email;
        $this->fecha = $fecha;
    }

    public function getUsuarioId(): int
    {
        return $this->usuarioId;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getFecha(): \DateTimeImmutable
    {
        return $this->fecha;
    }
}