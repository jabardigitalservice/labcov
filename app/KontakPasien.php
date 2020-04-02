<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KontakPasien extends Model
{
     /*
    **
    * The database table used by the model.
    *
    * @var string
    */
   protected $table = 'historykontakpasien';

   /**
    * The database primary key value.
    *
    * @var string
    */
   protected $primaryKey = 'konid';

   /**
    * Attributes that should be mass-assignable.
    * @var array

    */
    // HISTORY KONTAK //
   protected $fillable = ['kon_regid',
   'kon_namakon',
   'kon_alamatkon',
   'kon_hubungankon',
   'kon_tanggalkon',
   'created_at',
   'updated_at'];
}
