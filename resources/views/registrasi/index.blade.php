@extends('layouts.web')
@section('title','- Registrasi')
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
                            <h4 class="mb-1 mt-0">Register</h4>
                        </div>
                        <div class="col-sm-8 col-xl-6">
                           <a href="{{url('registrasi/create')}}" class="btn btn-md btn-primary float-right ml-2"><i class="uil-plus"></i> Registrasi Baru</a>
                           <a href="{{url('import/')}}" class="btn btn-md btn-primary float-right"><i class="uil-upload"></i> Import Data</a>
                        </div>
                    </div>

                    <!-- content -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">  
                                    <h4 class="header-title mt-0 mb-1">Register Pasien</h4>
                                    <p class="sub-header">
                                        Register pasien dari berbagai rumah sakit dan fasyankes. Berikut ini adalah register yang telah diisi dan dikirimkan ke bagian pengambilan sampel.
                                    </p>
                                        <table id="basic-datatable"  class="table table-striped dt-responsive table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Informasi Pasien</th>
                                                    <th>Pengirim Register</th>
                                                    <th>Tanggal Input</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach($reg as $r)
                                                <tr>
                                                    <td><p><b>Nomor Registrasi : </b>{{$r->reg_no}}</p>
                                                        <p><b>NIK Pasien : </b>{{$r->reg_nik}}</p>
                                                        <p><b>Nama Pasien : </b>{{$r->reg_nama_pasien}} ({{$r->reg_usia}})</p>
                                                    
                                                    </td>
                                                    <td><p><b>Dinkes Pengirim : </b>{{$r->reg_dinkes_pengirim}}</p>
                                                        <p><b>Fasyankes : </b> {{$r->reg_fasyankes_pengirim}} ({{$r->reg_nama_rs}})</p>
                                                        <p><b>Dokter Penanggung Jawab : </b>{{$r->reg_nama_dokter}}</p></td>
                                                        <td>{{ Carbon\Carbon::parse($r->reg_dateinput)->isoformat('d MMMM Y')}}</p>  </td>
                                                    <td>
                                                        <a href="{{url('registrasi/'.$r->regid)}}" class="btn btn-sm btn-primary"><i class="uil-info-circle"></i></a>
                                                        <a href="{{url('registrasi/'.$r->regid.'/edit')}}" class="btn btn-sm btn-warning"><i class="uil-edit"></i></a>
                                                        <button type="button" href="{{url('registrasi/delete/'.$r->regid)}}" class="deletebtn btn btn-sm btn-danger"><i class="uil-trash"></i></button></td>
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
    

    $(document).on('click', '.deletebtn', function(e) {
       var href = $(this).attr('href');
       Swal.fire({
   title: 'Yakin untuk menghapus data ini ? ',
   text: 'Data yang sudah dihapus tidak dapat dikembalikan!',
   icon: 'warning',
   showCancelButton: true,
   confirmButtonColor: '#95000c',
   confirmButtonText: 'Ya, Hapus!',
   cancelButtonText: 'Tidak, batalkan'
 }).then((result) => {
   if (result.value) {
      window.location.href = href;
  
   // For more information about handling dismissals please visit
   // https://sweetalert2.github.io/#handling-dismissals
   } else if (result.dismiss === Swal.DismissReason.cancel) {
     Swal.fire(
       'Dibatalkan',
       'Data tidak jadi dihapus',
       'error'
     )
   }
 });
 
      });
 
  
    $("#basic-datatable").DataTable({
        language:{
            paginate:{
                previous:"<i class='uil uil-angle-left'>",
                    next:"<i class='uil uil-angle-right'>"}}});
                        });
                        </script>
@endsection

@endsection