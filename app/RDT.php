<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RDT extends Model
{
    
    /*
    **
        
    * The database table used by the model.
    *
    * @var string
    */
   protected $table = 'rapidtestregister';

   /**
    * The database primary key value.
    *
    * @var string
    */
   protected $primaryKey = 'rar_id';

   /**
    * Attributes that should be mass-assignable.
    * @var array
 
    */
    // SAMPEL PENERIMAAN //
   protected $fillable = [
   'rar_noreg',
   'rar_pernah_rdt',
   'rar_hasil_rdt',
   'rar_tanggal_rdt',
   'rar_keterangan',
   'created_at',
   'updated_at'];
}
