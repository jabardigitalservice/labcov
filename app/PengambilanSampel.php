<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PengambilanSampel extends Model
{
    /*
    **
    * The database table used by the model.
    *
    * @var string
    */
   protected $table = 'pengambilansampel';

   /**
    * The database primary key value.
    *
    * @var string
    */
   protected $primaryKey = 'pen_id';
   /**
    * Attributes that should be mass-assignable.
    * @var array

    */
    // SAMPEL PASIEN //
   protected $fillable = ['pen_nik',
   'pen_noreg',
   'pen_sampel_diambil',
   'pen_sampel_diterima',
   'pen_sampel_diterima_dari_fas_rujukan',
   'pen_penerima_sampel',
   'pen_id_sampel',
   'pen_catatan',
   'pen_userid',
   'pen_statuspen',
   'pen_nomor_ekstraksi',
   'created_at',
   'updated_at'];
}
