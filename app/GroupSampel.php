<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupSampel extends Model
{
        /*
    **
        
    * The database table used by the model.
    *
    * @var string
    */
   protected $table = 'groupsampel';

   /**
    * The database primary key value.
    *
    * @var string
    */
   protected $primaryKey = 'pem_id';

   /**
    * Attributes that should be mass-assignable.
    * @var array
 
    */
    // SAMPEL PENERIMAAN //
   protected $fillable = ['group_sampel_id',
   'created_at',
   'updated_at'];
}
