<?php

namespace App\Service;

use App\Domain\User;
use App\Port\In\UpdateUserUseCase;
use App\Port\UserRepositoryPort;
use App\Port\UnitOfWorkPort;
use App\Port\PasswordStrengthPolicyPort;
use App\Port\PasswordHasherPort;

class UpdateUserService implements UpdateUserUseCase
{
    private UserRepositoryPort $userRepository;
    private UnitOfWorkPort $unitOfWork;
    private PasswordStrengthPolicyPort $passwordStrengthPolicy;
    private PasswordHasherPort $passwordHasher;

    public function __construct(
        UserRepositoryPort $userRepository,
        UnitOfWorkPort $unitOfWork,
        PasswordStrengthPolicyPort $passwordStrengthPolicy,
        PasswordHasherPort $passwordHasher
    ) {
        $this->userRepository = $userRepository;
        $this->unitOfWork = $unitOfWork;
        $this->passwordStrengthPolicy = $passwordStrengthPolicy;
        $this->passwordHasher = $passwordHasher;
    }

    /**
     * @inheritDoc
     */
    public function execute(int $id, array $data): User
    {
        $user = $this->userRepository->findById($id);

        if (!$user) {
            throw new \Exception("Usuario con ID {$id} no encontrado");
        }

        if (isset($data['name'])) {
            $user->setName($data['name']);
        }

        if (isset($data['email'])) {
            $user->setEmail($data['email']);
        }

        if (isset($data['password'])) {
            if (!$this->passwordStrengthPolicy->isStrong($data['password'])) {
                throw new \Exception("La contraseña no cumple con la política de seguridad");
            }
            $hashedPassword = $this->passwordHasher->hash($data['password']);
            $user->setPassword($hashedPassword);
        }

        $this->unitOfWork->begin();
        $updatedUser = $this->userRepository->save($user);
        $this->unitOfWork->commit();

        return $updatedUser;
    }
}
