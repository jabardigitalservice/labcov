<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HistoryKontakPasien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historykontakpasien', function (Blueprint $table) { // history kontak pasien
            $table->increments('konid');
            $table->integer('kon_regid');
            $table->string('kon_namakon')->nullable();
            $table->string('kon_alamatkon')->nullable();
            $table->string('kon_hubungankon')->nullable();
            $table->date('kon_tanggalkon')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
