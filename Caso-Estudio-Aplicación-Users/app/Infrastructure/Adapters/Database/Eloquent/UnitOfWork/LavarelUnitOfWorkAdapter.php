<?php

namespace Infrastructure\Adapters\Database\UnitOfWork;

use Application\users\Port\Out\UnitOfWorkPort;
use Illuminate\Support\Facades\DB;

class LaravelUnitOfWorkAdapter implements UnitOfWorkPort
{
    public function execute(callable $callback)
    {
        return DB::transaction(function () use ($callback) {
            return $callback();
        });
    }
}
