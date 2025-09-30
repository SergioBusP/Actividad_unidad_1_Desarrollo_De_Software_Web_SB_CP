<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::prefix('users')->group(function () {
    Route::post('/', [UserController::class, 'store']);   // registrar
    Route::get('/', [UserController::class, 'index']);    // listar
    Route::get('{id}', [UserController::class, 'show']);  // consultar
    Route::put('{id}', [UserController::class, 'update']); // actualizar
    Route::delete('{id}', [UserController::class, 'destroy']); // eliminar
});
