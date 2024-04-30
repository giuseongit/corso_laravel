<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\PostController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\PasswordController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use Laravel\Fortify\Http\Responses\LogoutResponse;

//Route::get('/users', function (Request $request) {
//    return User::all();
//});

Route::group(['middleware' => 'auth:sanctum'], function () {
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
        });
    });

    Route::prefix('user')->group(function () {
        Route::get('/', function (Request $request) {
            return $request->user();
        });

        Route::put('/update-password', [PasswordController::class, 'update']);
    });
});

Route::middleware('apiLogging')->group(function () {
    Route::post('/tokens/create', function (Request $request) {
        $token = $request->user()->createToken($request->token_name);

        return ['token' => $token->plainTextToken];
    });


    Route::post('/registrazione', function (Request $request) {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email|max:255',
        ]);

        return response()->json(['message' => 'Registrazione completata con successo!'], 200);
    });

// oppure definire una rotta base come risorsa ed elencare i metodi consentiti
    Route::resource('posts', PostController::class)->only([
        'index',
        'store',
        'show',
        'update',
        'destroy'
    ]);

    Route::controller(FilmController::class)->group(function () {
        Route::get('/films', 'index');
        Route::post('/films', 'store');
    });

    Route::resource('author', AuthorController::class)->only([
        'index',
        'store',
        'show',
        'update',
        'destroy'
    ]);

    Route::controller(AuthorController::class)->group(function () {
        Route::get('author/{author}/posts', 'posts');
    });
});
