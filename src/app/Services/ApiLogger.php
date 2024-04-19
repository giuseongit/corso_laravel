<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;

class ApiLogger
{
    public function logRequest($url, $method, $parameters): void
    {
        // Registro nel log i dati dell'utente
        Log::info('API Request', [
            'url' => $url,
            'method' => $method,
            'parameters' => $parameters,
        ]);
    }
}
