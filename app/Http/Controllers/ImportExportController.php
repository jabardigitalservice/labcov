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
use App\Imports\RegisterImport;
use App\Imports\HistoryPerawatanImport;
use App\Imports\KontakPasienImport;
use App\Imports\KunjunganPergiImport;
use Illuminate\Database\QueryException as QE;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;


class ImportExportController extends Controller
{

    public function indeximport(){
        return view('import.index');
    }
    
    public function importpasien(Request $request){

      if ($request->file('xlsregister') != '' || $request->file('xlsregister') !== null) {
            $file = $request->file('xlsregister');
            $fileArray = ['xlsregister' => $file];
            $rules = ['xlsregister' => 'mimes:xls,xlsx,csv,tsv,txt'];
            $validator = Validator::make($fileArray, $rules);
            if ($validator->fails()) {
                // Redirect or return json to frontend with a helpful message to inform the user
                // that the provided file was not an adequate type

               notify()->warning('File yang anda unggah bukan sebuah file XLSX, XLS atau CSV');
               return redirect()->back();
            } else {
            Excel::import(new RegisterImport, $request->file('xlsregister'));
            notify()->success('File Riwayat Perawatan Berhasil di Import');
            }
        }

        if ($request->file('xlsriwayatperawatan') != '' || $request->file('xlsriwayatperawatan') !== null) {
            $importhis = new HistoryPerawatanImport;
            $file = $request->file('xlsriwayatperawatan');
            $fileArray = ['xlsriwayatperawatan' => $file];
            $rules = ['xlsregister' => 'mimes:xls,xlsx,csv,tsv,txt'];
            $validator = Validator::make($fileArray, $rules);
            if ($validator->fails()) {
                // Redirect or return json to frontend with a helpful message to inform the user
                // that the provided file was not an adequate type

               notify()->warning('File yang anda unggah bukan sebuah file XLSX, XLS atau CSV');
               return redirect()->back();
            } else {
            Excel::import($importhis, $request->file('xlsriwayatperawatan'));
            $ubah = HistoryPerawatan::orderBy('hisid', 'desc')->take(count($importhis->getArray()))->get();
            foreach($ubah as $u){
                $addtoreg = RegisterPasien::where('reg_no',$u->his_regid)->first();
                $arr = explode(",",$addtoreg->reg_history_visit);
                $arr[] = $u->hisid;
                $addtoreg->reg_history_visit = implode(",", $arr);
                $addtoreg->update();
            }
            
            notify()->success('File Riwayat Perawatan Berhasil di Import');
            }
        }

        if ($request->file('xlsriwayatkunjungan') != '' || $request->file('xlsriwayatkunjungan') !== null) {
            $importkun = new KunjunganPergiImport;
            $file = $request->file('xlsriwayatkunjungan');
            $fileArray = ['xlsriwayatkunjungan' => $file];
            $rules = ['xlsriwayatkunjungan' => 'mimes:xls,xlsx,csv,tsv,txt'];
            $validator = Validator::make($fileArray, $rules);
            if ($validator->fails()) {
                // Redirect or return json to frontend with a helpful message to inform the user
                // that the provided file was not an adequate type

               notify()->warning('File yang anda unggah bukan sebuah file XLSX, XLS atau CSV');
               return redirect()->back();
            } else {
            Excel::import($importkun, $request->file('xlsriwayatkunjungan'));
            $ubah = KunjunganPergi::orderBy('kunid', 'desc')->take(count($importkun->getArray()))->get();
            foreach($ubah as $u){
                $addtoreg = RegisterPasien::where('reg_no',$u->kun_regid)->first();
                $arr = explode(",",$addtoreg->reg_kunjunganluarnegri);
                $arr[] = $u->kunid;
                $addtoreg->reg_kunjunganluarnegri = implode(",", $arr);
                $addtoreg->update();
            }
            notify()->success('File Riwayat Kunjungan Berhasil di Import');
            }
        }

        if ($request->file('xlsriwayatkontak') != ''  || $request->file('xlsriwayatkontak') !== null) {
            $importkon = new KontakPasienImport;
            $file = $request->file('xlsriwayatkontak');
            $fileArray = ['xlsriwayatkontak' => $file];
            $rules = ['xlsriwayatkontak' => 'mimes:xls,xlsx,csv,tsv,txt'];
            $validator = Validator::make($fileArray, $rules);
            if ($validator->fails()) {
                // Redirect or return json to frontend with a helpful message to inform the user
                // that the provided file was not an adequate type

               notify()->warning('File yang anda unggah bukan sebuah file XLSX, XLS atau CSV');
               return redirect()->back();
            } else {
            Excel::import($importkon, $request->file('xlsriwayatkontak'));
            notify()->success('File Riwayat Kontak Berhasil di Import');
            $ubah = KontakPasien::orderBy('konid', 'desc')->take(count($importkon->getArray()))->get();
            foreach($ubah as $u){
                $addtoreg = RegisterPasien::where('reg_no',$u->kon_regid)->first();
                $arr = explode(",",$addtoreg->reg_kontakterakhir);
                $arr[] = $u->konid;
                $addtoreg->reg_kontakterakhir = implode(",", $arr);
                $addtoreg->update();
            }
            notify()->success('File Kontak Terakhir Berhasil di Import');
        }
     
        }

        return redirect('register');
}

}
