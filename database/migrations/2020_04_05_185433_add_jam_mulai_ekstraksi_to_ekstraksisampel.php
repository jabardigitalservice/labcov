<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddJamMulaiEkstraksiToEkstraksisampel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ekstraksisampel', function (Blueprint $table) {
            $table->string('eks_jam_mulai_ekstraksi')->nullable();
            $table->string('eks_nama_lab_lain')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ekstraksisampel', function($table) {
            $table->dropColumn('eks_jam_mulai_ekstraksi');
            $table->dropColumn('eks_nama_lab_lain');
         });
    }
}
