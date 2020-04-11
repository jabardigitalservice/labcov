<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RegisterRapidTest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rapidtestregister', function (Blueprint $table) {
            $table->increments('rar_id');
            $table->integer('rar_noreg');
            $table->string('rar_pernah_rdt')->nullable();
            $table->string('rar_hasil_rdt')->nullable();
            $table->date('rar_tanggal_rdt')->nullable();
            $table->text('rar_keterangan')->nullable();
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
        Schema::dropIfExists('rapidtestregister');
    }
}
