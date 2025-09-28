<?php

namespace App\Domain\Entity;

use App\Domain\Exception\UsuarioYaInactivoException;
use App\Domain\Exception\UsuarioYaActivoException;
use App\Domain\Exception\UsernameInvalidoException;
use App\Domain\Service\PasswordStrengthEvaluator;
use App\Domain\Service\PasswordHasher;
use App\Domain\Exception\RolInvalidoException;
use App\Domain\ValueObject\Rol;
use App\Domain\Event\UsuarioRolAsignado;
use App\Domain\ValueObject\UserId;
use App\Domain\ValueObject\UserName;
use App\Domain\ValueObject\PasswordHash;



class Usuario
{
    private UserId $id;
    private UserName $nombre;
    private string $email;
    private PasswordHash $password;
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

    public function actualizarNombre(string $nuevoNombre): UsuarioRenombrado
    {
        if (!preg_match('/^[a-zA-Z0-9_]{3,20}$/', $nuevoNombre)) {
            throw new UsernameInvalidoException("El nombre de usuario '{$nuevoNombre}' no es válido.");
        }

        $nombreAnterior = $this->nombre;
        $this->nombre = $nuevoNombre;
        $this->fechaActualizacion = new \DateTimeImmutable();

        return new UsuarioRenombrado($this->id, $nombreAnterior, $nuevoNombre, $this->fechaActualizacion);
    }

    public function actualizarEmail(string $nuevoEmail): void
    {
        $this->email = $nuevoEmail;
        $this->fechaActualizacion = new \DateTimeImmutable();
    }


    public function activar(): UsuarioReactivado
    {
        if ($this->activo) {
            throw new UsuarioYaActivoException();
        }

        $this->activo = true;
        $this->fechaActualizacion = new \DateTimeImmutable();

        return new UsuarioReactivado($this->id, $this->fechaActualizacion);
    }

    public function validarPassword(string $passwordPlano): void
    {
        if (!password_verify($passwordPlano, $this->passwordHash)) {
            throw new PasswordInvalidaException();
        }
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

    public function cambiarPassword(string $nuevoPasswordHash): UserPasswordChanged
        {
            $this->passwordHash = $nuevoPasswordHash;
            $this->fechaActualizacion = new \DateTimeImmutable();

            return new UserPasswordChanged($this->id, $this->fechaActualizacion);
        }

    public static function registrar(
        UserId $id,
        UserName $nombre,
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

        $evento = new UsuarioRegistrado($id->value(), $email, $fecha);

        return [$usuario, $evento];
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

}