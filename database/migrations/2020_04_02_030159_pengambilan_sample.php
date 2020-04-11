<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PengambilanSample extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengambilansampel', function (Blueprint $table) {
            $table->increments('pen_id');
            $table->string('pen_nik')->nullable();
            $table->string('pen_noreg');
            $table->tinyInteger('pen_sampel_diambil')->nullable();
            $table->tinyInteger('pen_sampel_diterima')->nullable();
            $table->tinyInteger('pen_sampel_diterima_dari_fas_rujukan')->nullable();
            $table->string('pen_penerima_sampel')->nullable();

            $table->text('pen_id_sampel')->nullable(); //sam_id
            $table->text('pen_catatan')->nullable();
            $table->integer('pen_userid')->nullable();
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
        Schema::dropIfExists('pengambilansampel');
    }
}
