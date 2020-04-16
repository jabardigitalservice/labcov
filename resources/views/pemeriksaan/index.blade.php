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

                    <!-- content -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">  
                                    <h4 class="header-title mt-0 mb-1">Pemeriksaan Sampel</h4>
                                    <p class="sub-header">
                                      Berikut ini adalah daftar dari status penerimaan sampel yang dikirim, silahkan terima sampel dan lakukan ekstraksi RNA untuk dikirim ke laboratorium berikutnya
                                    </p>
                                        <table id="basic-datatable"  class="table table-striped dt-responsive table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Nomor Sampel</th>
                                                    <th>Informasi Sampel</th>
                                                    <th>Pengiriman</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($avail_pem as $a)
                                         <tr>
                                             <td>Sampel <span class="badge badge-primary">#{{$a->sam_barcodenomor_sampel}}</span></td>
                                             <td>@if($a->sam_jenis_sampel == 1)
              Usap Nasofaring & Orofaring
              @elseif($a->sam_jenis_sampel == 2)
              Sputum
              @elseif($a->sam_jenis_sampel == 3)
              Bronchoalveolar Lavage
               @elseif($a->sam_jenis_sampel == 4)
               Tracheal Aspirate
               @elseif($a->sam_jenis_sampel == 5)
               Nasal Wash
               @elseif($a->sam_jenis_sampel == 6)
               Jaringan Biopsi/Otopsi
               @elseif($a->sam_jenis_sampel == 7)
               Serum Akut (kurang dari 7 hari demam) 
               @elseif($a->sam_jenis_sampel == 8)
               Serum konvalesen (2-3 minggu demam)
               @elseif($a->sam_jenis_sampel == 9)
               Whole Blood
               @elseif($a->sam_jenis_sampel == 10)
               Plasma
               @elseif($a->sam_jenis_sampel == 11)
               Fingerprick 
               @elseif($a->sam_jenis_sampel == 12)
               Jenis Sampel Lainnya : {{$a->sam_namadiluarjenis}}
               @else
               Jenis Sampel Lainnya : {{$a->sam_namadiluarjenis}}
              @endif
               </td>
              <td><p>Dikirim pada : {{$a->eks_tanggal_pengiriman_rna}} pukul {{$a->eks_jam_pengiriman_rna}}</p></td>
              <td><a href="{{url('pemeriksaansampel/periksa/'.$a->eks_id)}}" class="btn btn-sm btn-primary"><i class="uil-check"></i> Proses</a>
                  <a href="{{url('pemeriksaansampel/kembalikan/'.$a->eks_id)}}" class="btn btn-sm btn-danger"><i class="uil-arrow-left"></i>Kembalikan ke Lab Ekstraksi</a></td>
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
                                      Berikut ini adalah daftar dari status registrasi yang sampelnya telah dipilih dan dikirim ke verifikator
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
                                             
                                            @foreach($not_avail_pem as $b)
                                         <tr> 
                                             <td>Sampel <span class="badge badge-primary">#{{$b->sam_barcodenomor_sampel}}</span></td>
                                             <td>@if($b->sam_jenis_sampel == 1)
              Usap Nasofaring & Orofaring
              @elseif($b->sam_jenis_sampel == 2)
              Sputum
              @elseif($b->sam_jenis_sampel == 3)
              Bronchoalveolar Lavage
               @elseif($b->sam_jenis_sampel == 4)
               Tracheal Aspirate
               @elseif($b->sam_jenis_sampel == 5)
               Nasal Wash
               @elseif($b->sam_jenis_sampel == 6)
               Jaringan Biopsi/Otopsi
               @elseif($b->sam_jenis_sampel == 7)
               Serum Akut (kurang dari 7 hari demam) 
               @elseif($b->sam_jenis_sampel == 8)
               Serum konvalesen (2-3 minggu demam)
               @else
               Jenis Sampel Lainnya : {{$b->sam_namadiluarjenis}}
              @endif</td>
              <td><p>Diperiksa pada : {{$b->pem_tanggal_mulai_pemeriksaan}} pukul {{$b->pem_jam_mulai_pcr}}</p></td>
              <td><a href="{{url('pemeriksaansampel/detail/'.$b->pem_id)}}" class="btn btn-sm btn-info"><i class="uil-eye"></i> Detail Pemeriksaan</a>
              <a href="{{url('pemeriksaansampel/edit/'.$b->pem_id)}}" class="btn btn-sm btn-warning"><i class="uil-edit"></i> Ubah Pemeriksaan</a></td>
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