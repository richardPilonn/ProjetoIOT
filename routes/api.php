<?php

use App\Http\Controllers\RegistroController;
use App\Http\Controllers\SensorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('registro/create', [RegistroController::class, 'store']);

Route::get('sensor/search/status', [SensorController::class, 'searchStatus']);

Route::put('sensor/update', [SensorController::class, 'atualizar']);