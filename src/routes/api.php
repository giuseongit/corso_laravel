<?php

use App\Http\Controllers\DirectorController;
use App\Http\Controllers\FilmController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Contracts\LogoutResponse;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;

Route::middleware(['api.log', 'auth:sanctum'])->group(function () {
    /**
     * AUTH
     */
    Route::withoutMiddleware('auth:sanctum')->group(function () {
        Route::post('/login', [AuthenticatedSessionController::class, 'store'])
            ->middleware(array_filter([
                'guest:' . config('fortify.guard'),  // solo gli utenti non autenticati possono accedere a questa rotta
            ]));

        Route::post('/register', [RegisteredUserController::class, 'store'])
            ->middleware('guest:' . config('fortify.guard'));  // solo gli utenti non autenticati possono accedere a questa rotta
    });

    Route::get('/logout', function (Request $request) {
        $request->user()->tokens()->delete();
        return app(LogoutResponse::class);
    });

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
