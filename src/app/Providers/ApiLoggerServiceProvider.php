<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ApiLogger;

class ApiLoggerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(ApiLogger::class, function ($app) {
            return new ApiLogger();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
