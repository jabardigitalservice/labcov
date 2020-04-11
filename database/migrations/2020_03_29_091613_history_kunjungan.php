<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HistoryKunjungan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historyperawatan', function (Blueprint $table) { //tabel history kunjungan
            $table->increments('hisid');
            $table->integer('his_regid');
            $table->date('his_tanggalrawat')->nullable();
            $table->string('his_rsfasyankes')->nullable();
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
        Schema::dropIfExists('historyperawatan');
    }
}
