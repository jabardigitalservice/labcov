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
   'reg_gejpenumonia',
   'reg_komorbidneurologi',
   'reg_komorbidhiv',
   'reg_komorbidparu',
   'reg_komorbidginjal',
   'reg_penjelasanlain',
   'reg_dateinput',
   'reg_userid',
   'reg_statusreg',
   'reg_tanggalkunjungan',
   'reg_rsfasyankes',
   'reg_nosim',
   'reg_kunke',
   'reg_jenisidentitas',
   'reg_domisilikotakab',
   'reg_domisilikecamatan',
   'reg_domisilikelurahan',
   'reg_nama_rs_lainnya',
   'reg_tanggalkunjungan_pasien1',
   'reg_kotakunjungan_pasien1',
   'reg_negarakunjungan_pasien1',
   'reg_tanggalkunjungan_pasien2',
   'reg_kotakunjungan_pasien2',
   'reg_negarakunjungan_pasien2',
   'reg_tanggalkunjungan_pasien3',
   'reg_kotakunjungan_pasien3',
   'reg_negarakunjungan_pasien3',
   'reg_tanggalkunjungan_pasien3',
   'reg_kotakunjungan_pasien3',
   'reg_negarakunjungan_pasien3',
   'reg_tanggalkunjungan_pasien4',
   'reg_kotakunjungan_pasien4',
   'reg_negarakunjungan_pasien4',
   'reg_tanggalkunjungan_pasien5',
   'reg_kotakunjungan_pasien5',
   'reg_negarakunjungan_pasien5',
   'reg_tanggalkunjungan_pasien6',
   'reg_kotakunjungan_pasien6',
   'reg_negarakunjungan_pasien6',
   'reg_tanggalkunjungan_pasien7',
   'reg_kotakunjungan_pasien7',
   'reg_negarakunjungan_pasien7',
   'reg_namakon1',
   'reg_alamatkon1',
   'reg_hubungankon1',
   'reg_tanggalkonawal1',
   'reg_tanggalkonakhir1',
   'reg_namakon2',
   'reg_alamatkon2',
   'reg_hubungankon2',
   'reg_tanggalkonawal2',
   'reg_tanggalkonakhir2',
   'reg_namakon3',
   'reg_alamatkon3',
   'reg_hubungankon3',
   'reg_tanggalkonawal3',
   'reg_tanggalkonakhir3',
   'reg_namakon4',
   'reg_alamatkon4',
   'reg_hubungankon4',
   'reg_tanggalkonawal4',
   'reg_tanggalkonakhir4',
   'reg_namakon5',
   'reg_alamatkon5',
   'reg_hubungankon5',
   'reg_tanggalkonawal5',
   'reg_tanggalkonakhir5',
   'reg_namakon6',
   'reg_alamatkon6',
   'reg_hubungankon6',
   'reg_tanggalkonawal6',
   'reg_tanggalkonakhir6',
   'reg_namakon7',
   'reg_alamatkon7',
   'reg_hubungankon7',
   'reg_tanggalkonawal7',
   'reg_tanggalkonakhir7',
   'created_at',
   'updated_at'];
}
