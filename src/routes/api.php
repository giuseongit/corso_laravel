<?php

use App\Http\Controllers\FilmController;
use App\Http\Controllers\RegistaController;
use Illuminate\Support\Facades\Route;

Route::resource('films', FilmController::class)->only([
    'index', 'store', 'show', 'update', 'destroy'
]);

Route::resource('registas', RegistaController::class)->only([
    'index', 'store', 'show', 'update', 'destroy'
]);
