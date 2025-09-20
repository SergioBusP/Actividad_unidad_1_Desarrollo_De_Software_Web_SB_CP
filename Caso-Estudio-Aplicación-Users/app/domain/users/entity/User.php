<?php

namespace App\Domain\Entity;

class Usuario
{
    private int $id;
    private string $nombre;
    private string $email;
    private string $passwordHash;
    private \DateTimeImmutable $fechaCreacion;
    private \DateTimeImmutable $fechaActualizacion;
    private bool $activo;

    public function __construct(
        int $id,
        string $nombre,
        string $email,
        string $passwordHash,
        \DateTimeImmutable $fechaCreacion,
        \DateTimeImmutable $fechaActualizacion,
        bool $activo = true
    ) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->passwordHash = $passwordHash;
        $this->fechaCreacion = $fechaCreacion;
        $this->fechaActualizacion = $fechaActualizacion;
        $this->activo = $activo;
    }

    // --- Getters ---
    public function getId(): int { return $this->id; }
    public function getNombre(): string { return $this->nombre; }
    public function getEmail(): string { return $this->email; }
    public function getPasswordHash(): string { return $this->passwordHash; }
    public function getFechaCreacion(): \DateTimeImmutable { return $this->fechaCreacion; }
    public function getFechaActualizacion(): \DateTimeImmutable { return $this->fechaActualizacion; }
    public function isActivo(): bool { return $this->activo; }

    // --- Métodos de dominio ---
    public function actualizarNombre(string $nuevoNombre): void
    {
        $this->nombre = $nuevoNombre;
        $this->fechaActualizacion = new \DateTimeImmutable();
    }

    public function actualizarEmail(string $nuevoEmail): void
    {
        $this->email = $nuevoEmail;
        $this->fechaActualizacion = new \DateTimeImmutable();
    }

    public function cambiarPassword(string $nuevoPasswordHash): void
    {
        $this->passwordHash = $nuevoPasswordHash;
        $this->fechaActualizacion = new \DateTimeImmutable();
    }

    public function desactivar(): void
    {
        $this->activo = false;
        $this->fechaActualizacion = new \DateTimeImmutable();
    }

    public function activar(): void
    {
        $this->activo = true;
        $this->fechaActualizacion = new \DateTimeImmutable();
    }

    public function validarPassword(string $passwordPlano): bool
    {
        return password_verify($passwordPlano, $this->passwordHash);
    }
}