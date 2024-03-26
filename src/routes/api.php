<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Validations\ValidationException;
use App\Http\Controllers\HelloController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/registrazione', function (Request $request) {
    try {
        $validato = $request->validate([
            'nome' => 'required',
            'email' => 'required|email',
        ]);
    } catch (Exception $e) {
        return response()->json($e->getMessage(), 400);
    }

    // Simulazione di successo della validazione
    return response()->json(['messaggio' => 'Registrazione completata con successo!']);

});
