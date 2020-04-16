@extends('layouts.web')
@section('title','- Pemeriksaan Sampel')
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
                            <h4 class="mb-1 mt-0">Pemeriksaan Sampel</h4>
                        </div>
                        <div class="col-sm-8 col-xl-6"></div>
                    </div>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">  
                                    <h4 class="header-title mt-0 mb-1">Data sampel yang telah diekstraksi namun dikembalikan Lab Pemeriksaan</h4>
                                    <p class="sub-header">
                                      Berikut ini adalah daftar dari status sampel yang dikembalikan dari Lab Pemeriksaan
                                    </p>
                                        <table id="basic-datatable2"  class="table table-striped dt-responsive table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Keterangan Status</th>
                                                    <th>Status Sampel</th>
                                                  
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                             
                                            @foreach($pengembalian as $p)
                                            <tr>
                                             <td><p><b>Sampel yang dikembalikan</b> : <span class="badge badge-danger">Sampel #{{$p->sam_barcodenomor_sampel}}</span></p>
                                             <td>
                                                 @if(is_null($p->eks_noreg))
                                                 <p><span class="badge badge-danger">Identitas Pasien Belum Dimasukan Register</span></p>
                                                 @else
                                                 <p><b>Nomor Registrasi : </b>{{$p->eks_noreg}}</p>
                                                 <p><b>NIK Pasien : </b>{{$p->eks_nik}}</p></td>
                                                 @endif
                                           </td>
                                             <td>
                                             <a href="{{url('ekstraksi/sampeldikembalikan/pilihulang/'.$p->eks_id)}}" class="btn btn-sm btn-primary"><i class="uil-info-circle"></i> Ubah lalu kirim kembali</a>
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