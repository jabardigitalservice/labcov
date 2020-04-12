<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PemusnahanSampel extends Model
{
    /*
    *
    * The database table used by the model.
    * @var string
    */
    protected $table = 'pemusnahansampel';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'mus_id';
    /**
     * Attributes that should be mass-assignable.
     * @var array
 
     */
     // SAMPEL PASIEN //
    protected $fillable = ['mus_penid',
    'mus_samid',
    'mus_sudah_dimusnahkan',
    'mus_tanggal_pemusnahan',
    'mus_perintah_pemusnahan',
    'mus_print_surat',
    'created_at',
    'updated_at'];
}
