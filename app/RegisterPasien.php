<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegisterPasien extends Model
{
    /*
    **
    * The database table used by the model.
    *
    * @var string
    */
   protected $table = 'register';

   /**
    * The database primary key value.
    *
    * @var string
    */
   protected $primaryKey = 'regid';

   /**
    * Attributes that should be mass-assignable.
    * @var array

    */
    // DATA REGISTRASI PASIEN //
   protected $fillable = ['reg_no',
   'reg_nik',
   'reg_dinkes_pengirim',
   'reg_fasyankes_pengirim',
   'reg_nama_rs',
   'reg_no_rekammedis',
   'reg_nama_dokter',
   'reg_telp_fas_pengirim',
   'reg_nama_pasien',
   'reg_tanggallahir',
   'reg_usia',
   'reg_kelamin',
   'reg_hamil_pasca',
   'reg_alamat',
   'reg_notelp_pasien',
   'reg_history_visit',
   'reg_onset_panas',
   'reg_gejpanas',
   'reg_gejbatuk',
   'reg_gejnyeritenggorokan',
   'reg_gejsesaknafas',
   'reg_gejpilek',
   'reg_gejlesu',
   'reg_gejsakitkepala',
   'reg_gejdiare',
   'reg_gejmualmuntah',
   'reg_gejlain',
   'reg_xrayparu',
   'reg_hasilxray',
   'reg_seldarput',
   'reg_leukosit',
   'reg_limfosit',
   'reg_trombosit',
   'reg_ventilator',
   'reg_statuskes',
   'reg_luarnegri',
   'reg_kunjunganluarnegri',
   'reg_kontakdgnsakit',
   'reg_kontakterakhir',
   'reg_kontakterinfeksi',
   'reg_keluargapasiensakitsama',
   'reg_komorbidhipertensi',
   'reg_komorbiddm',
   'reg_komorbidliver',
   'reg_komorbidneurologi',
   'reg_komorbidhiv',
   'reg_komorbidparu',
   'reg_komorbidginjal',
   'reg_penjelasanlain',
   'reg_dateinput',
   'reg_userid',
   'created_at',
   'updated_at'];
}
