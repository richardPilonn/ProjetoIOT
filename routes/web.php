<?php

use App\Livewire\Dashboard;
use App\Livewire\Sensores\SensorCreate;
use App\Livewire\Sensores\SensorDelete;
use App\Livewire\Sensores\SensorEdit;
use App\Livewire\Sensores\SensorList;
use Illuminate\Support\Facades\Route;

Route::get('/', Dashboard::class);

Route::get('/sensor/create', SensorCreate::class)->name('sensors.create');
Route::get('/sensor/{id}/edit', SensorEdit::class)->name('sensors.edit');
Route::get('/sensor/list', SensorList::class)->name('sensors.list');
Route::get('/sensor/{id}/delete', SensorDelete::class)->name('sensors.delete');