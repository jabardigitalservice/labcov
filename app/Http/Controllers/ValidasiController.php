<?php

namespace App\Http\Controllers;
use App\Ekstraksi;
use App\PemeriksaanSampel;
use Illuminate\Database\QueryException as QE;
use App\Sampel;
use App\PengambilanSampel;
use App\Notes;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use Carbon\Carbon;
use App\RegisterPasien;
use Illuminate\Http\Request;
use PDF;
use App\Validasi;
use App\PencatatanRapid;
  

class ValidasiController extends Controller
{
    public function index(Request $request){
        $belum_validasi = PemeriksaanSampel::join('sampel','sampel.sam_id','=','pemeriksaansampel.pem_samid')
        ->join('ekstraksisampel','ekstraksisampel.eks_id','=','pemeriksaansampel.pem_eksid')
        ->join('pengambilansampel','pengambilansampel.pen_id','=','sampel.sam_penid')
        ->join('register','register.reg_no','=','pengambilansampel.pen_noreg')
        ->select('pemeriksaansampel.*','register.reg_no','register.reg_nik','ekstraksisampel.eks_status','sampel.sam_id','sampel.sam_barcodenomor_sampel','sampel.sam_jenis_sampel','sampel.sam_namadiluarjenis','register.reg_nik','register.reg_no','register.reg_jenisidentitas','register.reg_nosim')
       ->where('pemeriksaansampel.pem_status',1)->get();

       $validasi = Validasi::join('sampel','sampel.sam_id','=','validasi.val_samid')
       ->join('pemeriksaansampel','pemeriksaansampel.pem_id','=','validasi.val_pemid')
       ->join('register','register.reg_no','=','validasi.val_noreg')
       ->select('validasi.*','pemeriksaansampel.*','sampel.sam_id','sampel.sam_barcodenomor_sampel','sampel.sam_jenis_sampel','sampel.sam_namadiluarjenis','register.reg_nik','register.reg_no','register.reg_jenisidentitas','register.reg_nosim')
      ->where('validasi.val_status',2)->get();
       return view('validasi.index')->with(compact('validasi','belum_validasi'));
    }

    public function show($id){
        
       $validated = Validasi::where('val_id',$id)->first();
     $show =  PemeriksaanSampel::join('sampel','sampel.sam_id','=','pemeriksaansampel.pem_samid')
         ->join('pengambilansampel','pengambilansampel.pen_id','=','sampel.sam_penid')
        ->join('ekstraksisampel','ekstraksisampel.eks_id','=','pemeriksaansampel.pem_eksid')
        ->join('register','register.reg_no','=','pengambilansampel.pen_noreg')
        ->select('pemeriksaansampel.*','register.reg_no','register.reg_nik','ekstraksisampel.eks_status','sampel.sam_id','sampel.sam_barcodenomor_sampel','sampel.sam_jenis_sampel','sampel.sam_namadiluarjenis','register.reg_nik','register.reg_no')
       ->where('pemeriksaansampel.pem_id',$id)->first();
       $notes = Notes::where('note_item_id',$id)->where('note_item_type',2)->orderBy('created_at','desc')->get();
       return view('validasi.new')->with(compact('show','notes','validated'));
    }
    public function showvalidated($id){
        
        $validated = Validasi::where('val_id',$id)->first();
         $show =  PemeriksaanSampel::join('sampel','sampel.sam_id','=','pemeriksaansampel.pem_samid')
         ->join('pengambilansampel','pengambilansampel.pen_id','=','sampel.sam_penid')
        ->join('ekstraksisampel','ekstraksisampel.eks_id','=','pemeriksaansampel.pem_eksid')
        ->join('register','register.reg_no','=','pengambilansampel.pen_noreg')
         ->select('pemeriksaansampel.*','register.reg_no','register.reg_nik','ekstraksisampel.eks_status','sampel.sam_id','sampel.sam_barcodenomor_sampel','sampel.sam_jenis_sampel','sampel.sam_namadiluarjenis','register.reg_nik','register.reg_no')
        ->where('pemeriksaansampel.pem_id',$validated->val_pemid)->first();
        $notes = Notes::where('note_item_id',$validated->val_pemid)->where('note_item_type',2)->orderBy('created_at','desc')->get();
        return view('validasi.show')->with(compact('show','notes','validated'));
     }
 

    public function print($id){
        $validasipdf = Validasi::where('val_id',$id)->first();
    return redirect($validasipdf->val_file);
}


