<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NomeController;
use App\Http\Middleware\EsempioMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/benvenuto', [NomeController::class, 'index']);

Route::prefix('amministrazione')->group(function () {
    Route::get('/utenti', function () {
        // Visualizza una lista di utenti
        return 'utenti';
    });
    Route::get('/articoli', function () {
        return 'articoli';
    });
});
Route::get('/utente/profilo', function () {
    return "QUesta è la pagina del profilo dell'utente";
})->name('profilo');

Route::get('/profile', function () {
    return "QUesta è la pagina profile";
})->middleware(EsempioMiddleware::class);
