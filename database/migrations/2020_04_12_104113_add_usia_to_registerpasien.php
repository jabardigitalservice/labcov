<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUsiaToRegisterpasien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('registerpasien', function (Blueprint $table) {
           
            $table->string('pen_usia')->nullable();
 
    });
}

/**
 * Reverse the migrations.
 *
 * @return void
 */
public function down()
{
    Schema::table('registerpasien', function($table) {
        $table->dropColumn('pen_usia');
     });
}
}
