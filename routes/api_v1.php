<?php

use App\Http\Controllers\v1\ClienteController;
use Illuminate\Support\Facades\Route;

// * CRUD Cliente
Route::middleware("auth:sanctum")->prefix("cliente")->group(function () {
    Route::get("/",[ClienteController::class,"getClientes"]);
    Route::get("/{cliente}",[ClienteController::class,"getCliente"]);
    Route::post("/",[ClienteController::class,"createCliente"]);
    Route::delete("/{cliente}",[ClienteController::class,"deleteCliente"]);
    Route::patch("/{cliente}",[ClienteController::class,"patchCliente"]);
});