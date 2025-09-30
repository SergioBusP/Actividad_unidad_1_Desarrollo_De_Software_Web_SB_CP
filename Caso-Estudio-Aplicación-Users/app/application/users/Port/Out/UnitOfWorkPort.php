<?php

namespace App\Application\Port\Out;

interface UnitOfWorkPort
{
    /**
     * Inicia una transacción.
     */
    public function begin(): void;

    /**
     * Confirma los cambios realizados en la transacción.
     */
    public function commit(): void;

    /**
     * Revierte los cambios en caso de error.
     */
    public function rollback(): void;

    /**
     * Ejecuta una función dentro de una transacción.
     * Maneja automáticamente commit o rollback.
     *
     * @param callable $fn
     * @return mixed
     */
    public function transactional(callable $fn): mixed;
}
