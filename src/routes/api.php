<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\PostsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/registrazione', function (Request $request) {
    $validatedData = $request->validate([
        'nome' => 'required|string|max:255',
        'email' => 'required|string|email|unique:users,email|max:255',
    ]);

    return response()->json(['message' => 'Registrazione completata con successo!'], 200);
});

// oppure definire una rotta base come risorsa ed elencare i metodi consentiti
Route::resource('posts', PostsController::class)->only([
    'index',
    'store',
    'show',
    'update',
    'destroy'
]);

Route::controller(FilmController::class)->group(function () {
    Route::get('/films', 'index');
    Route::post('/films', 'store');
});


Route::resource('author', AuthorController::class)->only([
    'index',
    'store',
    'show',
    'update',
    'destroy'
]);

Route::controller(AuthorController::class)->group(function () {
    Route::get('author/{author}/posts', 'posts');
});

