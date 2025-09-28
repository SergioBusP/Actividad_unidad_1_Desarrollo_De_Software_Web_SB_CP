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
    use App\Domain\Exception\UsernameInvalidoException;

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

    use App\Domain\Exception\UsuarioYaActivoException;

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

    use App\Domain\Exception\UsuarioYaInactivoException;

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
        int $id,
        string $nombre,
        string $email,
        string $passwordHash
            ): array {
                $fecha = new \DateTimeImmutable();

                $usuario = new self(
                    $id,
                    $nombre,
                    $email,
                    $passwordHash,
                    $fecha,
                    $fecha,
                    true
                );

                $evento = new UsuarioRegistrado($id, $email, $fecha);

                // Retornamos tanto el usuario como el evento
                return [$usuario, $evento];
            }

    private array $roles = [];

    use App\Domain\Exception\RolInvalidoException;

    private array $roles = [];
    private array $rolesPermitidos = ['ADMIN', 'USER', 'MODERATOR'];

    public function asignarRol(string $rol): RolAsignadoAUsuario
    {
        if (!in_array($rol, $this->rolesPermitidos, true)) {
            throw new RolInvalidoException("El rol {$rol} no es válido en el sistema.");
        }

        if (in_array($rol, $this->roles, true)) {
            throw new DomainException("El usuario ya tiene asignado el rol {$rol}");
        }

        $this->roles[] = $rol;
        $this->fechaActualizacion = new \DateTimeImmutable();

        return new RolAsignadoAUsuario($this->id, $rol, $this->fechaActualizacion);
    }
}