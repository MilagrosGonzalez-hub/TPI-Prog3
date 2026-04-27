<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\CasaTransitoController;
use App\Http\Controllers\SolicitudAdopcionController;
use App\Http\Controllers\PublicacionController;
use App\Http\Controllers\AuthController;

// Rutas publicas
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/animales', [AnimalController::class, 'index']);
Route::get('/animales/{animal}', [AnimalController::class, 'show']);
Route::get('/publicaciones', [PublicacionController::class, 'index']);

// Rutas protegidas (requieren token)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/animales', [AnimalController::class, 'store']);
    Route::put('/animales/{animal}', [AnimalController::class, 'update']);
    Route::delete('/animales/{animal}', [AnimalController::class, 'destroy']);
    Route::apiResource('casas-transito', CasaTransitoController::class);
    Route::apiResource('solicitudes-adopcion', SolicitudAdopcionController::class);
    Route::post('/publicaciones', [PublicacionController::class, 'store']);
    Route::apiResource('personas', PersonaController::class);
});