    public function verify(Request $request){
    $insert = collect($request->all());
    $insert->put('val_date_print',Carbon::now());
    $validate = new Validasi;
    $pemeriksaan = PemeriksaanSampel::where('pem_id',$request->val_pemid)->first();
    $pemeriksaan->pem_status = 2;
    $sampel = Sampel::where('sam_id',$request->val_samid)->first();
    $sampel->sam_statussam = 4;
    
    if($sampel->sam_jenis_sampel == 1){
    $jenis = "Usap Nasofaring & Orofaring";
    }
    else if($sampel->sam_jenis_sampel == 2){
    $jenis = "Sputum";
    }
    else if($sampel->sam_jenis_sampel == 3){
    $jenis = "Bronchoalveolar Lavage";
    }
    else if($sampel->sam_jenis_sampel == 4){
     $jenis = "Tracheal Aspirate";
    }
    else if($sampel->sam_jenis_sampel == 5){
     $jenis = "Nasal Wash";
    }
    else if($sampel->sam_jenis_sampel == 6){
    $jenis = "Jaringan Biopsi/Otopsi";}

    else if($sampel->sam_jenis_sampel == 7){
    $jenis = "Serum Akut (kurang dari 7 hari demam)";
    }
    else if($sampel->sam_jenis_sampel == 8){
    $jenis = "Serum konvalesen (2-3 minggu demam)";
    }
    else if($sampel->sam_jenis_sampel == 12){
    $jenis = "Jenis Sampel Lainnya : ".$sampel->sam_namadiluarjenis;
    }
     else{
     $jenis = "Jenis Sampel Lainnya : ".$sampel->sam_namadiluarjenis;
    }
    if(!is_null($request->val_noreg)){
        $changeregstatus = RegisterPasien::where('reg_no',$request->val_noreg)->first();
        $changeregstatus->reg_statusreg = 5;
        $changeregstatus->update();
      }else {
        notify()->warning('TIDAK BISA VERIFIKASI, Tidak ada informasi pasien / belum di tambahkan register!');
        return redirect('validasi');
      }
if($request->val_ttd == 1) {
    $nama = "dr. RYAN B. RISTANDI, Sp.PK., MMRS";
    $nip = "NIP. 19820507 200902 1 004";
}else {
    $nama = "dr. CUT NUR CINTHIA ALAMANDA, Sp.PK., M.Kes";
    $nip = "NIP. 19740906 201412 2 001";
}
$date = Carbon::now()->locale('id_ID');
$monthnumber = $date->isoFormat('M');
$map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
    $romannumber= '';
    while ($monthnumber > 0) {
        foreach ($map as $roman => $int) {
            if($monthnumber >= $int) {
                $monthnumber -= $int;
                $romannumber.= $roman;
                break;
            }
        }
    }

    $data = [ 'namapasien' => $changeregstatus->reg_nama_pasien,       
         'ttl' => $changeregstatus->reg_nama_pasien.', '.$changeregstatus->reg_tempatlahir.' '.$changeregstatus->reg_tanggallahir,       
         'jk' =>  $changeregstatus->reg_kelamin,
         'noreg' =>  $changeregstatus->reg_no,
         'bp' =>  $jenis,
         'tts' =>  $pemeriksaan->pem_tanggal_penerimaan_sampel,
         'metode' =>  $pemeriksaan->pem_metode_pemeriksaan,
         'kodesampel' =>  $sampel->sam_barcodenomor_sampel,
         'targetgen' =>  $changeregstatus->reg_kelamin,
         'tanggal' =>  $pemeriksaan->pem_tanggal_mulai_pemeriksaan,
         'hasdet' =>  $pemeriksaan->pem_target_gen ,
         'kesimpulanpemeriksaan' =>  $pemeriksaan->pem_kesimpulan_pemeriksaan,
         'nama' =>  $nama,
         'nip' => $nip,
         'nosurat' => $validate->val_id,
         'bulansurat' => $romannumber,
         'tanggalsurat' =>  $date->isoFormat('D MMMM Y'),   // dimanche 22 mars 2020 17:45, 
        ];
        
    $pdf = PDF::loadView('validasi.pdf_view', $data)->save('pdf/surat-keterangan-hasil-'.$changeregstatus->reg_no.'.pdf');
    $insert->put('val_file','pdf/surat-keterangan-hasil-'.$changeregstatus->reg_no.'.pdf');
    $insert->put('val_status', 2);

    try{
        $validate->create($insert->all());
        $sampel->update();
        $pemeriksaan->update();
             }catch(QE $e){  return $e; } //show db error message
    notify()->success('Pemeriksaan telah selesai diverifikasi !');
    return redirect('validasi');
    }
    


    public function kembalikan($id){
     $pemreturn = PemeriksaanSampel::join('sampel','sampel.sam_id','=','pemeriksaansampel.pem_samid')
     ->join('ekstraksisampel','ekstraksisampel.eks_id','=','pemeriksaansampel.pem_eksid')
     ->join('register','register.reg_no','=','pemeriksaansampel.pem_noreg')
     ->select('pemeriksaansampel.*','ekstraksisampel.eks_status','sampel.sam_id','sampel.sam_barcodenomor_sampel','sampel.sam_jenis_sampel','sampel.sam_namadiluarjenis','register.reg_nik','register.reg_no')
    ->where('pemeriksaansampel.pem_id',$id)->first();

    return view('validasi.pengembalian')->with(compact('pemreturn'));
     
        }

