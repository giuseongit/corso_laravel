<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function __invoke(RegisterRequest $request): JsonResponse
    {
        return new JsonResponse([
            'message' => 'Registrazione completata con successo!',
        ]);
    }
}
