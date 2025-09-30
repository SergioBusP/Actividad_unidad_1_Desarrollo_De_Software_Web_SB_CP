<?php

namespace Application\Mascota\Dto\Command;

use DateTimeImmutable;

class CreateMascotaCommand
{
    public string $nombre;
    public string $genero;
    public float $peso;
    public string $tamano;
    public string $color;
    public string $raza;
    public string $especie;
    public DateTimeImmutable $fechaNacimiento;
    public string $propietario;
    public string $domesticoOSalvaje;
    public bool $tieneVacunas;
    public string $veterinario;

    public function __construct(
        string $nombre,
        string $genero,
        float $peso,
        string $tamano,
        string $color,
        string $raza,
        string $especie,
        DateTimeImmutable $fechaNacimiento,
        string $propietario,
        string $domesticoOSalvaje,
        bool $tieneVacunas,
        string $veterinario
    ) {
        // Constructor sin implementación
    }
}