    public function kembalikanupdate(Request $request){

        $pemreturn = PemeriksaanSampel::where('pem_id',$request->pemid)->first();
        $pemreturn->pem_status = 99;
        $changestatusam = Sampel::where('sam_id',$pemreturn->pem_samid)->first();
        $changestatusam->sam_statussam = 2;

        if(!is_null($changepenstatus->pen_noreg)){
            $changeregstatus = RegisterPasien::where('reg_no',$pemreturn->pem_noreg)->first();
            $changeregstatus->reg_statusreg = 3;
            $changeregstatus->update();
          }

          $notes = new Notes;
          $notes->note_isi = $request->note_isi."<br> Permintaan pengembalian pemeriksaan #".$pemreturn->pem_id." oleh validator pada ".Carbon::now();
          $notes->note_item_id  = $request->note_item_id;
          $notes->note_item_type = 31;
          $notes->note_userid  = $request->note_userid;

          
        try{
            $pemreturn->update();
            $changestatusam->update();
            $notes->save();
                  }catch(QE $e){  return $e; } //show db error message
                   
         notify()->success('Sampel telah dikembalikan ke Lab Pemeriksaan !');
           return redirect('validasi');
         // return $request->all();
    }

    /*
    * VALIDASI RDT
    *
    */

    public function indexrdt(){
        $belum_validasi = PencatatanRapid::join('sampel','sampel.sam_id','=','pencatatanrapid.rapid_sampel_id')
        ->join('pengambilansampel','pengambilansampel.pen_id','=','pencatatanrapid.rapid_penid')
        ->join('register','register.reg_no','=','pengambilansampel.pen_noreg')
        ->select('pencatatanrapid.*','sampel.sam_penid','sampel.sam_jenis_sampel','sampel.sam_barcodenomor_sampel','pengambilansampel.pen_noreg','pengambilansampel.pen_nik','register.reg_nik','register.reg_no','register.reg_jenisidentitas','register.reg_nosim')
        ->where('pencatatanrapid.rapid_status',2)
        ->get();

        $validasi = Validasi::join('sampel','sampel.sam_id','=','validasi.val_samid')
        ->join('pencatatanrapid','pencatatanrapid.rapid_id','=','validasi.val_pemid')
        ->join('register','register.reg_no','=','validasi.val_noreg')
        ->select('validasi.*','pencatatanrapid.*','sampel.sam_id','sampel.sam_barcodenomor_sampel','sampel.sam_jenis_sampel','sampel.sam_namadiluarjenis','register.reg_nik','register.reg_no','register.reg_jenisidentitas','register.reg_nosim')
       ->where('validasi.val_status',2)->where('validasi.val_is_rapid',1)->get();
        return view('validasi.rdt.index')->with(compact('belum_validasi','validasi'));
    }

