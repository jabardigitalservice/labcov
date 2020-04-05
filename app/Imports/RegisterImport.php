<?php

namespace App\Imports;

use App\RegisterPasien;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class RegisterImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        
        foreach ($rows as $row) 
        {   $insert = new RegisterPasien;
            $insert->insertOrIgnore([
                'reg_no'  => $row['nomor_registrasi'],
                'reg_nik' => $row['nik_pasien'],
                'reg_dinkes_pengirim'    => $row['dinkes_pengirim'],
                'reg_fasyankes_pengirim'    => $row['fasyankes_pengirim'],
                'reg_nama_rs'    => $row['nama_rs'],
                'reg_no_rekammedis'    => $row['no_rekammedis'],
                'reg_nama_dokter'    => $row['nama_dokter'],
                'reg_telp_fas_pengirim'    => $row['telp_fas_pengirim'],
                'reg_nama_pasien'    => $row['nama_pasien'],
                'reg_tanggallahir'    => $row['tanggallahir'],
                'reg_usia'    => $row['usia'],
                'reg_kelamin'    => $row['kelamin'],
                'reg_hamil_pasca'    => $row['hamil_pasca'],
                'reg_alamat'    => $row['alamat'],
                'reg_notelp_pasien'    => $row['notelp_pasien'],
                'reg_history_visit'    => $row['nomor_history_visit'],
                'reg_onset_panas'    => $row['onset_panas'],
                'reg_gejpanas'    => $row['gejpanas'],
                'reg_gejbatuk'    => $row['gejbatuk'],
                'reg_gejnyeritenggorokan'    => $row['gejnyeritenggorokan'],
                'reg_gejsesaknafas'    => $row['gejsesaknafas'],
                'reg_gejpilek'    => $row['gejpilek'],
                'reg_gejlesu'    => $row['gejlesu'],
                'reg_gejsakitkepala'    => $row['gejsakitkepala'],
                'reg_gejdiare'    => $row['gejdiare'],
                'reg_gejmualmuntah'    => $row['gejmualmuntah'],
                'reg_gejlain'    => $row['gejlain'],
                'reg_xrayparu'    => $row['xrayparu'],
                'reg_hasilxray'    => $row['hasilxray'],
                  'reg_leukosit'    => $row['leukosit'],
                  'reg_limfosit'    => $row['limfosit'],
                  'reg_trombosit'    => $row['trombosit'],
                  'reg_ventilator'    => $row['ventilator'],
                  'reg_statuskes'    => $row['statuskes'],
                  'reg_luarnegri'    => $row['berkunjung_ke_luar_negri'],
                  'reg_kunjunganluarnegri'    => $row['nomor_kunjunganluarnegri'],
                  'reg_kontakdgnsakit'    => $row['kontakdgnsakit'],
                  'reg_kontakterakhir'    => $row['kontakterakhir'],
                  'reg_kontakterinfeksi'    => $row['kontakterinfeksi'],
                  'reg_keluargapasiensakitsama'    => $row['keluargapasiensakitsama'],
                  'reg_komorbidhipertensi'    => $row['komorbidhipertensi'],
                  'reg_komorbiddm'    => $row['komorbiddm'],
                  'reg_komorbidliver'    => $row['komorbidliver'],
                  'reg_komorbidneurologi'    => $row['komorbidneurologi'],
                  'reg_komorbidneurologi'    => $row['komorbidhiv'],
                  'reg_komorbidparu'    => $row['komorbidparu'],
                  'reg_komorbidginjal'    => $row['komorbidginjal'],
                  'reg_penjelasanlain'    => $row['penjelasanlain'],
                  'reg_dateinput'    => $row['dateinput'],
                  'reg_userid'    => $row['userid'],
                  'reg_statusreg'    => $row['statusreg'],
             
            ]);
        }
        }
        
}
