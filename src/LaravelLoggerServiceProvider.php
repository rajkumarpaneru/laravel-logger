<?php

namespace Raajkumarpaneru\LaravelLogger;

use Illuminate\Support\ServiceProvider;

class LaravelLoggerServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app['router']
            ->aliasMiddleware('enable-log', \Raajkumarpaneru\LaravelLogger\Middleware\LogQueryExecutionTimeMiddleware::class);
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            if (!class_exists('CreateLaravelQueryExecutionLogsTable')) {
                $this->publishes([
                    dirname(__DIR__) . '/database/migrations/create_laravel_query_execution_logs_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_laravel_query_execution_logs_table.php'),
                ], 'migrations');
            }
        }
    }
}
