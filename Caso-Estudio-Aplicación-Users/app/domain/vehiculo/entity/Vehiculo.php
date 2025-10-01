<?php

namespace App\Domain\Entity;

class Vehiculo
{
    private string $placa;
    private string $marca;
    private string $modelo;
    private string $version;
    private string $color;
    private int $numPuestos;
    private int $numPuertas;
    private string $combustible;
    private int $kilometros;
    private int $cilindraje;
    private string $categoria;

    public function __construct(
        string $placa,
        string $marca,
        string $modelo,
        string $version,
        string $color,
        int $numPuestos,
        int $numPuertas,
        string $combustible,
        int $kilometros,
        int $cilindraje,
        string $categoria
    ) {
        $this->setPlaca($placa);
        $this->setMarca($marca);
        $this->setModelo($modelo);
        $this->setVersion($version);
        $this->setColor($color);
        $this->setNumPuestos($numPuestos);
        $this->setNumPuertas($numPuertas);
        $this->setCombustible($combustible);
        $this->setKilometros($kilometros);
        $this->setCilindraje($cilindraje);
        $this->setCategoria($categoria);
    }

    //Getters
    public function getPlaca(): string { return $this->placa; }
    public function getMarca(): string { return $this->marca; }
    public function getModelo(): string { return $this->modelo; }
    public function getVersion(): string { return $this->version; }
    public function getColor(): string { return $this->color; }
    public function getNumPuestos(): int { return $this->numPuestos; }
    public function getNumPuertas(): int { return $this->numPuertas; }
    public function getCombustible(): string { return $this->combustible; }
    public function getKilometros(): int { return $this->kilometros; }
    public function getCilindraje(): int { return $this->cilindraje; }
    public function getCategoria(): string { return $this->categoria; }

    //Setters
    public function setPlaca(string $placa): void
    {
        $this->placa = $placa;
    }

    public function setMarca(string $marca): void
    {
        $this->marca = $marca;
    }

    public function setModelo(string $modelo): void
    {
        $this->modelo = $modelo;
    }

    public function setVersion(string $version): void
    {
        $this->version = $version;
    }

    public function setColor(string $color): void
    {
        $this->color = $color;
    }

    public function setNumPuestos(int $numPuestos): void
    {
        $this->numPuestos = $numPuestos;
    }

    public function setNumPuertas(int $numPuertas): void
    {
        $this->numPuertas = $numPuertas;
    }

    public function setCombustible(string $combustible): void
    {
        $this->combustible = $combustible;
    }

    public function setKilometros(int $kilometros): void
    {
        $this->kilometros = $kilometros;
    }

    public function setCilindraje(int $cilindraje): void
    {
        $this->cilindraje = $cilindraje;
    }

    public function setCategoria(string $categoria): void
    {
        $this->categoria = $categoria;
    }
}
