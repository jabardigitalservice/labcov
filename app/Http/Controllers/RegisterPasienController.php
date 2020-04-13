<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RegisterPasien;
use App\HistoryPerawatan;
use App\KontakPasien;
use App\KunjunganPergi;
use App\RDT;
use App\PengambilanSampel;
use App\GroupSampel;
use App\Sampel;
use Carbon\Carbon;
use App\Logs;
use Auth;
use App\Imports\RegisterImport;
use Illuminate\Database\QueryException as QE;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;

class RegisterPasienController extends Controller
{
       
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reg = RegisterPasien::get();
        return view('registrasi.index')->with(compact('reg'));
    }

    public function rujukan()
    {
        $belum_reg = GroupSampel::join('pengambilansampel','pengambilansampel.pen_id','=','groupsampel.group_sampel_id')
        ->join('sampel','sampel.sam_penid','=','pengambilansampel.pen_id')
        ->select('sampel.sam_barcodenomor_sampel','pengambilansampel.pen_id','groupsampel.*')
        ->whereNull('pengambilansampel.pen_noreg')->get();
        $group = $belum_reg->groupby('group_sampel_id' );
       return view('registrasi.rujukan')->with(compact('group'));
       // return $group;
    }

    public function registerbysampel($id)
    {
        $selected_pengambilan = PengambilanSampel::where('pen_id',$id)->first();
        $selected_sampel = Sampel::where('sam_penid',$selected_pengambilan->pen_id)->get();
       return view('registrasi.registerbysampel')->with(compact('selected_pengambilan','selected_sampel'));
       // return $group;
    }

    public function storeregisterbysampel(Request $request)
    {
        $addpasientopen = PengambilanSampel::where('pen_id',$request->pen_id)->first();
        $addpasientopen->pen_nik = $request->reg_nik;
        $addpasientopen->pen_noreg = $request->reg_no;
        $regis = collect($request->all());
   if($request->reg_dinkes_pengirim == "Other"){
       $regis->put('reg_dinkes_pengirim', $request->daerahlain);
   }
   
   if($request->reg_nama_rs == "Other"){
    $regis->put('reg_nama_rs_lainnya', $request->reg_nama_rs_lainnya);
}
if($request->reg_jenisidentitas == "KTP"){
    $regis->put('reg_nik', $request->reg_nik);
    $regis->put('reg_jenisidentitas', "KTP");
}elseif($request->reg_jenisidentitas == "SIM"){
    $regis->put('reg_nosim', $request->reg_nosim);
    $regis->put('reg_jenisidentitas', "SIM");
}
    $regis->put('reg_dateinput',Carbon::now());
    $years = Carbon::parse($request->reg_tanggallahir)->diff(Carbon::now())->format('%y tahun %m bulan');
    $regis->put('reg_usia', $years);
    $regis->put('reg_userid', Auth::user()->id);
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
if($request->reg_jenisidentitas == "KTP"){
    $regis->put('reg_nik', $request->reg_nik);
    $regis->put('reg_jenisidentitas', "KTP");
}elseif($request->reg_jenisidentitas == "SIM"){
    $regis->put('reg_nosim', $request->reg_nosim);
    $regis->put('reg_jenisidentitas', "SIM");
}

    $regis->put('reg_dateinput',Carbon::now());
    $years = Carbon::parse($request->reg_tanggallahir)->diff(Carbon::now())->format('%y tahun %m bulan');
    $regis->put('reg_usia', $years);
    $regis->put('reg_userid', Auth::user()->id);
    if($request->rar_pernah_rdt == "Ya"){
        $rdt = new RDT;
        $rdt->rar_pernah_rdt = $request->rar_pernah_rdt;
        $rdt->rar_hasil_rdt = $request->rar_hasil_rdt;
        $rdt->rar_tanggal_rdt = $request->rar_tanggal_rdt;
        $rdt->rar_keterangan = $request->rar_keterangan;
        $rdt->create();
    }
    
    try{
    RegisterPasien::create($regis->all());
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
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
if($request->reg_jenisidentitas == "KTP"){
    $update->put('reg_nik', $request->reg_nik);
    $update->put('reg_jenisidentitas', "KTP");
}elseif($request->reg_jenisidentitas == "SIM"){
    $update->put('reg_nosim', $request->reg_nosim);
    $update->put('reg_jenisidentitas', "SIM");
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
    $add_log = new Logs;
    $add_log->log_item = $olddata->regid;
    $add_log->log_user = Auth::user()->id;
    $add_log->log_type = 1;
     }catch(QE $e){  return $e; } //show db error message

     notify()->success('Register telah sukses diubah !');
        return redirect('registrasi');
    }


    /**
     * Remove the specified resource from storage.
     *
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

    public function scanbarcoderujukan(Request $request){
        $sampel = Sampel::where('sam_barcodenomor_sampel',$request->sam_barcodenomor_sampel)->first();
    
        return redirect('rujukan/registersampel/'.$sampel->sam_penid);

    }
}
