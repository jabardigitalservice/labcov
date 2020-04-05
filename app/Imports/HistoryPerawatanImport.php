<?php

namespace App\Imports;

use App\HistoryPerawatan;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class HistoryPerawatanImport implements ToCollection, WithHeadingRow
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
            $his = new HistoryPerawatan;
            $his->insertOrIgnore([
            'his_regid'  => $row['nomor_registrasi'],
            'his_tanggalrawat' => $row['tanggal_rawat'],
            'his_rsfasyankes'    => $row['rs_fasyankes'],
        ]);
        $this->array[] = $his->hisid;
        }
    }

    public function getArray(): array {
        return $this->array;
    }

}
