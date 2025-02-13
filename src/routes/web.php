<?php
use Custom\Todo\Livewire\TodoIndex;
use Custom\Todo\Livewire\TodoCreate;
use Illuminate\Support\Facades\Route;

Route::middleware(['web'])->group(function () {
    Route::group(['prefix' => 'todos'], function () {
        Route::get('/', TodoIndex::class)->name('todos.index');
        Route::get('/create', TodoCreate::class)->name('todos.create');
    });
});


