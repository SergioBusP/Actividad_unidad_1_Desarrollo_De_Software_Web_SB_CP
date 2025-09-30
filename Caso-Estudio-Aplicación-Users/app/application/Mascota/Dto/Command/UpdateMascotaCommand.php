<?php

namespace Application\Mascota\Dto\Command;

use DateTimeImmutable;
use Domain\Mascota\ValueObject\MascotaId;

class UpdateMascotaCommand
{
    public MascotaId $id;
    public string $nombre;
    public string $genero;
    public float $peso;
    public string $tamano;
    public string $color;
    public string $raza;
    public string $especie;
    public DateTimeImmutable $fechaNacimiento;
    public string $domesticoOSalvaje;
    public bool $tieneVacunas;
    public string $veterinario;

    public function __construct(
        MascotaId $id,
        string $nombre,
        string $genero,
        float $peso,
        string $tamano,
        string $color,
        string $raza,
        string $especie,
        DateTimeImmutable $fechaNacimiento,
        string $domesticoOSalvaje,
        bool $tieneVacunas,
        string $veterinario
    ) {
        // Constructor sin implementación
    }
}
