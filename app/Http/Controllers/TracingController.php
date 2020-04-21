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
use App\PencatatanRapid;
class TracingController extends Controller
{
    public function pagetracing(){
        return view('pelacakan');
    }
    public function tracingregister(Request $request){
        $register = RegisterPasien::where('reg_no',$request->nomor_registrasi)->first();
        if(!is_null($register)){
            $pengambilansampel = PengambilanSampel::where('pen_noreg',$register->reg_no)->first();
            $sampel = Sampel::where('sam_penid',$register->reg_penid)->get();
            $sampelrdt =  Sampel::where('sam_penid',$register->reg_penid)->pluck('sam_id');
            $pemeriksaanrdt = PencatatanRapid::where('rapid_penid',$pengambilansampel->pen_id)->get();
            $validasirdt = Validasi::join('pencatatanrapid','pencatatanrapid.rapid_id','=','validasi.val_pemid')
            ->select('validasi.*','pencatatanrapid.*')
            ->whereIn('validasi.val_samid',$sampelrdt->all())->where('validasi.val_is_rapid',1)->get();
            if($pengambilansampel){
                $ekstraksisampel = Ekstraksi::join('sampel','sampel.sam_id','=','ekstraksisampel.eks_samid')
                ->select('ekstraksisampel.*','sampel.sam_id','sam_barcodenomor_sampel')
                ->where('ekstraksisampel.eks_penid',$pengambilansampel->pen_id)->first();
                if($ekstraksisampel){
                    $pemeriksaansampel = PemeriksaanSampel::where('pem_eksid',$ekstraksisampel->eks_id)->first();
                    if($pemeriksaansampel){
                        $validasi = Validasi::where('val_pemid',$pemeriksaansampel->pem_id)->first();
                        
                    }
                }
            }
            return view('pelacakanregister')->with(compact('register','sampel','pengambilansampel','ekstraksisampel','pemeriksaansampel','validasi','validasirdt'));
        }else {
            notify()->warning('Nomor register tidak ditemukan!');
            return redirect()->back();
        }
      
        
        //return $register;


    }

    public function tracingsampel(Request $request){
        $sampel = Sampel::where('sam_barcodenomor_sampel',$request->nomor_sampel)->first();
        $pemeriksaanrdt = PencatatanRapid::where('rapid_sampel_id',$sampel->sam_id)->first();
        $validasirdt = Validasi::join('pencatatanrapid','pencatatanrapid.rapid_id','=','validasi.val_pemid')
        ->select('validasi.*','pencatatanrapid.*')->where('val_samid',$sampel->sam_id)->where('validasi.val_is_rapid',1)->first();
        if(!is_null($sampel)){
            $pengambilansampel = PengambilanSampel::where('pen_id',$sampel->sam_penid)->first();
            if($pengambilansampel){
                $ekstraksisampel = Ekstraksi::where('eks_penid',$pengambilansampel->pen_id)
                ->where('eks_samid',$sampel->sam_id)->first();
                if($ekstraksisampel){
                    $pemeriksaansampel = PemeriksaanSampel::where('pem_eksid',$ekstraksisampel->eks_id)->first();
                    if($pemeriksaansampel){
                        $validasi =   Validasi::where('val_pemid',$pemeriksaansampel->pem_id)->first();
                    }elseif($pemeriksaanrdt){
                        $validasi =   Validasi::where('val_rapid',$pemeriksaanrdt->rapid_id)->first();
                    }
                }
            }
        return view('pelacakansampel')->with(compact('pengambilansampel','sampel','pemeriksaansampel','ekstraksisampel','validasi','pemeriksaanrdt','validasirdt'));

        }else {
            notify()->warning('Nomor sampel tidak ditemukan!');
            return redirect()->back();
        }

       
    }
}
