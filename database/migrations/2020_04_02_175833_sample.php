<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Sample extends Migration
{
    /**
     * Run the migrations.
     *
     * nasofaring dan orofaring
     * sputum
     * bronchoalveolar lavage
     * nasal wash
     * jaringan biopsi/otopsi
     * serum akut
     * serum konvalesen
     * lainnya (sebutkan)
     * @return void
     */
    public function up()
    {

        Schema::create('sampel', function (Blueprint $table) {
            $table->increments('sam_id');
            $table->string('sam_penid');
            $table->string('sam_noreg')->nullable();

        $table->integer('sam_jenis_sampel')->nullable();
        $table->string('sam_petugas_pengambil_sampel')->nullable();
        $table->date('sam_tanggal_sampel')->nullable();
        $table->string('sam_pukul_sampel')->nullable();
        $table->string('sam_barcodenomor_sampel')->nullable();
        
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
        Schema::dropIfExists('sampel');
    }
}
