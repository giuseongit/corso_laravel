<?php

use App\Http\Controllers\InfoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/info', [InfoController::class, 'getInfo']);
