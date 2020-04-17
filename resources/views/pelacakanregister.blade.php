@extends('layouts.web')
@section('title','- Detail Registrasi')
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
                                    <h4 class="mt-0 mb-1">Register Pasien #{{$register->reg_no}}</h4>
                                    
    <hr>
                                    <div class="row">
                                        <div class="col-md-6">   <h3 class="header-title mt-2 mb-2">Identitas Pengirim Spesimen</h3>
                                          <table class="table">
                                      <tbody>
                                      <tr>
                                      <td width="40%"><b>Dinkes Pengirim</b></td>
                                      <td width="60%">{{$register->reg_dinkes_pengirim}}</td>
                                      </tr>
                                      <tr>
                                      <td width="40%"><b>Fasyankes Pengirim</b></td>
                                      <td width="60%">{{$register->reg_fasyankes_pengirim}}</td>
                                      </tr>
                                      <tr>
                                      <td width="40%"><b>Nama Rumah Sakit / Fasyankes</b></td>
                                      <td width="60%">@if($register->reg_nama_rs == "Other")
                                      {{$register->reg_nama_rs_lainnya}}
                                      @else 
                                      {{$register->reg_nama_rs}}
                                      @endif</td>
                                      </tr>
                                      <tr>
                                      <td width="40%"><b>Nomor Rekam Medis</b></td>
                                      <td width="60%">{{$register->reg_no_rekammedis}}</td>
                                      </tr>
                                      <tr>
                                      <td width="40%"><b>Nama Dokter Penanggung Jawab</b></td>
                                      <td width="60%">{{$register->reg_nama_dokter}}</td>
                                      </tr>
                                      <tr>
                                      <td width="40%"><b>No Telp Fasyankes Pengirim</b></td>
                                      <td width="60%">{{$register->reg_telp_fas_pengirim}}</td>
                                      </tr>
                                      </tbody>
                                      </table>      
                                           
</div>
<div class="col-md-6">
  <h3 class="header-title mt-2 mb-2">Identitas Pasien</h3>
  <table class="table">
<tbody>
<tr>
<td width="40%"><b>Nama Lengkap Pasien</b></td>
<td width="60%">{{$register->reg_nama_pasien}}</td>
</tr>
<tr>
<td width="40%"><b>Nomor Induk Kependudukan</b></td>  <td width="60%"> {{$register->reg_nik}} </td>
</tr>
<tr>
<td width="40%"><b>Nomor Surat Izin Mengemudi</b></td>
<td width="60%">{{$register->reg_nosim}}</td>
</tr>
<tr>
<td width="40%"><b>Nomor Kartu Keluarga</b></td>
<td width="60%">{{$register->reg_nkk}}</td>
</tr>
<tr>
<td width="40%"><b>Pekerjaan</b></td>
<td width="60%">{{$register->reg_pekerjaan}}</td>
</tr>
<tr>
<td width="40%"><b>Tempat, Tanggal Lahir & Usia</b></td>
<td width="60%">{{$register->reg_tempatlahir}}, {{Carbon\Carbon::parse($register->reg_tanggallahir)->Format('d F Y')}} ({{$register->reg_usia}})</td>
</tr>
<tr>
<td width="40%"><b>Jenis Kelamin</b></td>
<td width="60%"><p>{{$register->reg_kelamin}}</p>
@if(!is_null($register->hamil_pasca))
<p>{{$register->reg_hamil_pasca}}</p>
@endif</td>
</tr>
<tr>
<td width="40%"><b>Alamat Pasien</b></td>
<td width="60%">{{$register->reg_alamat}} {{$register->reg_domisilirt}} {{$register->reg_domisilirw}}, {{$register->reg_domisilikotakab}}, {{$register->reg_domisilikecamatan}}, {{$register->reg_domisilikelurahan}}</td>
</tr>
<tr>
<td width="40%"><b>No Telp Pasien</b></td>
<td width="60%">{{$register->reg_notelp_pasien}}</td>
</tr>
</tbody>
</table>

                     
</div>
</div>
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
            @foreach($sampel as $s)
            <tr>
              <td>@if($s->sam_jenis_sampel == 1)
                Usap Nasofaring & Orofaring
                @elseif($s->sam_jenis_sampel == 2)
                Sputum
                @elseif($s->sam_jenis_sampel == 3)
                Bronchoalveolar Lavage
                 @elseif($s->sam_jenis_sampel == 4)
                 Tracheal Aspirate
                 @elseif($s->sam_jenis_sampel == 5)
                 Nasal Wash
                 @elseif($s->sam_jenis_sampel == 6)
                 Jaringan Biopsi/Otopsi
                 @elseif($s->sam_jenis_sampel == 7)
                 Serum Akut (kurang dari 7 hari demam) 
                 @elseif($s->sam_jenis_sampel == 8)
                 Serum konvalesen (2-3 minggu demam)
                 @elseif($s->sam_jenis_sampel == 9)
                 Whole Blood
                 @elseif($s->sam_jenis_sampel == 10)
                 Plasma
                 @elseif($s->sam_jenis_sampel == 11)
                 Fingerprick 
                 @elseif($s->sam_jenis_sampel == 12)
                 Jenis Sampel Lainnya : {{$s->sam_namadiluarjenis}}
                 @else
                 Jenis Sampel Lainnya : {{$s->sam_namadiluarjenis}}
                @endif</td>
              <td>{{$s->sam_petugas_pengambil_sampel}}</td>
              <td>{{$s->sam_tanggal_sampel}}</td>
              <td>{{$s->sam_pukul_sampel}}</td>
              <td><span class="badge badge-primary">{{$s->sam_barcodenomor_sampel}}</span></td>
            </tr>
            @endforeach
          </tbody>
        </table>
<hr>
<h3 class="header-title mt-2 mb-2">Ekstraksi Sampel</h3>
<table class="table">
    <tbody>
    <tr>
    <td width="40%"><b>Tanggal mulai ekstraksi</b></td>
    <td width="60%">{{$register->eks_tanggal_mulai_ekstraksi }}</td>
    </tr>
    <tr>
    <td width="40%"><b>Jam mulai ekstraksi</b></td>
    <td width="60%">{{$register->eks_jam_mulai_ekstraksi}}</td>
    </tr>
    <tr>
      <tr>
        <td width="40%"><b>Dikirim ke Lab</b></td>
        <td width="60%">
        @if(!is_null($register->eks_dikirim_ke_lab))
        {{$register->eks_dikirim_ke_lab}}
        @else
        {{$register->eks_nama_lab_lain }}
        @endif</td>
      </tr>
    </tbody>
    </table>     
    
<hr>
<h3 class="header-title mt-2 mb-2">Pemeriksaan Realtime PCR</h3>
<table class="table">
    <tbody>
    <tr>
    <td width="40%"><b>Tanggal Mulai Pemeriksaan</b></td>
    <td width="60%">{{$register->pem_tanggal_mulai_pemeriksaan}}</td>
    </tr>
    <tr>
    <td width="40%"><b>Jam mulai ekstraksi</b></td>
    <td width="60%">{{$register->pem_jam_mulai_pemeriksaan}}</td>
    </tr>
    
    </tbody>
    </table>                

    <hr>
    <h3 class="header-title mt-2 mb-2">Keluar Hasil</h3>
    <table class="table">
        <tbody>
        <tr>
        <td width="40%"><b>Kesimpulan pemeriksaan</b></td>
        <td width="60%">{{$register->pem_kesimpulan_pemeriksaan}}</td>
        </tr>
        
        </tbody>
        </table>     
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