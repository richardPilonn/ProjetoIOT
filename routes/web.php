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

