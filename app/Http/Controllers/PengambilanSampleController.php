<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sampel;
use App\PengambilanSampel;
use App\RegisterPasien;
use App\GroupSampel;
use Illuminate\Database\QueryException as QE;
use Auth;
use DB;
use Illuminate\Support\Str;
class PengambilanSampleController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $avail_regis = RegisterPasien::where('reg_statusreg','1')->get();
        $not_avail_regis = PengambilanSampel::join('sampel','sampel.sam_penid','=','pengambilansampel.pen_id')
        ->select('pengambilansampel.*','sampel.sam_barcodenomor_sampel')
        ->where('pengambilansampel.pen_statuspen',1)->get();
        $group = $not_avail_regis->groupby('pen_id');
        return view('penerimaan.index')->with(compact('avail_regis','not_avail_regis','group'));
     // return $group;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($noreg)
    {
        $selected_reg = RegisterPasien::where('reg_no',$noreg)->first();
        return view('penerimaan.new')->with(compact('selected_reg'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $insert = collect($request->all());
        $insert->put('pen_userid',Auth::user()->id);
        $sampelArray = array();
        $store = PengambilanSampel::create($insert->all());
        $id_pen = $store->pen_id;
        for($i=0; $i< count($request->sam_jenis_sampel); $i++){
            $sampel = new Sampel();
            $sampel->sam_penid = $id_pen;
            $sampel->sam_noreg = $request->pen_noreg;
            $sampel->sam_jenis_sampel = $request->sam_jenis_sampel[$i];
            $sampel->sam_petugas_pengambil_sampel = $request->petugas_pengambil[$i];
            $sampel->sam_tanggal_sampel = $request->tanggalsampel[$i];
            $sampel->sam_pukul_sampel = $request->pukulsampel[$i];
            $sampel->sam_barcodenomor_sampel = $request->nomorsampel[$i];
            $sampel->sam_statussam = 1;
            $sampel->sam_possam = 1;
            $sampel->sam_userid = Auth::user()->id;
            $sampel->save();
            array_push($sampelArray,$sampel->sam_id);
        }
        $inserttopensampel = PengambilanSampel::where('pen_id',$id_pen)->first();
        $inserttopensampel->pen_id_sampel = implode(",",$sampelArray);
        $inserttopensampel->pen_statuspen = 1;
        $changestatus = RegisterPasien::where('reg_no',$request->pen_noreg)->first();
        $changestatus->reg_statusreg = 2;
        try{
        $inserttopensampel->update();
        $changestatus->update();
             }catch(QE $e){  return $e; } //show db error message


             notify()->success('Status Pengambilan telah sukses ditambahkan !');
                return redirect('pengambilansampel');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show = PengambilanSampel::join('register','register.reg_no', '=','pengambilansampel.pen_noreg')
        ->select('register.reg_nik','register.reg_no','pengambilansampel.*')
        ->where('pengambilansampel.pen_id',$id)->first();
        $sampel = Sampel::where('sam_penid',$show->pen_id)->get();
        return view('penerimaan.show')->with(compact('show','sampel'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $show = PengambilanSampel::where('pengambilansampel.pen_id',$id)->first();
        $sampel = Sampel::where('sam_penid',$id)->get();
        return view('penerimaan.edit')->with(compact('show','sampel'));
       // return $show;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $edit = collect($request->all());
        $sampelArray = array();
        $update = PengambilanSampel::where('pen_id', $request->pen_id)->first();
        $id_pen = $update->pen_id;
        for($i=0; $i< count($request->sam_jenis_sampel); $i++){
            if(isset($request->prev_sam[$i]) ){
            $sampel = Sampel::where('sam_id', $request->prev_sam[$i])->first();
            }else {
            $sampel = new Sampel();
            $sampel->sam_penid = $id_pen;
            $sampel->sam_noreg = $request->pen_noreg;
            $sampel->sam_possam = 1;
            $sampel->sam_userid = Auth::user()->id;
            }
            $sampel->sam_jenis_sampel = $request->sam_jenis_sampel[$i];
            $sampel->sam_petugas_pengambil_sampel = $request->petugas_pengambil[$i];
            $sampel->sam_tanggal_sampel = $request->tanggalsampel[$i];
            $sampel->sam_pukul_sampel = $request->pukulsampel[$i];
            $sampel->sam_barcodenomor_sampel = $request->nomorsampel[$i];
            if(isset($request->prev_sam[$i]) ){
           $sampel->update();
                }else {
            $sampel->save();
                }
            array_push($sampelArray,$sampel->sam_id);
        }
        $edit->put('pen_id_sampel',implode(",",$sampelArray));
        try{
        $update->update($edit->all());
             }catch(QE $e){  return $e; } //show db error message

             notify()->success('Status pengambilan telah sukses diubah !');
                return redirect('pengambilansampel');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $pengembaliandelete = PengambilanSampel::where('pen_id',$id)->first();
        $sampeldelete = Sampel::where('sam_penid',$id)->get();
        $changestatus = RegisterPasien::where('reg_no',$pengembaliandelete->pen_noreg)->first();
        $changestatus->reg_statusreg = 1;
        try{
            $pengembaliandelete->delete();
            foreach($sampeldelete as $del){
                $del->delete();
            }
            $changestatus->update();
        }catch(QE $e){  return $e; } //show db error message
        notify()->success('Status pengambilan telah sukses dihapus !');
            return redirect('pengambilansampel');
    }

    public function apidelete(Request $request)
    {
        $sampeldelete = Sampel::where('sam_id',$request->sam_id)->first();

        try{
            $sampeldelete->delete();
        }catch(QE $e){  return $e; } //show db error message

        return response('Success', 200);
    }

    public function tambahsampelrujukan(){
        return view('penerimaan.tambahsampel');
    }

    public function storesampelrujukan(Request $request){
        $insert = collect($request->all());
        $insert->put('pen_userid',Auth::user()->id);
        $sampelArray = array();
        $store = PengambilanSampel::create($insert->all());
        $id_pen = $store->pen_id;
        for($i=0; $i< count($request->sam_jenis_sampel); $i++){
            $sampel = new Sampel();
            $sampel->sam_penid = $id_pen;
            $sampel->sam_noreg = $request->pen_noreg;
            $sampel->sam_jenis_sampel = $request->sam_jenis_sampel[$i];
            $sampel->sam_petugas_pengambil_sampel = $request->petugas_pengambil[$i];
            $sampel->sam_tanggal_sampel = $request->tanggalsampel[$i];
            $sampel->sam_pukul_sampel = $request->pukulsampel[$i];
            $sampel->sam_barcodenomor_sampel = $request->nomorsampel[$i];
            $sampel->sam_statussam = 0;
            $sampel->sam_userid = Auth::user()->id;
            $sampel->save();
            array_push($sampelArray,$sampel->sam_id);
        }
        $inserttopensampel = PengambilanSampel::where('pen_id',$id_pen)->first();
        $inserttopensampel->pen_id_sampel = implode(",",$sampelArray);
        $inserttopensampel->pen_statuspen = 1;
        $inserttogroup = new GroupSampel;
        $inserttogroup->group_sampel_id = $store->pen_id;
        
        try{
        $inserttopensampel->update();
        $inserttogroup->save();
             }catch(QE $e){  return $e; } //show db error message


             notify()->success('Status Pengambilan telah sukses ditambahkan !');
                return redirect('pengambilansampel');
    
    }
}
