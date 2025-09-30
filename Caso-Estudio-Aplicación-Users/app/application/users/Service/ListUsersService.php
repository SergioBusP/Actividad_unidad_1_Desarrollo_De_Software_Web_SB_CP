<?php

namespace App\Application\Service;

use App\Application\Dto\Query\ListUsersQuery;
use App\Application\Dto\Response\UserListResponse;
use App\Application\Mapper\UserMapper;
use App\Application\Port\In\ListUsersUseCase;
use App\Application\Port\Out\UserRepositoryPort;

class ListUsersService implements ListUsersUseCase
{
    private UserRepositoryPort $userRepository;

    public function __construct(UserRepositoryPort $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function listUsers(ListUsersQuery $query): UserListResponse
    {
        // 1. Obtener usuarios desde el repositorio
        $users = $this->userRepository->findAll(
            $query->getPage(),
            $query->getLimit(),
            $query->getFilters()
        );

        // 2. Mapear a DTOs
        $userResponses = array_map(function ($user) {
            return UserMapper::toResponse($user);
        }, $users);

        // 3. Devolver DTO de lista
        return new UserListResponse($userResponses);
    }
}
