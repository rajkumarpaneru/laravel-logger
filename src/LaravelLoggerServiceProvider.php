<?php

namespace Raajkumarpaneru\LaravelLogger;

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
        if ($this->app->runningInConsole()) {
            if (!class_exists('CreateLaravelQueryExecutionLogs')) {
                $this->publishes([
                    __DIR__ . '/../database/migrations/create_laravel_query_execution_logs.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_laravel_query_execution_logs.php'),
                    // you can add any number of migrations here
                ], 'migrations');
            }
        }
    }
}
