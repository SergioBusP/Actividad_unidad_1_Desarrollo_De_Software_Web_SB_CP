<?php

namespace App\Application\Port\Out;

use App\Domain\User\User;

interface UserRepositoryPort
{
    /**
     * Persiste un usuario en el sistema.
     */
    public function save(User $user): void;

    /**
     * Elimina un usuario del sistema.
     */
    public function delete(User $user): void;

    /**
     * Busca un usuario por su ID.
     */
    public function findById(string $id): ?User;

    /**
     * Busca un usuario por su email.
     */
    public function findByEmail(string $email): ?User;

    /**
     * Retorna todos los usuarios.
     *
     * @return User[]
     */
    public function findAll(): array;
}
