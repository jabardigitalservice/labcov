<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNomorEkstraksiToPengambilansampel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pengambilansampel', function (Blueprint $table) {
            $table->string('pen_nomor_ekstraksi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pengambilansampel', function($table) {
            $table->string('pen_nomor_ekstraksi');
         });
    }
    
}
