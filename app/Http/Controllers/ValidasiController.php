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
  

class ValidasiController extends Controller
{
    public function index(Request $request){
        $validasi = PemeriksaanSampel::join('sampel','sampel.sam_id','=','pemeriksaansampel.pem_samid')
        ->join('ekstraksisampel','ekstraksisampel.eks_id','=','pemeriksaansampel.pem_eksid')
        ->join('register','register.reg_no','=','ekstraksisampel.eks_noreg')
        ->select('pemeriksaansampel.*','ekstraksisampel.eks_status','sampel.sam_id','sampel.sam_barcodenomor_sampel','sampel.sam_jenis_sampel','sampel.sam_namadiluarjenis','register.reg_nik','register.reg_no')
       ->where('ekstraksisampel.eks_status',2)->get();
       return view('validasi.index')->with(compact('validasi'));
    }

    public function show($id){
        $show =  PemeriksaanSampel::join('sampel','sampel.sam_id','=','pemeriksaansampel.pem_samid')
        ->join('ekstraksisampel','ekstraksisampel.eks_id','=','pemeriksaansampel.pem_eksid')
        ->join('register','register.reg_no','=','pemeriksaansampel.pem_noreg')
        ->select('pemeriksaansampel.*','ekstraksisampel.eks_status','sampel.sam_id','sampel.sam_barcodenomor_sampel','sampel.sam_jenis_sampel','sampel.sam_namadiluarjenis','register.reg_nik','register.reg_no')
       ->where('pemeriksaansampel.pem_id',$id)->first();
       $notes = Notes::where('note_item_id',$show->pem_id)->where('note_item_type',2)->orderBy('created_at','desc')->get();
       return view('validasi.show')->with(compact('show','notes'));
    }

    public function print(){

       // This  $data array will be passed to our PDF blade       
       $data = [          
       'nama' => 'Jaka Sembiring',       
        'ttl' => 'Bandung, 28 September 1991',       
        'jk' => 'Laki Laki'];
        
    $pdf = PDF::loadView('validasi.pdf_view', $data);  
    return $pdf->stream();
}
    

    public function masukanrekap(){

    }

    public function verify(Request $request){
    $insert = collect($request->all());
    $insert->put('val_date_print',Carbon::now());
    $pemeriksaan = PemeriksaanSampel::where('pem_id',$request->val_pemid)->first();
    $sampel = Sampel::where('sam_id',$request->val_samid)->first();
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
     $jenis = " Nasal Wash";
    }
    else if($sampel->sam_jenis_sampel == 6){
    $jenis = " Jaringan Biopsi/Otopsi";}

    else if($sampel->sam_jenis_sampel == 7){
    $jenis = " Serum Akut (kurang dari 7 hari demam)";
    }
    else if($sampel->sam_jenis_sampel == 8){
    $jenis = " Serum konvalesen (2-3 minggu demam)";
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
if($request->val_ttd = 1) {
    $nama = "dr. RYAN B. RISTANDI, Sp.PK., MMRS";
    $nip = "NIP. 19820507 200902 1 004";
}else {
    $nama = "dr. CUT NUR CINTHIA ALAMANDA, Sp.PK., M.Kes";
    $nip = "NIP. 19740906 201412 2 001";
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
        ];
    $pdf = PDF::loadView('validasi.pdf_view', $data);  
     
    return $pdf->stream();
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

}
