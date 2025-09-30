<?php

namespace Domain\Mascota\Entity;

use Domain\Mascota\ValueObject\MascotaId;

class Mascota
{
    private MascotaId $id;
    private string $nombre;
    private string $genero;
    private float $peso;
    private string $tamano;
    private string $color;
    private string $raza;
    private string $especie;
    private \DateTimeImmutable $fechaNacimiento;
    private string $propietario; 
    private string $domesticoOSalvaje;
    private bool $tieneVacunas;
    private string $veterinario;

    public function __construct(
        MascotaId $id,
        string $nombre,
        string $genero,
        float $peso,
        string $tamano,
        string $color,
        string $raza,
        string $especie,
        \DateTimeImmutable $fechaNacimiento,
        string $propietario,
        string $domesticoOSalvaje,
        bool $tieneVacunas,
        string $veterinario
    ) {
        // Constructor sin implementación
    }

    public function getId(): MascotaId
    {
        // ...
    }

    public function getNombre(): string
    {
        // ...
    }

    public function getGenero(): string
    {
        // ...
    }

    public function getPeso(): float
    {
        // ...
    }

    public function getTamano(): string
    {
        // ...
    }

    public function getColor(): string
    {
        // ...
    }

    public function getRaza(): string
    {
        // ...
    }

    public function getEspecie(): string
    {
        // ...
    }

    public function getFechaNacimiento(): \DateTimeImmutable
    {
        // ...
    }

    public function getPropietario(): string
    {
        // ...
    }

    public function getDomesticoOSalvaje(): string
    {
        // ...
    }

    public function tieneVacunas(): bool
    {
        // ...
    }

    public function getVeterinario(): string
    {
        // ...
    }

    public function actualizarDatos(
        string $nombre,
        string $genero,
        float $peso,
        string $tamano,
        string $color,
        string $raza,
        string $especie,
        \DateTimeImmutable $fechaNacimiento,
        string $domesticoOSalvaje,
        bool $tieneVacunas,
        string $veterinario
    ): void {
        // ...
    }
}
