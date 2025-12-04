<?php


use App\Livewire\Ambiente\AmbienteCreate;
use App\Livewire\Ambiente\AmbienteEdit;
use App\Livewire\Ambiente\AmbienteList;
use App\Livewire\Auth\Login;
use Illuminate\Support\Facades\Route;


Route::get('/', Login::class)->name('login');

Route::prefix('ambiente')->group(function () {
    Route::get('/', AmbienteList::class)->middleware('auth', 'user_type:user')->name('ambiente.list');
    Route::get('/create', AmbienteCreate::class)->middleware('auth', 'user_type:user')->name('ambiente.create');
    Route::get('/{id}/edit', AmbienteEdit::class)->middleware('auth', 'user_type:user')->name('ambientes.edit');
});


use App\Livewire\Dashboard;
use App\Livewire\Registro\RegistroList;
use App\Livewire\Sensores\SensorCreate;
use App\Livewire\Sensores\SensorDelete;
use App\Livewire\Sensores\SensorEdit;
use App\Livewire\Sensores\SensorList;


Route::get('/dashboard', Dashboard::class)->middleware('auth', 'user_type:user')->name('Dashboard');

Route::get('/sensor/create', SensorCreate::class)->middleware('auth', 'user_type:user')->name('sensors.create');
Route::get('/sensor/{id}/edit', SensorEdit::class)->middleware('auth', 'user_type:user')->name('sensors.edit');
Route::get('/sensor', SensorList::class)->middleware('auth', 'user_type:user')->name('sensors.list');
Route::get('/sensor/{id}/delete', SensorDelete::class)->middleware('auth', 'user_type:user')->name('sensors.delete');

Route::get('/registro', RegistroList::class)->middleware('auth', 'user_type:user')->name('registro.list');

