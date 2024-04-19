<?php

namespace App\Http\Middleware;

use App\Services\ApiLogger;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiLoggingMiddleware
{
    protected ApiLogger $apiLogger;

    public function __construct(ApiLogger $apiLogger)
    {
        $this->apiLogger = $apiLogger;
    }

    /**
     * @param Request $request
     * @param Closure $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        //Passo i dati del middleware a logRequest metodo di ApiLogger class
        $this->apiLogger->logRequest($request->url(), $request->getMethod(), $request->all());

        return $next($request);
    }
}
