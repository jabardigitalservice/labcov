<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoryPerawatan extends Model
{
     /*
    **
    * The database table used by the model.
    *
    * @var string
    */
   protected $table = 'historyperawatan';

   /**
    * The database primary key value.
    *
    * @var string
    */
   protected $primaryKey = 'hisid';

   /**
    * Attributes that should be mass-assignable.
    * @var array
    
    */
   protected $fillable = ['his_regid',
   'his_tanggalrawat',
   'his_rsfasyankes',
   'created_at',
   'updated_at'];  
}
