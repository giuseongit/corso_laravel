<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalutoController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/info', function () {
    return "Benvenuto nell'applicazione Laravel!";
});

Route::get('/saluta/{nome}', [SalutoController::class, 'salutaNome']);

