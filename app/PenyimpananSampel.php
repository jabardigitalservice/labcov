<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenyimpananSampel extends Model
{
   /*
    **
    * The database table used by the model.
    * @var string
    */
    protected $table = 'penyimpanansampel';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'sim_id';
    /**
     * Attributes that should be mass-assignable.
     * @var array
 
     */
     // SAMPEL PASIEN //
    protected $fillable = ['sim_penid',
    'sim_samid',
    'sim_lokasi_simpan',
    'sim_tanggal_simpan',
    'sim_perintah_penyimpanan',
    'sim_print_surat',
    'created_at',
    'updated_at'];
}
