@extends('layouts.web')
@section('title','- Detail Sampel')
@section('css')
@endsection
@section('content')

            <div class="content">
                <div class="container-fluid">
                    <div class="row page-title align-items-center">
                        <div class="col-sm-4 col-xl-6">
                           
                            <a href="{{url('pelacakan/')}}" class="btn btn-xs btn-primary float-left mr-3"><i class="uil-arrow-left"></i></a> <h3 class="header-title  mb-1 mt-0">Detail Register</h3>
                        </div>
                        <div class="col-sm-8 col-xl-6">
                        
                        </div>
                    </div>
 <!-- content -->
 <div class="row">
  <div class="col-12">
      <div class="card">
          <div class="card-body">  
              <h4 class="mt-0 mb-1">Register Pasien #{{$sampel->sam_barcodenomor_sampel}}</h4>
              
<hr>
<h3 class="header-title mt-2 mb-2">Sampel Pasien</h3>
       <table class="table">
        <thead>
            <tr>
                <th>Jenis Sampel</th>
                <th>Petugas Pengambil Sampel</th>
                <th>Tanggal</th>
                <th>Pukul</th>
                <th>Kode Sampel</th>
            </tr>
        </thead>
          <tbody>
            <tr>
              <td>@if($sampel->sam_jenis_sampel == 1)
                Usap Nasofaring & Orofaring
                @elseif($sampel->sam_jenis_sampel == 2)
                Sputum
                @elseif($sampel->sam_jenis_sampel == 3)
                Bronchoalveolar Lavage
                 @elseif($sampel->sam_jenis_sampel == 4)
                 Tracheal Aspirate
                 @elseif($sampel->sam_jenis_sampel == 5)
                 Nasal Wash
                 @elseif($sampel->sam_jenis_sampel == 6)
                 Jaringan Biopsi/Otopsi
                 @elseif($sampel->sam_jenis_sampel == 7)
                 Serum Akut (kurang dari 7 hari demam) 
                 @elseif($sampel->sam_jenis_sampel == 8)
                 Serum konvalesen (2-3 minggu demam)
                 @elseif($sampel->sam_jenis_sampel == 9)
                 Whole Blood
                 @elseif($sampel->sam_jenis_sampel == 10)
                 Plasma
                 @elseif($sampel->sam_jenis_sampel == 11)
                 Fingerprick 
                 @elseif($sampel->sam_jenis_sampel == 12)
                 Jenis Sampel Lainnya : {{$sampel->sam_namadiluarjenis}}
                 @else
                 Jenis Sampel Lainnya : {{$sampel->sam_namadiluarjenis}}
                @endif</td>
              <td>{{$sampel->sam_petugas_pengambil_sampel}}</td>
              <td>{{$sampel->sam_tanggal_sampel}}</td>
              <td>{{$sampel->sam_pukul_sampel}}</td>
              <td><span class="badge badge-primary">{{$sampel->sam_barcodenomor_sampel}}</span></td>
            </tr>
          </tbody>
        </table>
@if(isset($ekstraksisampel))
<hr>
<h3 class="header-title mt-2 mb-2">Ekstraksi Sampel</h3>
<table class="table">
    <tbody>
    <tr>
    <td width="40%"><b>Tanggal mulai ekstraksi</b></td>
    <td width="60%">{{$ekstraksisampel->eks_tanggal_mulai_ekstraksi }}</td>
    </tr>
    <tr>
    <td width="40%"><b>Jam mulai ekstraksi</b></td>
    <td width="60%">{{$ekstraksisampel->eks_jam_mulai_ekstraksi}}</td>
    </tr>
    <tr>
      <tr>
        <td width="40%"><b>Dikirim ke Lab</b></td>
        <td width="60%">
        @if(isset($ekstraksisampel->eks_dikirim_ke_lab))
        {{$ekstraksisampel->eks_dikirim_ke_lab}}
        @else
        {{$ekstraksisampel->eks_nama_lab_lain }}
        @endif</td>
      </tr>
    </tbody>
    </table>     
@else
<span class="badge badge-danger">Sampel belum atau tidak diperiksa oleh Lab Ekstraksi</span>
@endif
@if(isset($pemeriksaansampel))
<hr>
<h3 class="header-title mt-2 mb-2">Pemeriksaan Realtime PCR</h3>
<table class="table">
    <tbody>
    <tr>
    <td width="40%"><b>Tanggal Mulai Pemeriksaan</b></td>
    <td width="60%">{{$pemeriksaansampel->pem_tanggal_mulai_pemeriksaan}}</td>
    </tr>
    <tr>
    <td width="40%"><b>Jam mulai ekstraksi</b></td>
    <td width="60%">{{$pemeriksaansampel->pem_jam_mulai_pcr}}</td>
    </tr>
    
    </tbody>
    </table>     
  @else
  <span class="badge badge-danger">Sampel belum atau tidak diperiksa oleh Pemeriksa Sampel</span>
@endif

@if(isset($pemeriksaanrdt))
<hr>
<h3 class="header-title mt-2 mb-2">Pemeriksaan RDT</h3>
<table class="table">
    <tbody>
    <tr>
    <td width="40%"><b>Tanggal Pemeriksaan</b></td>
    <td width="60%">{{$pemeriksaanrdt->rapid_tanggal_rdt_1}}</td>
    </tr>
    <tr>
    <td width="40%"><b>Jam pemeriksaan</b></td>
    <td width="60%">{{$pemeriksaanrdt->rapid_jam_rdt_1}}</td>
    </tr>
    
    </tbody>
    </table>     
  @else
  <span class="badge badge-danger">Sampel belum atau tidak diperiksa oleh Pemeriksa Sampel</span>
@endif
    @if(isset($validasi))
    <hr>
    <h3 class="header-title mt-2 mb-2">Keluar Hasil</h3>
    <table class="table">
        <tbody>
        <tr>
        <td width="40%"><b>Kesimpulan pemeriksaan</b></td>
        <td width="60%">  @if($pemeriksaansampel->pem_kesimpulan_pemeriksaan == "Positif")
          <span class="badge badge-danger">{{$pemeriksaansampel->pem_kesimpulan_pemeriksaan}}</span>
         @else
         <span class="badge badge-success">{{$pemeriksaansampel->pem_kesimpulan_pemeriksaan}}</span>
       @endif</td>
        </tr>
        
        </tbody>
        </table>     
        @else
        <span class="badge badge-danger">Hasil belum atau tidak keluar</span>
        @endif
                                </div>
                            </div>
                        </div>

                    </div>

         

                </div>
            </div> <!-- content -->

@section('js')
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
});
                        </script>
@endsection

@endsection