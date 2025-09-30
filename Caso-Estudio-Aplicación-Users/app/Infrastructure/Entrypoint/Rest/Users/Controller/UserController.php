<?php

namespace Infrastructure\Entrypoint\Rest\Users\Controller;

use Application\users\Port\In\CreateUserUseCase;
use Application\users\Port\In\GetUserByIdUseCase;
use Application\users\Port\In\ListUsersUseCase;
use Infrastructure\Entrypoint\Rest\Users\Request\CreateUserHttpRequest;
use Infrastructure\Entrypoint\Rest\Users\Mapper\UserHttpMapper;
use Infrastructure\Entrypoint\Rest\Users\Response\UserHttpResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController
{
    private CreateUserUseCase $createUserUseCase;
    private GetUserByIdUseCase $getUserByIdUseCase;
    private ListUsersUseCase $listUsersUseCase;

    public function __construct(
        CreateUserUseCase $createUserUseCase,
        GetUserByIdUseCase $getUserByIdUseCase,
        ListUsersUseCase $listUsersUseCase
    ) {
        $this->createUserUseCase = $createUserUseCase;
        $this->getUserByIdUseCase = $getUserByIdUseCase;
        $this->listUsersUseCase = $listUsersUseCase;
    }

    public function create(Request $request): JsonResponse
    {
        $dto = CreateUserHttpRequest::fromRequest($request);
        $user = $this->createUserUseCase->create($dto);
        return response()->json(UserHttpResponse::fromDomain($user));
    }

    public function getById(string $id): JsonResponse
    {
        $user = $this->getUserByIdUseCase->getById($id);
        return response()->json(UserHttpResponse::fromDomain($user));
    }

    public function list(): JsonResponse
    {
        $users = $this->listUsersUseCase->list();
        return response()->json(UserHttpMapper::mapList($users));
    }
}
