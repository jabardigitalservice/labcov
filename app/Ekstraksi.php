<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ekstraksi extends Model
{
    

     /*
    **
    * The database table used by the model.
    *
    * @var string
    */
   protected $table = 'ekstraksisampel';

   /**
    * The database primary key value.
    *
    * @var string
    */
   protected $primaryKey = 'eks_id';
   

   /**
    * Attributes that should be mass-assignable.
    * @var array

    */
    // SAMPEL PASIEN //
   protected $fillable = ['eks_nik',
   'eks_noreg',
   'eks_penid',
   'eks_samid',
   'eks_tanggal_penerimaan_sampel',
   'eks_jam_penerimaan_sampel',
   'eks_petugas_penerima_sampel',
   'eks_operator_ekstraksi',
   'eks_tanggal_mulai_ekstraksi',
   'eks_jam_mulai_ekstraksi',
   'eks_metode_ekstraksi',
   'eks_nama_kit_ekstraksi',
   'eks_dikirim_ke_lab',
   'eks_nama_pengirim_rna',
   'eks_tanggal_pengiriman_rna',
   'eks_jam_pengiriman_rna',
   'eks_catatan',
   'eks_nama_lab_lain',
   'eks_status',
   'eks_userid',
   'created_at',
   'updated_at'];
}
