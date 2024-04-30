<?php

use App\Http\Controllers\FilmController;
use App\Http\Controllers\RegistaController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\{AuthenticatedSessionController, RegisteredUserController, PasswordController};
use Laravel\Fortify\Contracts\LogoutResponse;
use Illuminate\Http\Request;

Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::resource('films', FilmController::class)->only([
        'index', 'store', 'show', 'update', 'destroy'
    ]);

    Route::resource('registas', RegistaController::class)->only([
        'index', 'store', 'show', 'update', 'destroy'
    ]);

    Route::prefix('auth')->group(function () {
        Route::withoutMiddleware('auth:sanctum')->group(function () {
            Route::post('/login', [AuthenticatedSessionController::class, 'store'])
                ->middleware(array_filter([
                    'guest:' . config('fortify.guard'),
                ]));

            Route::post('/register', [RegisteredUserController::class, 'store'])
                ->middleware('guest:' . config('fortify.guard'));
        });

        Route::get('/logout', function (Request $request) {
            $request->user()->tokens()->delete();
            return app(LogoutResponse::class);
        })->middleware('auth:sanctum');
    });


    Route::prefix('user')->group(function () {
        Route::get('/', function (Request $request) {
            return $request->user();
        });

        Route::put('/update-password', [PasswordController::class, 'update']);
    });

});



