<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/registrazione', function(Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
