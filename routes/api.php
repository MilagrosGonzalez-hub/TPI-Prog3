<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\CasaTransitoController;
use App\Http\Controllers\SolicitudAdopcionController;
use App\Http\Controllers\PublicacionController;

Route::apiResource('animales', AnimalController::class);
Route::apiResource('personas', PersonaController::class);
Route::apiResource('casas-transito', CasaTransitoController::class);
Route::apiResource('solicitudes-adopcion', SolicitudAdopcionController::class);
Route::apiResource('publicaciones', PublicacionController::class);