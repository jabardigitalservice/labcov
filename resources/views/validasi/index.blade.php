@extends('layouts.web')
@section('title','- Validasi & Verifikasi Pemeriksaan Sampel')
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
                            <h4 class="mb-1 mt-0">Validasi & Verifikasi Pemeriksaan Sampel</h4>
                        </div>
                        <div class="col-sm-8 col-xl-6"></div>
                    </div>

                    <!-- content -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">  
                                    <h4 class="header-title mt-0 mb-1">Validasi & Verifikasi Pemeriksaan Sampel</h4>
                                    <p class="sub-header">
                                      Berikut adalah hasil pemeriksaan laboratorium yang perlu divalidasi
                                    </p>
                                        <table id="basic-datatable"  class="table table-striped dt-responsive table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Hasil Pemeriksaan</th>
                                                    <th>Identitas Fasien</th>
                                                    <th>Informasi Pemeriksa</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($belum_validasi as $a)
                                         <tr>
                                             <td>Sampel <span class="badge badge-primary">#{{$a->sam_barcodenomor_sampel}}</span>
                                                @if($a->sam_jenis_sampel == 1)
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
                                                @endif</td>
                                             <td><p>Nomor Register : {{$a->reg_no}}</p>
                                                <p>Nomor Identitas {{$a->reg_jenisidentitas}} : @if($a->reg_jenisidentitas == "KTP") {{$a->reg_nik}} @else {{$a->reg_nosim}}@endif</p></td>
              <td><p>Kesimpulan Pemeriksaan : @if($a->pem_kesimpulan_pemeriksaan == "Positif")
                  <span class="badge badge-danger">{{$a->pem_kesimpulan_pemeriksaan }}</span> 
                @else 
                 <span class="badge badge-success">{{$a->pem_kesimpulan_pemeriksaan }}</span> 
                @endif </p></td>
              <td><a href="{{url('validasi/detail/'.$a->pem_id)}}" class="btn btn-sm btn-primary"><i class="uil-eye"></i>Detail</a>
                                        </tr>
                                        @endforeach
                                            </tbody>
                                        </table>
<hr>
<h4 class="header-title mt-0 mb-1">Validasi & Verifikasi Pemeriksaan Sampel</h4>
<p class="sub-header">
  Berikut adalah hasil pemeriksaan laboratorium yang perlu divalidasi
</p>
    <table id="basic-datatable"  class="table table-striped dt-responsive table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Hasil Pemeriksaan</th>
                <th>Identitas Fasien</th>
                <th>Informasi Pemeriksa</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($validasi as $a)
     <tr>
         <td>Sampel <span class="badge badge-primary">#{{$a->sam_barcodenomor_sampel}}</span>
            @if($a->sam_jenis_sampel == 1)
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
            @endif</td>
         <td><p>Nomor Register : {{$a->reg_no}}</p>
            <p>Nomor Identitas {{$a->reg_jenisidentitas}} : @if($a->reg_jenisidentitas == "KTP") {{$a->reg_nik}} @else {{$a->reg_nosim}}@endif</p></td>
<td><p>Kesimpulan Pemeriksaan : @if($a->pem_kesimpulan_pemeriksaan == "Positif")
<span class="badge badge-danger">{{$a->pem_kesimpulan_pemeriksaan }}</span> 
@else 
<span class="badge badge-success">{{$a->pem_kesimpulan_pemeriksaan }}</span> 
@endif </p></td>
<td><a href="{{url('validasi/print/'.$a->val_id)}}" class="btn btn-sm btn-primary"><i class="uil-print"></i> Print / Download</a>
    <a href="{{url('validasi/detail/'.$a->val_id)}}" class="btn btn-sm btn-info"><i class="uil-info-circle"></i> Detail</a>
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