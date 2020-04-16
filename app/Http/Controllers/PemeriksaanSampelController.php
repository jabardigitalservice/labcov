<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

class PemeriksaanSampelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $avail_pem = Ekstraksi::join('sampel','sampel.sam_id','=','ekstraksisampel.eks_samid')
        ->join('pengambilansampel','pengambilansampel.pen_id','=','ekstraksisampel.eks_penid')
        ->select('ekstraksisampel.*','sampel.sam_barcodenomor_sampel','sampel.sam_jenis_sampel','sampel.sam_namadiluarjenis','pengambilansampel.pen_nomor_ekstraksi')
        ->where('ekstraksisampel.eks_status',1)
        ->orderBy('pengambilansampel.pen_nomor_ekstraksi','ASC')->get();
       $not_avail_pem = PemeriksaanSampel::join('sampel','sampel.sam_id','=','pemeriksaansampel.pem_samid')
        ->join('ekstraksisampel','ekstraksisampel.eks_id','=','pemeriksaansampel.pem_eksid')
        ->select('pemeriksaansampel.*','ekstraksisampel.eks_status','sampel.sam_id','sampel.sam_barcodenomor_sampel','sampel.sam_jenis_sampel','sampel.sam_namadiluarjenis')
       ->where('ekstraksisampel.eks_status',2)->get();
       return view('pemeriksaan.index')->with(compact('avail_pem','not_avail_pem'));
       //return $not_avail_pem;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $periksa = Ekstraksi::join('sampel','sampel.sam_id','=','ekstraksisampel.eks_samid')
        ->join('pengambilansampel','pengambilansampel.pen_id','=','ekstraksisampel.eks_penid')
        ->select('ekstraksisampel.*','sampel.sam_id','sampel.sam_barcodenomor_sampel','sampel.sam_jenis_sampel','sampel.sam_namadiluarjenis','pengambilansampel.pen_nomor_ekstraksi','pengambilansampel.pen_id')
        ->where('ekstraksisampel.eks_id',$id)->first();
        return view('pemeriksaan.new')->with(compact('periksa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store = collect($request->all());
        $changepenstatus = PengambilanSampel::where('pen_id',$request->pem_penid)->first();
        $changepenstatus->pen_statuspen = 3;
        $changeeksstatus = Ekstraksi::where('eks_id',$request->pem_eksid)->first();
        $changeeksstatus->eks_status = 2;
        $changestatusam = Sampel::where('sam_id',$request->pem_samid)->first();
        $changestatusam->sam_statussam = 3;

        if(!is_null($changepenstatus->pen_noreg)){
            $changeregstatus = RegisterPasien::where('reg_no',$changepenstatus->pen_noreg)->first();
            $changeregstatus->reg_statusreg = 4;
            $changeregstatus->update();
          }

        if ($request->file('grafik') == '') {
            $store->put('pem_grafik', 'img/tidak-ada-grafik.jpg');
        } else {
            $file = $request->file('grafik');
            $fileArray = ['image' => $file];
            $rules = ['image' => 'mimes:jpeg,jpg,png,gif|required|max:1000000'];
            $validator = Validator::make($fileArray, $rules);
            if ($validator->fails()) {
                // Redirect or return json to frontend with a helpful message to inform the user
                // that the provided file was not an adequate type

               notify()->warning('File yang anda unggah bukan sebuah file gambar');

                return redirect()->back();
            } else {
                // Store the File Now
                // read image from temporary file
                $filethumb = time().'Grafik_'.$request->pem_penid.'_'.$file->getClientOriginalName();
                Image::make($file)->save('grafik/'.$filethumb);
                $store->put('pem_grafik', 'grafik/'.$filethumb);
            }
        }

        try{
            PemeriksaanSampel::create($store->all());
            $changepenstatus->update();
            $changeeksstatus->update();
            $changestatusam->update();
            
                  }catch(QE $e){  return $e; } //show db error message
                  
              notify()->success('Pemeriksaan rRT-PCR telah sukses ditambahkan !');
           return redirect('pemeriksaansampel');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show = PemeriksaanSampel::join('sampel','sampel.sam_id','=','pemeriksaansampel.pem_samid')
        ->join('pengambilansampel','pengambilansampel.pen_id','=','pemeriksaansampel.pem_penid')
        ->join('ekstraksisampel','ekstraksisampel.eks_id','=','pemeriksaansampel.pem_eksid')
        ->select('pemeriksaansampel.*','ekstraksisampel.eks_operator_ekstraksi',
        'ekstraksisampel.eks_tanggal_mulai_ekstraksi',
        'ekstraksisampel.eks_metode_ekstraksi',
        'ekstraksisampel.eks_nama_kit_ekstraksi',
        'ekstraksisampel.eks_jam_mulai_ekstraksi',
        'sampel.sam_id','sampel.sam_barcodenomor_sampel','sampel.sam_jenis_sampel','sampel.sam_namadiluarjenis','pengambilansampel.pen_nomor_ekstraksi')
        ->where('pemeriksaansampel.pem_id',$id)->first();
        $notes = Notes::where('note_item_id',$show->pem_id)->where('note_item_type',2)->orderBy('created_at','desc')->get(); //notesnya blom dimunculin
        return view('pemeriksaan.show')->with(compact('show','notes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = PemeriksaanSampel::join('sampel','sampel.sam_id','=','pemeriksaansampel.pem_samid')
        ->join('pengambilansampel','pengambilansampel.pen_id','=','pemeriksaansampel.pem_penid')
        ->join('ekstraksisampel','ekstraksisampel.eks_id','=','pemeriksaansampel.pem_eksid')
        ->select('pemeriksaansampel.*','ekstraksisampel.eks_operator_ekstraksi',
        'ekstraksisampel.eks_tanggal_mulai_ekstraksi',
        'ekstraksisampel.eks_metode_ekstraksi',
        'ekstraksisampel.eks_nama_kit_ekstraksi',
        'ekstraksisampel.eks_jam_mulai_ekstraksi',
        'sampel.sam_id','sampel.sam_barcodenomor_sampel','sampel.sam_jenis_sampel','sampel.sam_namadiluarjenis','pengambilansampel.pen_nomor_ekstraksi')
        ->where('pemeriksaansampel.pem_id',$id)->first();

        return view('pemeriksaan.edit')->with(compact('edit'));
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
        $update = PemeriksaanSampel::where('pem_id',$request->pem_id)->first();
        $insert = collect($request->all());

        $notes = new Notes;
        $notes->note_isi = $request->note_isi."<br> Pengubahan Hasil Pemeriksaan ID : ".$request->pem_id." Pada ".Carbon::now();
        $notes->note_item_id  = $request->note_item_id;
        $notes->note_item_type = $request->note_item_type;
        $notes->note_userid  = $request->note_userid;

        if ($request->file('grafik') == '') {
        } else {
            $file = $request->file('grafik');
            $fileArray = ['image' => $file];
            $rules = ['image' => 'mimes:jpeg,jpg,png,gif|required|max:1000000'];
            $validator = Validator::make($fileArray, $rules);
            if ($validator->fails()) {
                // Redirect or return json to frontend with a helpful message to inform the user
                // that the provided file was not an adequate type

               notify()->warning('File yang anda unggah bukan sebuah file gambar');

                return redirect()->back();
            } else {
                // Store the File Now
                // read image from temporary file
                $filethumb = time().'Grafik_'.$request->pem_penid.'_'.$file->getClientOriginalName();
                Image::make($file)->save('grafik/'.$filethumb);
                $insert->put('pem_grafik', 'grafik/'.$filethumb);
            }
        }


     try{
          $update->update($insert->all());
          $notes->save();
                }catch(QE $e){  return $e; } //show db error message
                 
       notify()->success('Pemeriksaan Sampel telah sukses diubah !');
         return redirect('pemeriksaansampel');
       // return $request->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function return($id){
        $eksreturn = Ekstraksi::find($id)
        ->join('sampel','sampel.sam_id','=','ekstraksisampel.eks_samid')
        ->join('pengambilansampel','pengambilansampel.pen_id','=','ekstraksisampel.eks_penid')
        ->select('ekstraksisampel.*','sampel.sam_barcodenomor_sampel','sampel.sam_jenis_sampel','sampel.sam_namadiluarjenis','pengambilansampel.pen_nomor_ekstraksi')
        ->first();
        $pem = PemeriksaanSampel::where('pem_eksid',$id)->first();
        return view('pemeriksaan.pengembalian')->with(compact('eksreturn','pem'));
    }

    public function returnupdate(Request $request){
        $pemreturn = Ekstraksi::where('eks_id',$request->eks_id)->first();
        $pemreturn->eks_status = 99;
        $changepenstatus = PengambilanSampel::where('pen_id',$pemreturn->eks_penid)->first();
        $changepenstatus->pen_statuspen = 2;
        $changestatusam = Sampel::where('sam_id',$pemreturn->eks_samid)->first();
        $changestatusam->sam_statussam = 2;
        
        $pemdelete = PemeriksaanSampel::where('pem_id',$request->pemid)->first();
        if($pemdelete){
            $pemdelete->delete();
        }

        $notes = new Notes;
        $notes->note_isi = $request->note_isi."<br> Permintaan pengembalian sampel #".$changestatusam->sam_barcodenomor_sampel." pada ".Carbon::now();
        $notes->note_item_id  = $request->note_item_id;
        $notes->note_item_type = 11;
        $notes->note_userid  = $request->note_userid;

        try{
            $pemreturn->update();
            $changepenstatus->update();
            $changestatusam->update();
            $notes->save();
                  }catch(QE $e){  return $e; } //show db error message
                   
         notify()->success('Sampel telah dikembalikan ke Lab Ekstraksi !');
           return redirect('pemeriksaansampel');
         // return $request->all();
    }
}
