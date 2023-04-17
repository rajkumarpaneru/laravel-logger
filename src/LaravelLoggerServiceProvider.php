<?php

namespace Raajkumarpaneru\LaravelLogger;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class LaravelLoggerServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->app['router']
            ->aliasMiddleware('enable-log', \Raajkumarpaneru\LaravelLogger\Middleware\LogQueryExecutionTimeMiddleware::class);
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../database/migrations' => database_path('migrations')
        ], 'migration');
    }
}
