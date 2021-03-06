@extends('layouts.web')
@section('title','- Penerimaan Sampel')
@section('css')
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
                            <h4 class="mb-1 mt-0">Penerimaan atau Pengambilan Sampel</h4>
                        </div>
                        <div class="col-sm-8 col-xl-6">
                           <a href="{{url('pengambilansampel/tambahsampel')}}" class="btn btn-md btn-primary float-right ml-2"><i class="uil-plus"></i> Penerimaan Sampel Baru</a>
                        </div>
                    </div>

                    <!-- content -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">  
                                        <p class="sub-header">Scan / masukan nomor barcode salah satu sampel untuk register pasien rujukan </p>
<form id="scanbarcode row" action="{{url('pengambilansampel/labscanbarcode')}}" method="post">
    @csrf
    <center>
    <div class="form-group">
    <input id="barcodesampel" class="form-control col-md-3" name="sam_barcodenomor_sampel" placeholder="Scan..." type="text" tabindex="1" name="" required autofocus>
  <br>
  <button type="submit" class="mt-2 btn btn-md btn-primary">Tambahkan Informasi Sampel</button>
    </div>
 
</center>
</form>

                                       
                                </div>
                            </div>
                        </div>
                    </div>
        <!-- content -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">  
                        <h4 class="header-title mt-0 mb-1">Sampel dari Register</h4>
                        <p class="sub-header">Berikut ini adalah daftar dari registrasi yang belum ada status penerimaan atau pengambilan sampel, Silahkan pilih dan lakukan Ambil atau Terima Sampel Pasien</p>
                            <table id="basic-datatable"  class="table table-striped dt-responsive table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Sampel</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @foreach($group as $r => $x)
                                    <tr>
                                           
                                        <td>
                                            @foreach($x as $a)
                                            <p><span class="badge badge-primary">Sampel #{{$a->sam_barcodenomor_sampel}}</span></p>
                                        @endforeach
                                        </td>

                                        <td>
                                            <a href="{{url('pengambilansampel/edit/'.$r)}}" class="btn btn-sm btn-warning"><i class="uil-edit"></i> Ubah Keterangan Sampel</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>

        </div>

               <!-- content -->
               <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">  
                            <h4 class="header-title mt-0 mb-1">Status yang telah dikirim</h4>
                            <p class="sub-header">Berikut adalah status yang telah dikirimkan ke Lab Ekstraksi</p>
                                <table id="basic-datatable2"  class="table table-striped dt-responsive table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Sampel</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    @foreach($group2 as $r => $x)
                                    <tr>
                                           
                                        <td>
                                            @foreach($x as $a)
                                            <p><span class="badge badge-primary">Sampel #{{$a->sam_barcodenomor_sampel}}</span></p>
                                        @endforeach
                                        </td>

                                        <td>
                                            <a href="{{url('pengambilansampel/edit/'.$r)}}" class="btn btn-sm btn-warning"><i class="uil-edit"></i> Ubah Keterangan Sampel</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>

            </div>
         

                </div>
            </div> <!-- content -->

@section('js')
        <!-- datatable js -->
        <script src="{{asset('assets/libs/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('assets/libs/datatables/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('assets/libs/datatables/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('assets/libs/datatables/responsive.bootstrap4.min.js')}}"></script>
        <script src="{{asset('assets/libs/datatables/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('assets/libs/datatables/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{asset('assets/libs/datatables/buttons.html5.min.js')}}"></script>
        <script src="{{asset('assets/libs/datatables/buttons.flash.min.js')}}"></script>
        <script src="{{asset('assets/libs/datatables/buttons.print.min.js')}}"></script>
        <script src="{{asset('assets/libs/datatables/dataTables.keyTable.min.js')}}"></script>
        <script src="{{asset('assets/libs/datatables/dataTables.select.min.js')}}"></script>
<script>
$(document).ready(function(){
    $("#basic-datatable").DataTable({
        language:{
            paginate:{
                previous:"<i class='uil uil-angle-left'>",
                    next:"<i class='uil uil-angle-right'>"}}});

    $("#basic-datatable2").DataTable({
        language:{
            paginate:{
                previous:"<i class='uil uil-angle-left'>",
                    next:"<i class='uil uil-angle-right'>"}}});
                        });
                        </script>
@endsection
@endsection