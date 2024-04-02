<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ArticoloController;

Route::get('/articoli', [ArticoloController::class, 'index']);

Route::post('/articoli', [ArticoloController::class, 'store']);