    public function verifyrdt(Request $request){
        $insert = collect($request->all());
        $insert->put('val_date_print',Carbon::now());
        $validate = new Validasi;
        $pencatatanrdt = PencatatanRapid::where('rapid_id',$request->val_pemid)->first();
        $pencatatanrdt->rapid_status = 3;
        $sampel = Sampel::where('sam_id',$request->val_samid)->first();
        $sampel->sam_statussam = 4;
        if($pencatatanrdt->rapid_jenistes == 1) {
            $jenistes = "IgG"; } 
        elseif($pencatatanrdt->rapid_jenistes == 2){
            $jenistes = "IgM";
            } elseif($pencatatanrdt->rapid_jenistes == 3){
                $jenistes = "IgG/IgM";
            }elseif($pencatatanrdt->rapid_jenistes == 4){
                $jenistes = "Antigen";
            }
        if($sampel->sam_jenis_sampel == 9){
        $jenis = "Usap Nasofaring & Orofaring";
        }
        else if($sampel->sam_jenis_sampel == 10){
        $jenis = "Sputum";
        }
        else if($sampel->sam_jenis_sampel == 11){
        $jenis = "Bronchoalveolar Lavage";
        }
        else if($sampel->sam_jenis_sampel == 12){
        $jenis = "Jenis Sampel Lainnya : ".$sampel->sam_namadiluarjenis;
        }
         else{
         $jenis = "Jenis Sampel Lainnya : ".$sampel->sam_namadiluarjenis;
        }
        if(!is_null($request->val_noreg)){
            $changeregstatus = RegisterPasien::where('reg_no',$request->val_noreg)->first();
            $changeregstatus->reg_statusreg = 5;
            $changeregstatus->update();
          }else {
            notify()->warning('TIDAK BISA VERIFIKASI, Tidak ada informasi pasien / belum di tambahkan register!');
            return redirect('validasi');
          }
    if($request->val_ttd == 1) {
        $nama = "dr. RYAN B. RISTANDI, Sp.PK., MMRS";
        $nip = "NIP. 19820507 200902 1 004";
    }else {
        $nama = "dr. CUT NUR CINTHIA ALAMANDA, Sp.PK., M.Kes";
        $nip = "NIP. 19740906 201412 2 001";
    }
    $date = Carbon::now()->locale('id_ID');
    $monthnumber = $date->isoFormat('M');
    $map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
        $romannumber= '';
        while ($monthnumber > 0) {
            foreach ($map as $roman => $int) {
                if($monthnumber >= $int) {
                    $monthnumber -= $int;
                    $romannumber.= $roman;
                    break;
                }
            }
        }
    
        $data = [ 'namapasien' => $changeregstatus->reg_nama_pasien,       
             'ttl' => $changeregstatus->reg_nama_pasien.', '.$changeregstatus->reg_tempatlahir.' '.$changeregstatus->reg_tanggallahir,       
             'jk' =>  $changeregstatus->reg_kelamin,
             'noreg' =>  $changeregstatus->reg_no,
             'bp' =>  $jenis,
             'tanggal' =>  $pencatatanrdt->rapid_tanggal_rdt_1,
             'jenistes' => $jenistes,
             'keteranganlain' =>  $pencatatanrdt->rapid_catatan_1,
             'kesimpulanpemeriksaan' =>  $pencatatanrdt->rapid_kesimpulan_rdt_1,
             'nama' =>  $nama,
             'nip' => $nip,
             'nosurat' => $validate->val_id,
             'bulansurat' => $romannumber,
             'tanggalsurat' =>  $date->isoFormat('D MMMM Y'),   // dimanche 22 mars 2020 17:45, 
            ];
            
        $pdf = PDF::loadView('validasi.rdt.pdf_view_rdt', $data)->save('pdf/surat-keterangan-hasil-rdt-'.$changeregstatus->reg_no.'.pdf');
        $insert->put('val_file','pdf/surat-keterangan-hasil-rdt-'.$changeregstatus->reg_no.'.pdf');
        $insert->put('val_status', 2);
        $insert->put('val_is_rapid', 1);
    
        try{
            $validate->create($insert->all());
            $sampel->update();
            $pencatatanrdt->update();
                 }catch(QE $e){  return $e; } //show db error message
        notify()->success('Pemeriksaan telah selesai diverifikasi !');
        return redirect('validasi/rdt');
        }

        public function showrdt($id){
        
            $validated = Validasi::where('val_pemid',$id)->where('val_is_rapid',1)->first();
             $show =  PencatatanRapid::join('sampel','sampel.sam_id','=','pencatatanrapid.rapid_sampel_id')
             ->join('pengambilansampel','pengambilansampel.pen_id','pencatatanrapid.rapid_penid')
             ->join('register','register.reg_no','=','pengambilansampel.pen_noreg')
             ->select('pencatatanrapid.*','sampel.sam_id','sampel.sam_barcodenomor_sampel','sampel.sam_jenis_sampel','sampel.sam_namadiluarjenis','register.reg_nik','register.reg_no')
            ->where('pencatatanrapid.rapid_id',$id)->first();
            $notes = Notes::where('note_item_id',$id)->where('note_item_type',4)->orderBy('created_at','desc')->get();
            return view('validasi.rdt.new')->with(compact('show','notes','validated'));
         }
         public function showvalidatedrdt($id){
             
             $validated = Validasi::where('val_id',$id)->first();
             $show =  PencatatanRapid::join('sampel','sampel.sam_id','=','pencatatanrapid.rapid_sampel_id')
             ->join('pengambilansampel','pengambilansampel.pen_id','pencatatanrapid.rapid_penid')
             ->join('register','register.reg_no','=','pengambilansampel.pen_noreg')
             ->select('pencatatanrapid.*','sampel.sam_id','sampel.sam_barcodenomor_sampel','sampel.sam_jenis_sampel','sampel.sam_namadiluarjenis','register.reg_nik','register.reg_no')
            ->where('pencatatanrapid.rapid_id',$validated->val_pemid)->first();
             $notes = Notes::where('note_item_id',$validated->val_pemid)->where('note_item_type',4)->orderBy('created_at','desc')->get();
             return view('validasi.rdt.show')->with(compact('show','notes','validated'));
          }
      
     
         public function printrdt($id){
             $validasipdf = Validasi::where('val_id',$id)->first();
         return redirect($validasipdf->val_file);
     }
     
}
