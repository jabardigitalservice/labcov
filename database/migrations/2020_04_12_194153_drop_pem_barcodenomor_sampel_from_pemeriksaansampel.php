<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropPemBarcodenomorSampelFromPemeriksaansampel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pemeriksaansampel', function($table) {
            $table->dropColumn('pem_barcodenomor_sampel');
         });
     
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pemeriksaansampel', function($table) {
            $table->integer('pem_barcodenomor_sampel');
         });
    }
}
