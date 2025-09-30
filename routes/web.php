<?php


use App\Livewire\Ambiente\AmbienteCreate;
use App\Livewire\Ambiente\AmbienteEdit;
use App\Livewire\Ambiente\AmbienteList;
use Illuminate\Support\Facades\Route;

Route::prefix('ambiente')->group(function () {
    Route::get('/', AmbienteList::class)->name('ambiente.list');
    Route::get('/create', AmbienteCreate::class)->name('ambiente.create');
    Route::get('/{id}/edit', AmbienteEdit::class)->name('ambientes.edit');
});


use App\Livewire\Dashboard;
use App\Livewire\Registro\RegistroList;
use App\Livewire\Sensores\SensorCreate;
use App\Livewire\Sensores\SensorDelete;
use App\Livewire\Sensores\SensorEdit;
use App\Livewire\Sensores\SensorList;


Route::get('/', Dashboard::class);

Route::get('/sensor/create', SensorCreate::class)->name('sensors.create');
Route::get('/sensor/{id}/edit', SensorEdit::class)->name('sensors.edit');
Route::get('/sensor/list', SensorList::class)->name('sensors.list');
Route::get('/sensor/{id}/delete', SensorDelete::class)->name('sensors.delete');

Route::get('/registro/list', RegistroList::class)->name('registro.list');

