<?php

namespace Tests\Unit\Infrastructure;

use Tests\TestCase;
use App\Infrastructure\Security\BcryptPasswordHasher;
use App\Infrastructure\Security\RegexPasswordStrengthEvaluator;
use App\Domain\Exception\PasswordInvalidaException;

class AdaptersTest extends TestCase
{
    /** @test */
    public function puede_hashear_y_verificar_password()
    {
        $hasher = new BcryptPasswordHasher();

        $hash = $hasher->hash("StrongPassword123!");
        $this->assertTrue($hasher->verify("StrongPassword123!", $hash));
    }

    /** @test */
    public function valida_contraseña_debil()
    {
        $this->expectException(PasswordInvalidaException::class);

        $evaluator = new RegexPasswordStrengthEvaluator();
        $evaluator->validate("abc");
    }
}
