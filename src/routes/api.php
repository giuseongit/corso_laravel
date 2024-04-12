<?php

    use App\Http\Controllers\FilmController;
    use App\Http\Controllers\RegistaController;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Route;

    Route::get('/user', function (Request $request) {
        return $request->user();
    })->middleware('auth:sanctum');


    Route::post('/registrazione', function (Request $request) {
        return $request;
    });

//    Route::get('/films', [FilmController::class, 'index'])->name('films.index');
//    Route::post('/films', [FilmController::class, 'store'])->name('films.store');

    Route::resource('/film', FilmController::class)->only([
        'index', 'store', 'show', 'update', 'destroy'
    ]);

    Route::resource('/regista', RegistaController::class)->only([
        'index', 'store', 'show', 'update', 'destroy'
    ]);
