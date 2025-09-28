<?php

namespace App\Domain\Service;

interface PasswordStrengthEvaluator
{
    public function validate(string $plainPassword): void;
}