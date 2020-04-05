<?php

namespace App\Imports;

use App\KunjunganPergi;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KunjunganPergiImport implements ToCollection, WithHeadingRow
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
        {   $kun = new KunjunganPergi;
            $kun->insertOrIgnore([
                'kun_regid'  => $row['nomor_registrasi'],
                'kun_tanggalkunjungan' => $row['tanggal_kunjungan'],
                'kun_kotakunjungan'    => $row['kota_kunjungan'],
                'kun_negarakunjungan'    => $row['negara_kunjungan'],
            ]);
           
           $this->array[] = $kun->kunid;
    }
}
    public function getArray(): array {
        return $this->array;
    }
}
