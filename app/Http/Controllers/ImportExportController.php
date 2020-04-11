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


         return redirect('registrasi');
}

}
