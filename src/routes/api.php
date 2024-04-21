<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\AuthorController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('posts', PostsController::class)->only([
    'index', 'store', 'show', 'update', 'destroy'
]);

Route::resource('authors', AuthorController::class)->only([
    'index', 'store', 'show', 'update', 'destroy'
]);

Route::get('authors/{author}/posts', [AuthorController::class, 'posts']);