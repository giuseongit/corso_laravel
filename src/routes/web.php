<?php

    use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
        return view('welcome');
    });



    Route::prefix('amministrazione')->group(function () {
        Route::get('/utenti', function () {
            // Visualizza una lista di utenti
        });
        Route::get('/articoli', function () {
            // Visualizza una lista di articoli
        });
    });

