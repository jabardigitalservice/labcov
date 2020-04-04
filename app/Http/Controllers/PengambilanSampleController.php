<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sampel;
use App\PengambilanSampel;
use App\RegisterPasien;
use Illuminate\Database\QueryException as QE;
use Auth;

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
        return view('penerimaan.index')->with(compact('avail_regis','sam'));
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
        
        try{
            $store = PengambilanSampel::insertGetId($insert->toArray());
            
             }catch(QE $e){  return $e; } //show db error message

       
             notify()->success('Status Pengambilan telah sukses ditambahkan !');
                return $store->all();
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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

}
