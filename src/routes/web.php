<?php

use App\Http\Controllers\InfoController;
use App\Http\Controllers\SalutaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/info', [InfoController::class, 'getInfo']);
Route::get('/saluta/{name}', [SalutaController::class, 'salutaNome']);
