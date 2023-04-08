<?php

namespace Raajkumarpaneru\LaravelLogger;

use Illuminate\Support\ServiceProvider;
use Raajkumarpaneru\LaravelLogger\Middleware\LogQueryExecutionTimeMiddleware;

class LaravelLoggerServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }

    public function boot()
    {
        $this->app['router']->aliasMiddleware('enable-log', LogQueryExecutionTimeMiddleware::class);
        $this->publishes([
            __DIR__ . '/../database/migrations' => database_path('migrations')
        ], 'migration');
    }
}
