@extends('layouts.web')
@section('title','- Penerimaan Sampel')
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
                            <h4 class="mb-1 mt-0">Penerimaan atau Pengambilan Sampel</h4>
                        </div>
                        <div class="col-sm-8 col-xl-6">
                           <a href="{{url('pengambilansampel/create')}}" class="btn btn-md btn-primary float-right ml-2"><i class="uil-plus"></i> Penerimaan Sampel Baru</a>
                        
                        </div>
                    </div>

                    <!-- content -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">  
                                    <h4 class="header-title mt-0 mb-1">Penerimaan atau Pengambilan Sampel Pasien</h4>
                                    <p class="sub-header">
                                      Berikut ini adalah daftar dari registrasi yang belum ada status penerimaan atau pengambilan sampel, Silahkan pilih dan lakukan Ambil atau Terima Sampel Pasien
                                    </p>
                                        <table id="basic-datatable"  class="table table-striped dt-responsive table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Nomor Registrasi</th>
                                                    <th>Status Sampel</th>
                                                  
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                             @foreach($avail_regis as $r)
                                                <tr>
                                                    <td><p><b>Nomor Registrasi : </b>{{$r->reg_no}}</p>
                                                        <p><b>NIK Pasien : </b>{{$r->reg_nik}}</p> </td>

                                                        <td>@if($r->reg_statusreg == 1) Belum Ada Status @endif </td>
                                                    <td>
                                                        <a href="{{url('pengambilansampel/ambil/'.$r->reg_no)}}" class="btn btn-sm btn-primary"><i class="uil-info-circle"></i> Isi Keterangan Sampel</a>
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