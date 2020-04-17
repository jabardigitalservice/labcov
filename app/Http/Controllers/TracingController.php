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
use App\Validasi;
class TracingController extends Controller
{
    public function pagetracing(){
        return view('pelacakan');
    }
    public function tracingregister(Request $request){
        $register = RegisterPasien::where('reg_no',$request->nomor_registrasi)->first();
        if(!is_null($register)){
            $pengambilansampel = PengambilanSampel::where('pen_noreg',$register->reg_no)->first();
            $sampel = Sampel::where('sam_penid',$register->eks_penid)->get();
            if($pengambilansampel){
                $ekstraksisampel = Ekstraksi::where('eks_penid',$pengambilansampel->pen_id)->first();
                if($ekstraksisampel){
                    $pemeriksaansampel = PemeriksaanSampel::where('pem_eksid',$pengambilansampel->eks_id)->first();
                    if($pemeriksaansampel){
                        $validasi = Validasi::where('val_pemid',$pemeriksaansampel->pem_id)->first();
                    }
                }
            }
            return view('pelacakanregister')->with(compact('register','sampel','pengambilansampel','ekstraksisampel','pemeriksaansampel','validasi'));
        }else {
            notify()->warning('Nomor register tidak ditemukan!');
            return redirect()->back();
        }
      
        
        //return $register;


    }

    public function tracingsampel(Request $request){
        $sampel = Sampel::where('sam_barcodenomor_sampel',$request->nomor_sampel)->first();
        if(!is_null($sampel)){
            $pengambilansampel = PengambilanSampel::where('pen_id',$sampel->sam_penid)->first();
            if($pengambilansampel){
                $ekstraksisampel = Ekstraksi::where('eks_penid',$pengambilansampel->pen_id)->first();
                if($ekstraksisampel){
                    $pemeriksaansampel = PemeriksaanSampel::where('pem_eksid',$ekstraksisampel->eks_id)->first();
                    if($pemeriksaansampel){
                        $validasi =   Validasi::where('val_pemid',$pemeriksaansampel->pem_id)->first();
                    }
                }
            }
        return view('pelacakansampel')->with(compact('pengambilansampel','sampel','pemeriksaansampel','ekstraksisampel','validasi'));

        }else {
            notify()->warning('Nomor sampel tidak ditemukan!');
            return redirect()->back();
        }

       
    }
}
