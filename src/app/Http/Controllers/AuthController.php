<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        return response()->json([
            'success' => true,
            'message' => "Registrazione completata con successo!"
        ]);
    }
}
