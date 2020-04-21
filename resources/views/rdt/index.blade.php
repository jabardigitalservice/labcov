@extends('layouts.web')
@section('title','- Pemeriksaan Sampel RDT')
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
                            <h4 class="mb-1 mt-0">Pemeriksaan Sampel RDT</h4>
                        </div>
                        <div class="col-sm-8 col-xl-6"></div>
                    </div>

                    <!-- content -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">  
                                    <h4 class="header-title mt-0 mb-1">Pemeriksaan Sampel RDT</h4>
                                    <p class="sub-header">
                                      Berikut ini adalah daftar dari status penerimaan sampel RDT yang dikirim oleh Lab Pengambilan Sampel
                                    </p>
                                    <table id="basic-datatable"  class="table table-striped dt-responsive table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Urutan Ekstraksi</th>
                                                    <th>Identitas Pasien</th>
                                                    <th>Status Sampel</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                           @foreach($avail_pen as $key => $a)
                                           @if($arr[$key] != "")
                                           <tr>
                                           <td>{{$a->pen_nomor_ekstraksi}}</td>
                                             <td> @if(is_null($a->pen_noreg))
                                                 <p><span class="badge badge-danger">Identitas Pasien Belum Dimasukan Register</span></p>
                                                 @else
                                                 <p><b>Nomor Registrasi : </b>{{$a->pen_noreg}}</p>
                                                 <p><b>NIK Pasien : </b>{{$a->pen_nik}}</p></td>
                                                 @endif
                                                 </td>

                                            @php $jumlah = count(explode(",",$a->pen_id_sampel)); @endphp
                                             <td>
                                             @if($key == key($arr))
                                            @foreach(explode(",",$arr[$key]) as $r)
                                            <p><span class="badge badge-info">Sampel #{{$r}}</span></p>
                                            @endforeach
                                            @php 
                                            next($arr);
                                            @endphp
                                             @endif   </td>
                                             <td>   <a href="{{url('pemeriksaanrdt/periksa/'.$a->pen_id)}}" class="btn btn-sm btn-primary"><i class="uil-arrow-right"></i>Pilih Sampel Untuk Dikirim</a></td>
                                          </tr>
                                          @else
                                          @endif
                                           @endforeach
                                            </tbody>
                                        </table>


                                       
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">  
                                    <h4 class="header-title mt-0 mb-1">Data Sampel yang telah dikirim</h4>
                                    <p class="sub-header">
                                      Berikut ini adalah daftar dari status registrasi yang sampelnya telah dipilih dan dikirim ke verifikator
                                    </p>
                                    <table id="basic-datatable2"  class="table table-striped dt-responsive table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Urutan Ekstraksi</th>
                                                    <th>Identitas Pasien</th>
                                                    <th>Sampel</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                           @foreach($not_avail_pen as $a)
                                           <tr>
                                               <td>{{$a->created_at}}</td>
                                             <td>@if(is_null($a->pen_noreg))
                                                 <p><span class="badge badge-danger">Identitas Pasien Belum Dimasukan Register</span></p>
                                                 @else
                                                 <p><b>Nomor Registrasi : </b>{{$a->pen_noreg}}</p>
                                                 <p><b>NIK Pasien : </b>{{$a->pen_nik}}</p></td>
                                                 @endif
                                                 </td>
                                             <td>
                                                 <span class="badge badge-info">Sampel #{{$a->sam_barcodenomor_sampel}}</span></td>
                                             <td>   <a href="{{url('pemeriksaanrdt/edit/'.$a->rapid_id)}}" class="btn btn-sm btn-warning"><i class="uil-edit"></i> Ubah Pemeriksaan</a>
                                             <a href="{{url('pemeriksaanrdt/detail/'.$a->rapid_id)}}" class="btn btn-sm btn-primary"><i class="uil-eye"></i> Detail Pemeriksaan</a></td>
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
                    next:"<i class='uil uil-angle-right'>"}}
                });
    $("#basic-datatable2").DataTable({
        language:{
            paginate:{
                previous:"<i class='uil uil-angle-left'>",
                    next:"<i class='uil uil-angle-right'>"}}
                });
                        });
                        </script>
@endsection

@endsection