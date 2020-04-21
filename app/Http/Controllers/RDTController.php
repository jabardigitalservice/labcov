<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PencatatanRapid;
use App\PengambilanSampel;
use App\Sampel;
use Auth;
use App\RegisterPasien;
use App\Notes;

class RDTController extends Controller
{
    public function index(){
        $arr = array();
        $avail_pen = PengambilanSampel::where('pen_statuspen', 1)->where('pen_rdt', 1)->orderBy('pen_nomor_ekstraksi','ASC')->get();
        $sampelsudahdites = PencatatanRapid::pluck('rapid_sampel_id')->all();
        foreach($avail_pen as $a){
        $sampelarray = array();
           foreach(explode(",",$a->pen_id_sampel) as $b){
            $sampel = Sampel::where('sam_id',$b)->whereNotIn('sam_id',$sampelsudahdites)->first();
            if(!is_null($sampel)){
               array_push($sampelarray, $sampel->sam_barcodenomor_sampel);
            }
           }
          array_push($arr,implode(",",$sampelarray));
        }

        $not_avail_pen = PencatatanRapid::join('sampel','sampel.sam_id','=','pencatatanrapid.rapid_sampel_id')
        ->join('pengambilansampel','pengambilansampel.pen_id','=','pencatatanrapid.rapid_penid')
        ->select('pencatatanrapid.*','sampel.sam_penid','sampel.sam_jenis_sampel','sampel.sam_barcodenomor_sampel','pengambilansampel.pen_noreg','pengambilansampel.pen_nik')
        ->get();

        return view('rdt.index')->with(compact('avail_pen','not_avail_pen','arr'));
        //return $arr;
    }

    public function create($pen_id)
    {
        $selected = PengambilanSampel::where('pen_id',$pen_id)->first();
        $sampelsudahdites = PencatatanRapid::pluck('rapid_sampel_id')->all();
        $selected_sampel = Sampel::where('sam_penid',$pen_id)->whereNotIn('sam_id',$sampelsudahdites)->get();
        return view('rdt.new')->with(compact('selected','selected_sampel'));
    }

    public function store(Request $request){
        $store = collect($request->all());
        $changestatusam = Sampel::where('sam_id',$request->rapid_sampel_id)->first();
        if($request->jenispemeriksaan == 1){
            $store->put('rapid_igg_1',$request->hasiltest);

        }else if($request->rapid_jenistes == 2){
            $store->put('rapid_igm_1',$request->hasiltest);
        }else if($request->rapid_jenistes == 3){
            $store->put('rapid_igg_igm_1',$request->hasiltest);

        }else if($request->rapid_jenistes == 4){
            $store->put('rapid_antigen_1',$request->hasiltest);
        }
        $store->put('rapid_status',2);
        $store->put('rapid_userid',Auth::user()->id);

        $store->put('jenis_sampel_rdt_1',$changestatusam->sam_jenis_sampel);
        $changepenstatus = PengambilanSampel::where('pen_id',$request->rapid_penid)->first();

       // $changepenstatus->pen_statuspen = 3;
        //$changepenstatus->update();
      
        $changestatusam->sam_statussam = 3;

        if(!is_null($changepenstatus->pen_noreg)){
            $changeregstatus = RegisterPasien::where('reg_no',$changepenstatus->rapid_noreg)->first();
            $changeregstatus->reg_statusreg = 4;
            $changeregstatus->update();
          }

        try{
            PencatatanRapid::create($store->all());
            $changepenstatus->update();
            $changestatusam->update();
            
                  }catch(QE $e){  return $e; } //show db error message
                  
              notify()->success('Pemeriksaan RDT telah sukses ditambahkan !');
           return redirect('pemeriksaanrdt');
    }

    public function edit($id){

        $selected = PencatatanRapid::join('pengambilansampel','pengambilansampel.pen_id','pencatatanrapid.rapid_penid')
        ->select('pencatatanrapid.*','pengambilansampel.pen_id','pengambilansampel.pen_noreg','pengambilansampel.pen_nik','pengambilansampel.pen_nomor_ekstraksi')
        ->where('rapid_id',$id)->first();
        $selected_sampel = Sampel::where('sam_id',$selected->rapid_sampel_id)->first();

        return view('rdt.edit')->with(compact('selected','selected_sampel'));
    }

    public function update(Request $request){
        $edit = PencatatanRapid::where('rapid_id',$request->rapid_id)->first();
        $update = collect($request->all());
       
        if($request->rapid_jenistes == 1){
            $update->put('rapid_igg_1',$request->hasiltest);

        }else if($request->rapid_jenistes == 2){
            $update->put('rapid_igm_1',$request->hasiltest);
        }else if($request->rapid_jenistes == 3){
            $update->put('rapid_igg_igm_1',$request->hasiltest);

        }else if($request->rapid_jenistes == 4){
            $update->put('rapid_antigen_1',$request->hasiltest);
        }
        $update->put('rapid_status',2);
        $update->put('rapid_userid',Auth::user()->id);

        $changepenstatus = PengambilanSampel::where('pen_id',$request->rapid_penid)->first();

       // $changepenstatus->pen_statuspen = 3;
        //$changepenstatus->update();

        if(!is_null($changepenstatus->pen_noreg)){
            $changeregstatus = RegisterPasien::where('reg_no',$changepenstatus->pen_noreg)->first();
            $changeregstatus->reg_statusreg = 4;
            $changeregstatus->update();
          }

          $notes = new Notes;
          $notes->note_isi = $request->note_isi;
          $notes->note_item_id  = $request->note_item_id;
          $notes->note_item_type = 4;
          $notes->note_userid  = Auth::user()->id;

        try{
          $edit->update($update->all());
            $changepenstatus->update();
            $notes->save();
            
                  }catch(QE $e){  return $e; } //show db error message
                  
              notify()->success('Pemeriksaan RDT telah sukses ditambahkan !');
           return redirect('pemeriksaanrdt');

    }

    public function show($id){
        $show = PencatatanRapid::join('pengambilansampel','pengambilansampel.pen_id','pencatatanrapid.rapid_penid')
        ->join('sampel','sampel.sam_id','=','pencatatanrapid.rapid_sampel_id')
        ->select('pencatatanrapid.*','sampel.sam_id','sampel.sam_barcodenomor_sampel','sampel.sam_jenis_sampel','sampel.sam_tanggal_sampel','pengambilansampel.pen_id','pengambilansampel.pen_noreg','pengambilansampel.pen_nik','pengambilansampel.pen_nomor_ekstraksi')
        ->where('pencatatanrapid.rapid_id',$id)->first();
        $notes = Notes::where('note_item_id',$show->rapid_id)->where('note_item_type',4)->orderBy('created_at','desc')->get();
        return view('rdt.show')->with(compact('show','notes'));
    }

    public function periksakembali($id){

    }

    public function kirimulang(Request $request){

    }


}
