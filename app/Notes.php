<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Notes extends Model
{
    /*
    **
        
    * The database table used by the model.
    *
    * @var string
    */
   protected $table = 'notes';

   /**
    * The database primary key value.
    *
    * @var string
    */
   protected $primaryKey = 'note_id';

   /**
    * Attributes that should be mass-assignable.
    * @var array
 
    */
    // SAMPEL PENERIMAAN //
   protected $fillable = ['note_userid',
   'note_isi',
   'note_item_id',
   'note_item_type',
   'created_at',
   'updated_at'];
}
