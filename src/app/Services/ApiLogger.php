<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;

class ApiLogger
{
    public function __construct()
    {
        //
    }

    public function logRequest()
    {
        Log::info(
            sprintf(
                "API request logged: URL - %s, Method - %s, Parameters - %s",
                request()->url(),
                request()->method(),
                json_encode(request()->all())
            ),

        );
    }
}
