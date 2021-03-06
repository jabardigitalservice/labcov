<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LogEdit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() //membuat log pasien 
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->integer('log_user');
            $table->integer('log_item');
            $table->integer('log_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logs');
    }
}
