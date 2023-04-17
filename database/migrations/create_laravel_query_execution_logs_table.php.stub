<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaravelQueryExecutionLogsTable extends Migration
{
    public function up()
    {
        Schema::create('laravel_query_execution_logs', function (Blueprint $table) {
            $table->id();
            $table->string('method', 12);
            $table->string('endpoint');
            $table->float('execution_time', 8, 2)->comment('in milliseconds');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('laravel_query_execution_logs');
    }
}
