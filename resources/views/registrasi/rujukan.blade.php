@extends('layouts.web')
@section('title','- Registrasi Rujukan')
@section('content')

            <div class="content">
                <div class="container-fluid">
                    <div class="row page-title align-items-center">
                        <div class="col-sm-4 col-xl-6">
                            <h4 class="mb-1 mt-0">Register dari Rujukan</h4>
                        </div>
                        <div class="col-sm-8 col-xl-6">
                         
                        </div>
                    </div>

                    <!-- content -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">  
                                    <h4 class="header-title mt-0 mb-1">Register Pasien Rujukan</h4>
<p class="sub-header">Scan / masukan nomor barcode salah satu sampel untuk register pasien rujukan </p>
<form id="scanbarcode row" action="{{url('scanbarcoderujukan')}}" method="post">
    @csrf
    <center>
    <div class="form-group">
    <input id="barcodesampel" class="form-control col-md-3" name="sam_barcodenomor_sampel" placeholder="Scan..." type="text" tabindex="1" name="" required autofocus>
  <br>
  <button type="submit" class="mt-2 btn btn-md btn-primary">Tambahkan Informasi Register</button>
    </div>
 
</center>
</form>
                                       
                                </div>
                            </div>
                        </div>

                    </div>

         

                </div>
            </div> <!-- content -->

@section('js')
        
@endsection

@endsection