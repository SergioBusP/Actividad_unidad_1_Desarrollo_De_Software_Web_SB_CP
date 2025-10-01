<?php

namespace app\Infrastructure\Entrypoint\Rest\Vehiculo\Response;

class VehiculoHttpResponse
{
    public function __construct(
        public readonly bool $success,
        public readonly ?array $data = null,
        public readonly ?string $message = null,
    ) {}
}
