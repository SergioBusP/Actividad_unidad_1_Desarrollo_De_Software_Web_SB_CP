<?php

namespace App\Domain\Model;

use App\Domain\Event\UsuarioRegistrado;
use App\Domain\Event\UsuarioDesactivado;
use App\Domain\Event\UsuarioReactivado;
use App\Domain\Event\UsuarioRenombrado;
use App\Domain\Event\UsuarioRolAsignado;
use App\Domain\Event\UsuarioPasswordCambiado;
use App\Domain\Exception\UsuarioYaActivoException;
use App\Domain\Exception\UsuarioYaInactivoException;
use App\Domain\Service\PasswordHasher;
use App\Domain\Service\PasswordStrengthEvaluator;
use App\Domain\ValueObject\PasswordHash;
use App\Domain\ValueObject\Rol;


class Usuario
{
    private int $id;
    private string $nombre;
    private string $email;
    private PasswordHash $password;
    private array $roles;
    private bool $activo;
    private \DateTimeImmutable $fechaCreacion;
    private \DateTimeImmutable $fechaActualizacion;

    private function __construct(
        int $id,
        string $nombre,
        string $email,
        PasswordHash $password,
        array $roles,
        \DateTimeImmutable $fechaCreacion,
        \DateTimeImmutable $fechaActualizacion,
        bool $activo
    ) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->password = $password;
        $this->roles = $roles;
        $this->fechaCreacion = $fechaCreacion;
        $this->fechaActualizacion = $fechaActualizacion;
        $this->activo = $activo;
    }

    /**
     * Fábrica para registrar un usuario (Aggregate creation).
     */
    public static function registrar(
        int $id,
        string $nombre,
        string $email,
        string $plainPassword,
        PasswordHasher $hasher,
        PasswordStrengthEvaluator $evaluator
    ): array {
        $evaluator->validate($plainPassword);

        $passwordHash = PasswordHash::fromHash($hasher->hash($plainPassword));
        $fecha = new \DateTimeImmutable();

        $usuario = new self(
            $id,
            $nombre,
            $email,
            $passwordHash,
            [],
            $fecha,
            $fecha,
            true
        );

        $evento = new UsuarioRegistrado($id, $email, $fecha);

        return [$usuario, $evento];
    }

    public function desactivar(): UsuarioDesactivado
    {
        if (!$this->activo) {
            throw new UsuarioYaInactivoException();
        }

        $this->activo = false;
        $this->fechaActualizacion = new \DateTimeImmutable();

        return new UsuarioDesactivado($this->id, $this->fechaActualizacion);
    }

    public function reactivar(): UsuarioReactivado
    {
        if ($this->activo) {
            throw new UsuarioYaActivoException();
        }

        $this->activo = true;
        $this->fechaActualizacion = new \DateTimeImmutable();

        return new UsuarioReactivado($this->id, $this->fechaActualizacion);
    }

    public function cambiarPassword(
        string $nuevoPassword,
        PasswordHasher $hasher,
        PasswordStrengthEvaluator $evaluator
    ): UsuarioPasswordCambiado {
        $evaluator->validate($nuevoPassword);

        $this->password = PasswordHash::fromHash($hasher->hash($nuevoPassword));
        $this->fechaActualizacion = new \DateTimeImmutable();

        return new UsuarioPasswordCambiado($this->id, $this->fechaActualizacion);
    }

    public function renombrar(string $nuevoNombre): UsuarioRenombrado
    {
        $this->nombre = $nuevoNombre;
        $this->fechaActualizacion = new \DateTimeImmutable();

        return new UsuarioRenombrado($this->id, $nuevoNombre, $this->fechaActualizacion);
    }

    public function asignarRol(Rol $rol): UsuarioRolAsignado
    {
        foreach ($this->roles as $r) {
            if ($r->equals($rol)) {
                // Ya existe, no duplicamos
                return new UsuarioRolAsignado($this->id, $rol->value(), $this->fechaActualizacion);
            }
        }

        $this->roles[] = $rol;
        $this->fechaActualizacion = new \DateTimeImmutable();

        return new UsuarioRolAsignado($this->id, $rol->value(), $this->fechaActualizacion);
    }


    // ✅ Getters expuestos (sin setters)
    public function id(): int { return $this->id; }
    public function nombre(): string { return $this->nombre; }
    public function email(): string { return $this->email; }
    public function roles(): array { return $this->roles; }
    public function activo(): bool { return $this->activo; }

    public function passwordHash(): string
    {
        return $this->password->value();
    }
}
