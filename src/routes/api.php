<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\FilmController;
use Illuminate\Support\Facades\Route;

Route::middleware('api.log')->group(function () {
    /**
     * AUTH
     */
    Route::post('/registrazione', [AuthController::class, 'register']);

    /**
     * FILMS
     */
    Route::name('films.')->group(function () {
        Route::get('/films', [FilmController::class, 'index'])->name('index');
        Route::post('/films', [FilmController::class, 'store'])->name('store');
        Route::put('/films/{film}', [FilmController::class, 'update'])->name('update');
        Route::delete('/films/{film}', [FilmController::class, 'delete'])->name('destroy');
    });

    /**
     * DIRECTORS
     */
    Route::name('films.')->group(function () {
        Route::get('/directors', [DirectorController::class, 'index'])->name('index');
        Route::post('/directors', [DirectorController::class, 'store'])->name('store');
        Route::get('/directors/{director}', [DirectorController::class, 'show'])->name('show');
        Route::put('/directors/{director}', [DirectorController::class, 'update'])->name('update');
        Route::get('/directors/{director}', [DirectorController::class, 'destroy'])->name('destroy');
        Route::get('/directors/{director}/films', [DirectorController::class, 'films'])->name('films');
    });
});
