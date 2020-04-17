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

class TracingController extends Controller
{
    public function pagetracing(){
        return view('pelacakan');
    }
    public function tracingregister(Request $request){
        $register = RegisterPasien::join('pengambilansampel','pengambilansampel.pen_noreg','=','register.reg_no')
        ->join('ekstraksisampel','ekstraksisampel.eks_penid','=','pengambilansampel.pen_id')
        ->join('pemeriksaansampel','pemeriksaansampel.pem_eksid','=','ekstraksisampel.eks_id')
        ->join('validasi','validasi.val_pemid','=','pemeriksaansampel.pem_id')
        ->select('register.*','validasi.val_status','pemeriksaansampel.*','ekstraksisampel.*')
        ->where('reg_no',$request->nomor_registrasi)->first();
        $sampel = Sampel::where('sam_penid',$register->eks_penid)->get();

         return view('pelacakanregister')->with(compact('register','sampel'));
        //return $register;


    }

    public function tracesampel(Request $request){
        
    }
}
