<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
     /*
    **
    * The database table used by the model.
    *
    * @var string
    */
   protected $table = 'logs';

   /**
    * The database primary key value.
    *
    * @var string
    */
   protected $primaryKey = 'id';

   /**
    * Attributes that should be mass-assignable.
    * @var array

    */
    // LOGS PASIEN //
   protected $fillable = ['log_user',
   'log_item',
   'log_type',
   'created_at',
   'updated_at'];
}
