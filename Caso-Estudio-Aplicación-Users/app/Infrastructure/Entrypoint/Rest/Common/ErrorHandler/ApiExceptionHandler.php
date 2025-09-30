<?php

namespace Infrastructure\Entrypoint\Rest\Common\ErrorHandler;

use Illuminate\Http\JsonResponse;
use Throwable;

class ApiExceptionHandler
{
    public static function handle(Throwable $e): JsonResponse
    {
        return response()->json([
            'error' => true,
            'message' => $e->getMessage(),
            'code' => $e->getCode()
        ], 400);
    }
}
