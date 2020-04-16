<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PemeriksaanSampel extends Model
{
        /*
    **
        
    * The database table used by the model.
    *
    * @var string
    */
   protected $table = 'pemeriksaansampel';

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
   protected $fillable = ['pem_penid',
   'pem_noreg',
   'pem_samid', 
   'pem_eksid',
   'pem_tanggal_penerimaan_sampel',
   'pem_jam_penerimaan_sampel',
   'pem_lab_penerima_sampel',
   'pem_lab_penerima_sampel_lainnya',
   'pem_petugas_penerima_sampel_rna',
   'pem_operator_real_time_pcr',
   'pem_tanggal_mulai_pemeriksaan',
   'pem_jam_mulai_pcr',
   'pem_jam_selesai_pcr',
   'pem_metode_pemeriksaan',
   'pem_nama_kit_pemeriksaan',
   'pem_target_gen',
   'pem_hasil_deteksi',
   'pem_grafik',
   'pem_kesimpulan_pemeriksaan',
   'created_at',
   'updated_at'];
}
