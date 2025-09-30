<?php

namespace Infrastructure\Adapters\Database\Eloquent\Repository;

use Application\users\Port\Out\UserRepositoryPort;
use Application\users\Domain\User;
use Infrastructure\Adapters\Database\Eloquent\Model\UserModel;

class EloquentUserRepositoryAdapter implements UserRepositoryPort
{
    public function save(User $user): User
    {
        $model = UserModel::updateOrCreate(
            ['id' => $user->getId()->value()],
            [
                'username' => $user->getUsername()->value(),
                'email' => $user->getEmail()->value(),
                'password' => $user->getPasswordHash()->value(),
                'role' => $user->getRole()->value(),
                'active' => $user->isActive()
            ]
        );

        return $user;
    }

    public function findById(string $id): ?User
    {
        $model = UserModel::find($id);
        return $model ? $this->toDomain($model) : null;
    }

    public function findAll(): array
    {
        return array_map(
            fn ($model) => $this->toDomain($model),
            UserModel::all()->toArray()
        );
    }

    public function deleteById(string $id): void
    {
        UserModel::destroy($id);
    }

    private function toDomain(UserModel $model): User
    {
        return new User(
            $model->id,
            $model->username,
            $model->email,
            $model->password,
            $model->role,
            (bool) $model->active
        );
    }
}
