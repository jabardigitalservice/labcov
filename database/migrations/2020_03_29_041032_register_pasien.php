<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RegisterPasien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('register', function (Blueprint $table) {
            $table->increments('regid');
            //IDENTITAS REGISTER
            $table->string('reg_no')->unique();
            $table->string('reg_nik')->nullable();
            // IDENTITAS PENGIRIM
            $table->string('reg_dinkes_pengirim')->nullable();
            $table->string('reg_fasyankes_pengirim')->nullable();
            $table->string('reg_nama_rs')->nullable();
            $table->string('reg_no_rekammedis')->nullable();
            $table->string('reg_nama_dokter')->nullable();
            $table->string('reg_telp_fas_pengirim')->nullable();
            // IDENTITAS PASIEN
            $table->string('reg_nama_pasien')->nullable();
            $table->date('reg_tanggallahir')->nullable();
            $table->string('reg_usia')->nullable();
            $table->string('reg_kelamin')->nullable();
            $table->string('reg_hamil_pasca')->nullable();
            $table->string('reg_alamat')->nullable();
            $table->string('reg_notelp_pasien')->nullable();
            // RIWAYAT PERAWATAN
            $table->text('reg_history_visit'); // nyambung ke table history perawatan
            // TANDA DAN GEJALA
            $table->date('reg_onset_panas')->nullable();
            $table->string('reg_gejpanas')->nullable();
            $table->string('reg_gejbatuk')->nullable();
            $table->string('reg_gejnyeritenggorokan')->nullable();
            $table->string('reg_gejsesaknafas')->nullable();
            $table->string('reg_gejpilek')->nullable();
            $table->string('reg_gejlesu')->nullable();
            $table->string('reg_gejsakitkepala')->nullable();
            $table->string('reg_gejdiare')->nullable();
            $table->string('reg_gejmualmuntah')->nullable();
            $table->text('reg_gejlain')->nullable();
            // PEMERIKSAAN PENUNJANG
            $table->string('reg_xrayparu')->nullable();
            $table->text('reg_hasilxray')->nullable();
            $table->string('reg_seldarput')->nullable();
            $table->string('reg_leukosit')->nullable();
            $table->string('reg_limfosit')->nullable();
            $table->string('reg_trombosit')->nullable();
            $table->string('reg_ventilator')->nullable();
            $table->string('reg_statuskes')->nullable();
            //RIWAYAT KONTAK PAPARAN
            $table->string('reg_luarnegri')->nullable();
            $table->string('reg_kunjunganluarnegri')->nullable(); //nyambung table kunjungan
            $table->string('reg_kontakdgnsakit')->nullable();
            $table->string('reg_kontakterakhir')->nullable(); //nyambung ke table kontak
            $table->string('reg_kontakterinfeksi')->nullable(); 
            $table->string('reg_keluargapasiensakitsama')->nullable(); 
            //KOMORBID
            $table->string('reg_komorbidhipertensi')->nullable();
            $table->string('reg_komorbiddm')->nullable();
            $table->string('reg_komorbidliver')->nullable();
            $table->string('reg_komorbidneurologi')->nullable();
            $table->string('reg_komorbidhiv')->nullable();
            $table->string('reg_komorbidparu')->nullable();
            $table->string('reg_komorbidginjal')->nullable();
            $table->text('reg_penjelasanlain')->nullable();
            $table->date('reg_dateinput')->nullable();
            $table->date('reg_userid')->nullable();
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
