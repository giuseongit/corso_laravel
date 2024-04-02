<?php

    use App\Http\Controllers\API\SalutoController;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Route;

    Route::get('/user', function (Request $request) {
        return $request->user();
    })->middleware('auth:sanctum');


    Route::get('/info', function () {
        return 'Hello Amor';
    });

    Route::get('/saluta/{nome}', function (string $nome) {
        return (new App\Http\Controllers\API\SalutoController)->salutoNome($nome);
    });
