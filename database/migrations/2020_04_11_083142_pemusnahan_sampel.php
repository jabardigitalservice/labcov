<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PemusnahanSampel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemusnahan', function (Blueprint $table) {
            $table->increments('mus_id');
            $table->integer('mus_penid');
            $table->integer('mus_samid');
            $table->integer('mus_sudah_dimusnahkan')->nullable();
            $table->date('mus_perintah_pemusnahan')->nullable();
            $table->date('mus_tanggal_pemusnahan')->nullable();
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
        Schema::dropIfExists('pemusnahan');
    }
}
