<?php

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
