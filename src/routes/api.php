<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\RegisterController;

Route::post('registrazione', RegisterController::class);

Route::apiResource('films', FilmController::class);