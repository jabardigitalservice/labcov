<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RegisterPasien;
use App\HistoryPerawatan;
use App\KontakPasien;
use App\KunjunganPergi;
use Carbon\Carbon;
use App\Logs;
use Auth;
use Illuminate\Database\QueryException as QE;

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
        // INSERT REGISTRASI PER DAERAH //
        $regis = collect($request->all());
        if($request->reg_dinkes_pengirim == "Other"){
            $regis->put('reg_dinkes_pengirim', $request->daerahlain);
        }
        $regis->put('reg_usia', $request->usiatahun." Tahun ".$request->usiabulan." Bulan");

        // INSERT RAWAT //
        $hisvisit = array();
        if(!empty($request->tanggalrawat) || !is_null($request->tanggalrawat)){
            for($i = 0; $i<count($request->tanggalrawat); $i++){
                $hp = new HistoryPerawatan;
                $hp->his_regid = $request->reg_no;
                $hp->his_tanggalrawat = $request->tahunrawat[$i]."-".$request->bulanrawat[$i]."-".$request->tanggalrawat[$i];
                $hp->his_rsfasyankes = $request->tempatrawat[$i];
                try{
                    $hp->save();
                   array_push($hisvisit,$hp->hisid);
                 }catch(QE $e){  return $e; } //show db error message
            }
        }
            // INSERT PERJALANAN //
            $kunvisit = array();
            if(!empty($request->tanggalkeluarnegri) || !is_null($request->tanggalkeluarnegri)){
                for($i = 0; $i<count($request->tanggalkeluarnegri); $i++){
                    $kp = new KunjunganPergi();
                    $kp->kun_regid = $request->reg_no;
                    $kp->kun_tanggalkunjungan = $request->tahunkeluarnegri[$i]."-".$request->bulankeluarnegri[$i]."-".$request->tanggalkeluarnegri[$i];
                    $kp->kun_kotakunjungan = $request->kota[$i];
                    $kp->kun_negarakunjungan = $request->negara[$i];
                    try{
                    $kp->save();
                    array_push($kunvisit,$kp->kunid);
                     }catch(QE $e){  return $e; } //show db error message
                }
            }

              // INSERT PERJALANAN//
              $konvisit = array();
              if(!empty($request->namakontak) || !is_null($request->namakontak)){

                for($i = 0; $i<count($request->namakontak); $i++){
                    $q = new KontakPasien();
                    $q->kon_regid = $request->reg_no;
                    $q->kon_tanggalkon= $request->tanggalkontak[$i];
                    $q->kon_namakon = $request->namakontak[$i];
                    $q->kon_alamatkon = $request->alamatkontak[$i];
                    $q->kon_hubungankon = $request->hubungankontak[$i];
                    try{
                    $q->save();
                    array_push($konvisit,$q->konid);
                     }catch(QE $e){  return $e; } //show db error message
                }

            }
