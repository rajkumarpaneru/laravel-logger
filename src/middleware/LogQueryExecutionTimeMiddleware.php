<?php

namespace Raajkumarpaneru\LaravelLogger\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class LogQueryExecutionTimeMiddleware
{
    public function handle($request, Closure $next)
    {
        $startTime = microtime(true);

        $response = $next($request);

        $endTime = microtime(true);
        $executionTime = round(($endTime - $startTime) * 1000, 2);

        DB::table('laravel_query_execution_logs')
            ->insert([
                'method' => $request->method(),
                'endpoint' => $request->fullUrl(),
                'execution_time' => $executionTime,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        return $response;
    }
}
