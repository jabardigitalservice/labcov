<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sampel extends Model
{
    /*
    **
        
    * The database table used by the model.
    *
    * @var string
    */
   protected $table = 'sampel';

   /**
    * The database primary key value.
    *
    * @var string
    */
   protected $primaryKey = 'sam_id';

   /**
    * Attributes that should be mass-assignable.
    * @var array
 
    */
    // SAMPEL PENERIMAAN //
   protected $fillable = ['sam_penid',
   'sam_noreg',
   'sam_jenis_sampel',
   'sam_petugas_pengambil_sampel',
   'sam_tanggal_sampel',
   'sam_pukul_sampel',
   'sam_barcodenomor_sampel',
   'created_at',
   'updated_at'];
}
