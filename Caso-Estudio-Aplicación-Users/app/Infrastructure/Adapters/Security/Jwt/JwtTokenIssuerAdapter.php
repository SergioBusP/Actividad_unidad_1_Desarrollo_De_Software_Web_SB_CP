<?php

namespace Infrastructure\Adapters\Security\Jwt;

use Application\users\Port\Out\TokenIssuerPort;
use Firebase\JWT\JWT;

class JwtTokenIssuerAdapter implements TokenIssuerPort
{
    private string $secret;
    private string $algo;

    public function __construct(string $secret, string $algo = 'HS256')
    {
        $this->secret = $secret;
        $this->algo = $algo;
    }

    public function issue(array $claims): string
    {
        return JWT::encode($claims, $this->secret, $this->algo);
    }
}
