<?php

use App\Http\Controllers\API\SalutoController;
use Illuminate\Support\Facades\Route;

Route::get('/info', function () {
    return 'Benvenuto nell\'applicazione Laravel!';
});

Route::get('/saluta/{nome}', [SalutoController::class,'salutaNome']);
