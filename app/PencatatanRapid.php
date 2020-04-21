<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PencatatanRapid extends Model
{
    /*
    **
        
    * The database table used by the model.
    *
    * @var string
    */
   protected $table = 'pencatatanrapid';

   /**
    * The database primary key value.
    *
    * @var string
    */
   protected $primaryKey = 'rapid_id';

   /**
    * Attributes that should be mass-assignable.
    * @var array
 
    */
    // SAMPEL PENERIMAAN //
   protected $fillable = [
   'rapid_noreg',
   'rapid_sampel_id',
   'rapid_tanggal_pertama_demam',
   'rapid_tanggal_rdt_1',
   'rapid_jam_rdt_1',
   'rapid_jenis_sampel_rdt_1',
   'rapid_kesimpulan_rdt_1',
   'rapid_igg_1',
   'rapid_igm_1',
   'rapid_igm_igg_1',
   'rapid_antigen_1',
   'rapid_catatan_1',
   'rapid_status',
   'rapid_penid',
   'rapid_ke',
   'rapid_jenistes',
   'rapid_userid',
   'created_at',
   'updated_at'];
}
