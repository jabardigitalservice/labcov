<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KunjunganPergi extends Model
{
    
     /*
    **
    * The database table used by the model.
    *
    * @var string
    */
   protected $table = 'historykunjungan';

   /**
    * The database primary key value.
    *
    * @var string
    */
   protected $primaryKey = 'kunid';

   /**
    * Attributes that should be mass-assignable.
    * @var array
    
    */
   protected $fillable = ['kun_regid',
   'kun_tanggalkunjungan',
   'kun_kotakunjungan',
   'kun_negarakunjungan',
   'created_at',
   'updated_at'];  
}
