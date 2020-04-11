<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RDT extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pencatatanrapid', function (Blueprint $table) {
            $table->increments('rapid_id');
            $table->integer('rapid_noreg')->nullable();
            $table->integer('rapid_sampel_id')->nullable();
            $table->string('rapid_tanggal_pertama_demam')->nullable();
            $table->string('rapid_tanggal_rdt_1')->nullable();
            $table->string('rapid_jam_rdt_1')->nullable();
            $table->string('rapid_jenis_sampel_rdt_1')->nullable();
            $table->string('rapid_kesimpulan_rdt_1')->nullable();
            $table->string('rapid_igg_1')->nullable();
            $table->string('rapid_igm_1')->nullable();
            $table->string('rapid_igg_igm_1')->nullable();
            $table->string('rapid_antigen_1')->nullable();
            $table->text('rapid_catatan_1')->nullable();
            $table->string('rapid_tanggal_rdt_2')->nullable();
            $table->string('rapid_jam_rdt_2')->nullable();
            $table->string('rapid_jenis_sampel_rdt_2')->nullable();
            $table->string('rapid_kesimpulan_rdt_2')->nullable();
            $table->string('rapid_igg_2')->nullable();
            $table->string('rapid_igm_2')->nullable();
            $table->string('rapid_igg_igm_2')->nullable();
            $table->string('rapid_antigen_2')->nullable();
            $table->text('rapid_catatan_2')->nullable();
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
        Schema::dropIfExists('pencatatanrapid');
    }
}
