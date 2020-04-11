<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ekstraksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ekstraksisampel', function (Blueprint $table) {
            $table->increments('eks_id');
            $table->string('eks_nik')->nullable();
            $table->string('eks_noreg');
            $table->string('eks_penid');
            $table->string('eks_samid');
            $table->date('eks_tanggal_penerimaan_sampel')->nullable();
            $table->string('eks_jam_penerimaan_sampel')->nullable();
            $table->string('eks_petugas_penerima_sampel')->nullable();
            $table->string('eks_operator_ekstraksi')->nullable();
            $table->date('eks_tanggal_mulai_ekstraksi')->nullable();
            $table->string('eks_metode_ekstraksi')->nullable();
            $table->string('eks_nama_kit_ekstraksi')->nullable();
            $table->string('eks_dikirim_ke_lab')->nullable();
            $table->string('eks_nama_pengirim_rna')->nullable();
            $table->date('eks_tanggal_pengiriman_rna')->nullable();
            $table->string('eks_jam_pengiriman_rna')->nullable();
            $table->text('eks_catatan')->nullable();
            $table->integer('eks_userid')->nullable();
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
        Schema::dropIfExists('ekstraksisampel');
    }
}
