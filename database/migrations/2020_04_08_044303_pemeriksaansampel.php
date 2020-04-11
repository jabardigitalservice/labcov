<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pemeriksaansampel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemeriksaansampel', function (Blueprint $table) {
        $table->increments('pem_id');
        $table->integer('pem_penid');
        $table->string('pem_noreg');
        $table->integer('pem_samid');
        $table->date('pem_tanggal_penerimaan_sampel')->nullable();
        $table->string('pem_jam_penerimaan_sampel')->nullable();
        $table->string('pem_lab_penerima_sampel')->nullable();
        $table->string('pem_lab_penerima_sampel_lainnya')->nullable();
        $table->string('pem_petugas_penerima_sampel_rna')->nullable();
        $table->string('pem_operator_real_time_pcr')->nullable();
        $table->date('pem_tanggal_mulai_pemeriksaan')->nullable();
        $table->string('pem_jam_mulai_pcr')->nullable();
        $table->string('pem_jam_selesai_pcr')->nullable();
        $table->string('pem_metode_pemeriksaan')->nullable();
        $table->string('pem_nama_kit_pemeriksaan')->nullable();
        $table->string('pem_target_gen')->nullable();
        $table->string('pem_hasil_deteksi')->nullable();
        $table->string('pem_grafik')->nullable();
        $table->string('pem_kesimpulan_pemeriksaan')->nullable();
        $table->text('pem_barcodenomor_sampel')->nullable();
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
        Schema::dropIfExists('pemeriksaansampel');
    }
}