$regis->put('reg_history_visit', implode(",",$hisvisit));
$regis->put('reg_kunjunganluarnegri', implode(",",$kunvisit));
$regis->put('reg_kontakterakhir', implode(",",$konvisit));
$regis->put('reg_userid', Auth::user()->id);
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
        $historyperawatan = HistoryPerawatan::whereIn('hisid',explode(',',$reg->reg_history_visit))->get();
        $historykunjungan = KunjunganPergi::whereIn('kunid',explode(',',$reg->reg_kunjunganluarnegri))->get();
        $historykontak = KontakPasien::whereIn('konid',explode(',',$reg->reg_kontakterakhir))->get();

    return view('registrasi.show')->with(compact('reg','historyperawatan','historykunjungan','historykontak'));
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
        $historyperawatan = HistoryPerawatan::whereIn('hisid',explode(',',$edit->reg_history_visit))->get();
        $historykunjungan = KunjunganPergi::whereIn('kunid',explode(',',$edit->reg_kunjunganluarnegri))->get();
        $historykontak = KontakPasien::whereIn('konid',explode(',',$edit->reg_kontakterakhir))->get();
    return view('registrasi.edit')->with(compact('edit','historyperawatan','historykunjungan','historykontak'));
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
        $update->put('reg_usia', $request->usiatahun." Tahun ".$request->usiabulan." Bulan");

        // INSERT RAWAT //
        $hisvisit = array();
        $new_rawat = explode(",", $olddata->reg_history_visit);
        if(!empty($request->tanggalrawat) || !is_null($request->tanggalrawat)){
            for($i = 0; $i<count($request->tanggalrawat); $i++){
                $history_perawatan = new HistoryPerawatan;
                $history_perawatan->his_regid = $request->reg_no;
                $history_perawatan->his_tanggalrawat = $request->tahunrawat[$i]."-".$request->bulanrawat[$i]."-".$request->tanggalrawat[$i];
                $history_perawatan->his_rsfasyankes = $request->tempatrawat[$i];
                try{
                    $history_perawatan->save();
                   array_push($hisvisit,$history_perawatan->hisid);
                 }catch(QE $e){  return $e; } //show db error message
            }
        }
        if(!is_null($request->hapushis) || !empty($request->hapushis)){
       $new_rawat = array_diff($new_rawat,$request->hapushis);
          }
        foreach($hisvisit as $historybaru){
            array_push($new_rawat, $historybaru);
        }

            // INSERT PERJALANAN//
            $kunvisit = array();
        $new_kunjungan = explode(",",$olddata->reg_kunjunganluarnegri);
           if(!empty($request->tanggalkeluarnegri) || !is_null($request->tanggalkeluarnegri)){
                for($i = 0; $i<count($request->tanggalkeluarnegri); $i++){
                    $kunjungan_pergi = new KunjunganPergi();
                    $kunjungan_pergi->kun_regid = $request->reg_no;
                    $kunjungan_pergi->kun_tanggalkunjungan = $request->tahunkeluarnegri[$i]."-".$request->bulankeluarnegri[$i]."-".$request->tanggalkeluarnegri[$i];
                    $kunjungan_pergi->kun_kotakunjungan = $request->kota[$i];
                    $kunjungan_pergi->kun_negarakunjungan = $request->negara[$i];
                    try{
                    $kunjungan_pergi->save();
                    array_push($kunvisit,$kunjungan_pergi->kunid);
                     }catch(QE $e){  return $e; } //show db error message
                }
              }
              if(!is_null($request->hapuskun) || !empty($request->hapuskun)){
           $new_kunjungan =  array_diff($new_kunjungan, $request->hapuskun);
               }
            foreach($kunvisit as $kunjunganbaru){
                array_push($new_kunjungan, $kunjunganbaru);
            }

              // INSERT PERJALANAN//
              $konvisit = array();
              $new_kontak = explode(",",$olddata->reg_kontakterakhir);
              if(!empty($request->namakontak) || !is_null($request->namakontak)){

                for($i = 0; $i<count($request->namakontak); $i++){
                    $kontak_pasien = new KontakPasien();
                    $kontak_pasien->kon_regid = $request->reg_no;
                    $kontak_pasien->kon_tanggalkon= $request->tanggalkontak[$i];
                    $kontak_pasien->kon_namakon = $request->namakontak[$i];
                    $kontak_pasien->kon_alamatkon = $request->alamatkontak[$i];
                    $kontak_pasien->kon_hubungankon = $request->hubungankontak[$i];
                    try{
                    $kontak_pasien->save();
                    array_push($konvisit,$kontak_pasien->konid);
                     }catch(QE $e){  return $e; } //show db error message
                }
         }
         if(!is_null($request->hapuskon) || !empty($request->hapuskon)){
           $new_kontak =  array_diff($new_kontak, $request->hapuskon);
         }
            foreach($konvisit as $kontakbaru){
                array_push($new_kontak, $kontakbaru);
            }


$update->put('reg_history_visit', implode(",",$new_rawat));
$update->put('reg_kunjunganluarnegri', implode(",",$new_kunjungan));
$update->put('reg_kontakterakhir', implode(",",$new_kontak));
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

    public function import(Request $request){

    }
}
