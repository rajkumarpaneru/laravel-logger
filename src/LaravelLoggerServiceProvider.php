<?php

namespace Raajkumarpaneru\LaravelLogger;

use Illuminate\Support\ServiceProvider;

class LaravelLoggerServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }

    public function boot()
    {
        //
    }
}
