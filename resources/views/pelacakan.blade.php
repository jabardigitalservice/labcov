@extends('layouts.web')
@section('title','- Pelacakan Register & Sampel')
@section('css')
        <!-- plugin css -->
        <link href="{{asset('assets/libs/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/libs/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/libs/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/libs/datatables/select.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" /> 

@endsection
@section('content')

            <div class="content">
                <div class="container-fluid">
                    <div class="row page-title align-items-center">
                        <div class="col-sm-4 col-xl-6">
                            <h4 class="mb-1 mt-0">Pelacakan Register & Sampel</h4>
                        </div>
                        <div class="col-sm-8 col-xl-6"></div>
                    </div>

                    <!-- content -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">  
                                    <h4 class="header-title mt-0 mb-1">Pelacakan Register & Sampel</h4>
                                    <p class="sub-header">
                                     Lacak status dan informasi dari register & sampel.
                                    </p>
                                    <div class="row">
                                    <div class="col-md-6">
<form  action="{{url('pelacakan/register')}}" method="post">
    @csrf
    <div class="form-group">
    <label for="register">Nomor Registrasi</label>
    <input class="form-control col-md-8" name="nomor_registrasi" placeholder="Masukan nomor registrasi untuk pelacakan" type="text" required>
  <br>
  <button type="submit" class="mt-2 btn btn-md btn-primary">Lacal Informasi Registrasi</button>
    </div>
</form>
                   </div>
                   <div class="col-md-6">
                   
<form action="{{url('pelacakan/sampel')}}" method="post">
    @csrf
    <div class="form-group">
    <label for="register">Nomor Sampel</label>
    <input class="form-control col-md-8" name="nomor_sampel" placeholder="Masukan nomor registrasi untuk pelacakan" type="text" required>
  <br>
  <button type="submit" class="mt-2 btn btn-md btn-primary">Lacal Informasi Sampel</button>
    </div>
</form>
</div>                    
                                </div>
                            </div>
                        </div>
               

                    </div>
           
         

                </div>
            </div> <!-- content -->

@endsection