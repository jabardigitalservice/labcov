<?php

namespace App\Http\Controllers;

// Model
use App\RegisterPasien;
use App\HistoryPerawatan;
use App\KontakPasien;
use App\KunjunganPergi;
use App\RDT;
use App\PengambilanSampel;
use App\GroupSampel;
use App\Sampel;
// Vendor Plugins / Addons
use Carbon\Carbon;
use App\Logs;
use Auth;
use App\Imports\RegisterImport;
use Illuminate\Database\QueryException as QE;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterPasienController extends Controller
{
       
    
    /**
     * Menampilkan semua data registrasi mandiri
     * view -> registrasi -> index
     * return collection
     */

    public function index()
    {
        $reg = RegisterPasien::get();
        return view('registrasi.index')->with(compact('reg'));
    }

    /**
     * data registrasi rujukan -> saat ini dimunculkan hanyaa box scanner saja
     * to do : Menampilkan semua data registrasi rujuna
     * view -> registrasi -> rujukan
     * return collection
     */
    public function rujukan()
    {
        $belum_reg = GroupSampel::join('pengambilansampel','pengambilansampel.pen_id','=','groupsampel.group_sampel_id')
        ->join('sampel','sampel.sam_penid','=','pengambilansampel.pen_id')
        ->select('sampel.sam_barcodenomor_sampel','pengambilansampel.pen_id','groupsampel.*')
        ->whereNull('pengambilansampel.pen_noreg')->get();
        $group = $belum_reg->groupby('group_sampel_id' );
       return view('registrasi.rujukan')->with(compact('group'));
    }

    /**
     * tampilan form registrasi dengan rujukan, setelah memasukan nomor sampel/scan
     * view -> registrasi -> registerbysampel
     * return collection
     */
    public function registerbysampel($id)
    {
        $selected_pengambilan = PengambilanSampel::where('pen_id',$id)->first(); //cari 
        $selected_sampel = Sampel::where('sam_penid',$selected_pengambilan->pen_id)->get();
       return view('registrasi.registerbysampel')->with(compact('selected_pengambilan','selected_sampel'));
    }

     /**
     * mekanisme scanner rujukan di registrasi, setelah scan lalu klik isi register
     * redirect ke /rujukan/registersampel/{id pengambilan sampel}
     */
    public function scanbarcoderujukan(Request $request){
        $sampel = Sampel::where('sam_barcodenomor_sampel',$request->sam_barcodenomor_sampel)->first(); //cari sampel dengan barcode seperti yang di masukan
        if($sampel){ //apabila ada
        $pen = PengambilanSampel::where('pen_id',$sampel->sam_penid)->first(); //cari id pengambilan dengan id sampel yang didapat
        $register = RegisterPasien::where('reg_penid',$sampel->sam_penid)->first(); //cari id register dengan id pengambilan sampel yang didapat
            if(is_null($pen->pen_noreg)){ //pengecekan apabila di pengambilan sampel sudah tertera nomor registrasi, todo : cek juga dengan yg ada di register (kolom reg_penid)
                return redirect('rujukan/registersampel/'.$sampel->sam_penid); //register ke form pengisian register oleh sampel
            }else {
            notify()->warning('Sampel tersebut telah memiliki informasi pasien !'); //sampel sudah memiliki nomor register
            return redirect('rujukan');
            }
        }else {
            notify()->warning('Nomor sampel tidak ditemukan !'); //sampel tidak ada / kode salah
            return redirect('rujukan');
        }
    }

    /**
     * mekanisme memasukan data register berdasarkan sampel (rujukan)
     * 
     * 
     */
    public function storeregisterbysampel(Request $request)
    {
        $addpasientopen = PengambilanSampel::where('pen_id',$request->pen_id)->first(); //cari pengambilan sampel dengan id yang tercantum
        $addpasientopen->pen_nik = $request->reg_nik; //masukan NIK ke pengambilansampel (tidak harus ada sih)
        $addpasientopen->pen_noreg = $request->reg_no; //masukan nomor register ke pengambilan sampel (harus ada karena dipakai terus sampai validasi)
        $regis = collect($request->all());
   if($request->reg_dinkes_pengirim == "Other"){
       $regis->put('reg_dinkes_pengirim', $request->daerahlain);
     }
   
   if($request->reg_nama_rs == "Other"){
    $regis->put('reg_nama_rs_lainnya', $request->reg_nama_rs_lainnya);
     }
    $regis->put('reg_dateinput',Carbon::now()); //todays date, todo : apabila mengandalkan mysql timestamp dan diset seusai zona indo maka abaikan aja, pakai timestamps saja
    $regis->put('reg_statusreg',2); //pengubahan status register, cek readme untuk detail
    $regis->put('reg_penid',$request->pen_id); 
    $years = Carbon::parse($request->reg_tanggallahir)->diff(Carbon::now())->format('%y tahun %m bulan');
    $regis->put('reg_usia', $years); //masukan usia yg sudah dihitung, kebutuhan pheoc
    $regis->put('reg_userid', Auth::user()->id);

    /*
    * jika pasien sudah pernah rdt, masukan ke tabel rdt pasien
    * Sebenanrya ini hanya untuk dokumentasi saja dan belum terhubung ke fitur RDT yang ada disini karena berbeda, 
    */
    if($request->rar_pernah_rdt == "Ya"){
        $rdt = new RDT;
        $rdt->rar_pernah_rdt = $request->rar_pernah_rdt;
        $rdt->rar_hasil_rdt = $request->rar_hasil_rdt;
        $rdt->rar_tanggal_rdt = $request->rar_tanggal_rdt;
        $rdt->rar_keterangan = $request->rar_keterangan;
        $rdt->create();
    } 
    
    try{
    $addpasientopen->update();
    RegisterPasien::create($regis->all());
    }catch(QE $e){  return $e; } //show db error message
        notify()->success('Register telah sukses ditambahkan !');
        return redirect('rujukan');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registrasi.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

   $regis = collect($request->all());
   if($request->reg_dinkes_pengirim == "Other"){
       $regis->put('reg_dinkes_pengirim', $request->daerahlain);
    }
   if($request->reg_nama_rs == "Other"){
    $regis->put('reg_nama_rs_lainnya', $request->reg_nama_rs_lainnya);
    }

    $regis->put('reg_dateinput',Carbon::now());
    $years = Carbon::parse($request->reg_tanggallahir)->diff(Carbon::now())->format('%y tahun %m bulan');
    $regis->put('reg_usia', $years);
    $regis->put('reg_userid', Auth::user()->id);

    /** 
    * jika pasien sudah pernah rdt, masukan ke tabel rdt pasien
    * Sebenanrya ini hanya untuk dokumentasi saja dan belum terhubung ke fitur RDT yang ada disini karena berbeda, 
    */
    if($request->rar_pernah_rdt == "Ya"){
        $rdt = new RDT;
        $rdt->rar_pernah_rdt = $request->rar_pernah_rdt;
        $rdt->rar_hasil_rdt = $request->rar_hasil_rdt;
        $rdt->rar_tanggal_rdt = $request->rar_tanggal_rdt;
        $rdt->rar_keterangan = $request->rar_keterangan;
        $rdt->save();
    }
    
    try{
    $regis = RegisterPasien::create($regis->all()); //store to the database
    }catch(QE $e){  return $e; } //show db error message

    /** 
    * pengambilan sampel baru karena di form register terdapat nomor sampel yang dimasukan oleh register 
    */
    $newpengambilansampel = new PengambilanSampel;
    $newpengambilansampel->pen_noreg = $regis->reg_no;
    $newpengambilansampel->pen_nik = $regis->reg_nik;
    $newpengambilansampel->save();
    
    /** 
     * bentuk ke array lalu masukin satu satu
     */
    $sampelArray = array();
    $id_pen = $newpengambilansampel->pen_id;
    foreach($request->nomorsampel as $sam){
        $sampel = new Sampel();
        $sampel->sam_penid = $id_pen; //id pengambilannya
        $sampel->sam_noreg = $regis->reg_no; //nomor registernya
        $sampel->sam_barcodenomor_sampel = $sam; //nomor sampelnya
        $sampel->sam_statussam = 1; //abaikan, awalnya dipakai untuk tracing sampel
        $sampel->sam_possam = 1; //abaikan, awalnya dipakai untuk tracing sampel tingkat lanjut
        $sampel->sam_userid = Auth::user()->id;
        $sampel->save();
        array_push($sampelArray,$sampel->sam_id);
    }
    $inserttopensampel = PengambilanSampel::where('pen_id',$id_pen)->first();
    $inserttopensampel->pen_id_sampel = implode(",",$sampelArray);
    $inserttopensampel->pen_userid = Auth::user()->id;
    $inserttopensampel->pen_statuspen = 0;
    /* masukin nomor pengambilan dan status baru ke register  */
    $changestatus = RegisterPasien::where('reg_no',$regis->reg_no)->first();
    $changestatus->reg_statusreg = 2; //lihat readme
    $changestatus->reg_penid = $id_pen;
    try{
        $inserttopensampel->update(); //update pengambilan karena abis masukin sampel 1-1
        $changestatus->update(); //update status baru register
             }catch(QE $e){  return $e; } //show db error message
             
        notify()->success('Register telah sukses ditambahkan !');
        return redirect('registrasi');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reg = RegisterPasien::find($id);
        $reg_rdt = RDT::where('rar_noreg',$reg->reg_no)->first();
    return view('registrasi.show')->with(compact('reg','reg_rdt'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = RegisterPasien::find($id);
        $reg_rdt = RDT::where('rar_noreg',$edit->reg_no)->first();
    return view('registrasi.edit')->with(compact('edit','reg_rdt'));
    }

    /**
     * Update the specified resource in storage.
     * docs same as function above this
     * nomor registrasi tidak terikat ke beberapa model lainnya jadi 
     * kalau NIK diubah dari register setelah stagenya sampai di pemeriksaansampel maka NIK di pemeriksaan sampel ga keganti
     */
    public function updatex(Request $request, $id)
    {
        $olddata = RegisterPasien::find($id);
        $update = collect($request->all());
        if($request->reg_dinkes_pengirim == "Other"){
            $update->put('reg_dinkes_pengirim', $request->daerahlain);
        }
        
   if($request->reg_nama_rs == "Other"){
    $update->put('reg_nama_rs_lainnya', $request->reg_nama_rs_lainnya);
    }
    $years = Carbon::parse($request->reg_tanggallahir)->diff(Carbon::now())->format('%y tahun %m bulan');
    $update->put('reg_usia', $years);
    $update->put('reg_userid', Auth::user()->id);
    if($request->rar_pernah_rdt == "Ya"){
        $rdt_exist = RDT::where('rar_noreg', $olddata->reg_no)->first();
        if(is_null($rdt_exist)){
            $rdt = new RDT;
        }else {
            $rdt = $rdt_exist;
        }
        $rdt->rar_pernah_rdt = $request->rar_pernah_rdt;
        $rdt->rar_hasil_rdt = $request->rar_hasil_rdt;
        $rdt->rar_tanggal_rdt = $request->rar_tanggal_rdt;
        $rdt->rar_keterangan = $request->rar_keterangan;
        if(is_null($rdt_exist)){
       
            $rdt->create();
        }else {
            $rdt->update();
        }
    }
    
    try{
    $olddata->update($update->all());
     }catch(QE $e){  return $e; } //show db error message

     try{
    $add_log = new Logs; //masukan ke log tentang apa yang diubah
    $add_log->log_item = $olddata->regid;
    $add_log->log_user = Auth::user()->id;
    $add_log->log_type = 1; //log type, ubah, delete, dll 
     }catch(QE $e){  return $e; } //show db error message

     notify()->success('Register telah sukses diubah !');
        return redirect('registrasi');
    }


    /**
     * nomor registrasi tidak terikat ke beberapa model lainnya jadi 
     * kalau NIK diubah dari register setelah stagenya sampai di pemeriksaansampel maka NIK di pemeriksaan sampel ga keganti
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $registerdelete = RegisterPasien::find($id);

        try{
            $registerdelete->delete();
        }catch(QE $e){  return $e; } //show db error message

        notify()->success('Register telah sukses dihapus !');
            return redirect('registrasi');
    }

  
}
