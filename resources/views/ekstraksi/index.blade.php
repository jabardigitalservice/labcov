@extends('layouts.web')
@section('title','- Ekstraksi RNA Sampel')
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
                            <h4 class="mb-1 mt-0">Penerimaan dan Ekstraksi Sampel</h4>
                        </div>
                        <div class="col-sm-8 col-xl-6"></div>
                    </div>

                    <!-- content -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">  
                                    <h4 class="header-title mt-0 mb-1">Penerimaan dan Ekstraksi RNA Sampel</h4>
                                    <p class="sub-header">
                                      Berikut ini adalah daftar dari status penerimaan sampel yang dikirim, silahkan terima sampel dan lakukan ekstraksi RNA untuk dikirim ke laboratorium berikutnya
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
                                             <td><p><b>Jumlah Sampel :</b> {{$jumlah}}</p>
                                             @if($key == key($arr))
                                            @foreach(explode(",",$arr[$key]) as $r)
                                            <p><span class="badge badge-info">Sampel #{{$r}}</span></p>
                                            @endforeach
                                            @php 
                                            next($arr);
                                            @endphp
                                             @endif   </td>
                                             <td>   <a href="{{url('ekstraksi/pilih/'.$a->pen_id)}}" class="btn btn-sm btn-primary"><i class="uil-arrow-right"></i>Pilih Sampel Untuk Dikirim</a></td>
                                          </tr>
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
                                      Berikut ini adalah daftar dari status registrasi yang sampelnya telah dipilih dan dikirim ke laboratorium tingkat 3
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
                                             
                                            @foreach($not_avail_pen as $na)
                                           <tr>
                                             <td><p><b>Sampel yang dikirim</b> : <span class="badge badge-info">Sampel #{{$na->sam_barcodenomor_sampel}}</span></p>
                                             <td>
                                                 @if(is_null($na->eks_noreg))
                                                 <p><span class="badge badge-danger">Identitas Pasien Belum Dimasukan Register</span></p>
                                                 @else
                                                 <p><b>Nomor Registrasi : </b>{{$na->eks_noreg}}</p>
                                                 <p><b>NIK Pasien : </b>{{$na->eks_nik}}</p></td>
                                                 @endif
                                           </td>
                                             <td>
                                             <a href="{{url('ekstraksi/detail/'.$na->eks_id)}}" class="btn btn-sm btn-primary"><i class="uil-info-circle"></i></a>
                                             <a href="{{url('ekstraksi/edit/'.$na->eks_id)}}" class="btn btn-sm btn-warning"><i class="uil-edit"></i></a></td>
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