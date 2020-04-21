<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Validasi extends Model

{
    
    /*
    **
        
    * The database table used by the model.
    *
    * @var string
    */
   protected $table = 'validasi';

   /**
    * The database primary key value.
    *
    * @var string
    */
   protected $primaryKey = 'val_id';

   /**
    * Attributes that should be mass-assignable.
    * @var array
 
    */
    // SAMPEL PENERIMAAN //
   protected $fillable = ['val_pemid',
   'val_noreg',
   'val_samid',
   'val_ttd',
   'val_date_print',
   'val_file',
   'val_status',
   'val_userid',
   'val_is_rapid',
   'created_at',
   'updated_at'];
}
