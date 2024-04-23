<?php

namespace App\Http\Middleware;

use App\Services\ApiLogger;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiLoggingMiddleware
{
    public function __construct(protected ApiLogger $logger)
    {
        //
    }


    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Logica per registrare la richiesta
        $this->logger->logRequest();

        return $next($request);
    }
}
