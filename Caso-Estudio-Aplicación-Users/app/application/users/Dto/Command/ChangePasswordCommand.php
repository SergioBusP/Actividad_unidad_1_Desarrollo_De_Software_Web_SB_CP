<?php
declare(strict_types=1);

namespace App\Application\Users\Dto\Command;

use App\Domain\ValueObject\UserId;

/**
 * Command DTO para cambiar la contraseña de un usuario.
 *
 * NOTA: este DTO sólo transporta datos. Validaciones de formato/fortaleza
 * deben hacerse en la capa de aplicación (FormRequest / Validator) o usando
 * un PasswordStrengthEvaluator antes de persistir.
 */
final class ChangePasswordCommand
{
    private int $userId;
    private string $currentPassword;
    private string $newPassword;

    private function __construct(int $userId, string $currentPassword, string $newPassword)
    {
        $this->userId = $userId;
        $this->currentPassword = $currentPassword;
        $this->newPassword = $newPassword;
    }

    /**
     * Creador desde primitivas (útil en controllers).
     */
    public static function fromPrimitives(int $userId, string $currentPassword, string $newPassword): self
    {
        return new self($userId, $currentPassword, $newPassword);
    }

    /**
     * Creador desde un array (por ejemplo $request->all()).
     */
    public static function fromArray(array $data): self
    {
        return new self(
            (int) ($data['user_id'] ?? $data['id'] ?? 0),
            (string) ($data['current_password'] ?? $data['currentPassword'] ?? ''),
            (string) ($data['new_password'] ?? $data['newPassword'] ?? '')
        );
    }

    // --- Getters (inmutables) ---
    public function userId(): int
    {
        return $this->userId;
    }

    public function currentPassword(): string
    {
        return $this->currentPassword;
    }

    public function newPassword(): string
    {
        return $this->newPassword;
    }

    /**
     * Conveniencia para convertir a ValueObject UserId del dominio.
     */
    public function toUserId(): UserId
    {
        return UserId::fromInt($this->userId);
    }
}
