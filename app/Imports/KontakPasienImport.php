<?php

namespace App\Imports;
use App\RegisterPasien;
use App\KontakPasien;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KontakPasienImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public $array;

    public function __construct() 
    {
        $this->array = array();
    }
   
  public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {   
            $kon = new KontakPasien;
            $kon->insertOrIgnore([
            'kon_regid'  => $row['nomor_registrasi'],
            'kon_namakon' => $row['nama_kontak'],
            'kon_alamatkon' => $row['alamat_kontak'],
            'kon_hubungankon' => $row['hubungan_kontak'],
            'kon_tanggalkon' => $row['tanggal_kontak'],
            ]);
           
           $this->array[] = $kon->konid;
        }

    }

    public function getArray(): array {
        return $this->array;
    }

}
