<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PenyimpananSampel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penyimpanansampel', function (Blueprint $table) {
            $table->increments('sim_id');
            $table->integer('sim_penid');
            $table->integer('sim_samid');
            $table->string('sim_lokasi_simpan')->nullable();
            $table->date('sim_tanggal_simpan')->nullable();
            $table->date('sim_perintah_penyimpanan')->nullable();
            $table->integer('sim_print_surat')->nullable();
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
        Schema::dropIfExists('penyimpanansampel');
    }
}
