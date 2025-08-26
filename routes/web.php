<?php

use App\Livewire\Dashboard;
use App\Livewire\Sensores\SensorCreate;
use Illuminate\Support\Facades\Route;

Route::get('/', Dashboard::class);

Route::get('/create/sensor', SensorCreate::class)->name('sensor.create');
