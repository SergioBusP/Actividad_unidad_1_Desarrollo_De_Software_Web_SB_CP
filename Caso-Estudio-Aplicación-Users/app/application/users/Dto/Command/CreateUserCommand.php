<?php
declare(strict_types=1);

namespace App\Application\Users\Dto\Command;

use App\Domain\ValueObject\UserId;
use App\Domain\ValueObject\Username;
use App\Domain\ValueObject\Rol;

final class CreateUserCommand
{
    private int $userId;
    private string $username;
    private string $plainPassword;
    private string $rol;

    private function __construct(
        int $userId,
        string $username,
        string $plainPassword,
        string $rol
    ) {
        $this->userId = $userId;
        $this->username = $username;
        $this->plainPassword = $plainPassword;
        $this->rol = $rol;
    }

    /**
     * Creador desde primitivas (útil en controller o request).
     */
    public static function fromPrimitives(
        int $userId,
        string $username,
        string $plainPassword,
        string $rol
    ): self {
        return new self($userId, $username, $plainPassword, $rol);
    }

    /**
     * Creador desde array (ej: $request->all()).
     */
    public static function fromArray(array $data): self
    {
        return new self(
            (int)($data['user_id'] ?? $data['id'] ?? 0),
            (string)($data['username'] ?? ''),
            (string)($data['password'] ?? ''),
            (string)($data['rol'] ?? 'USER')
        );
    }

    // --- Getters ---
    public function userId(): int
    {
        return $this->userId;
    }

    public function username(): string
    {
        return $this->username;
    }

    public function plainPassword(): string
    {
        return $this->plainPassword;
    }

    public function rol(): string
    {
        return $this->rol;
    }

    // --- Convertidores a Value Objects del dominio ---
    public function toUserId(): UserId
    {
        return UserId::fromInt($this->userId);
    }

    public function toUsername(): Username
    {
        return Username::fromString($this->username);
    }

    public function toRol(): Rol
    {
        return Rol::fromString($this->rol);
    }
}
