@extends('layouts.web')
@section('title','- Detail Registrasi')
@section('css')
@endsection
@section('content')

            <div class="content">
                <div class="container-fluid">
                    <div class="row page-title align-items-center">
                        <div class="col-sm-4 col-xl-6">
                           
                            <a href="{{url('registrasi/')}}" class="btn btn-xs btn-primary float-left mr-3"><i class="uil-arrow-left"></i></a> <h3 class="header-title  mb-1 mt-0">Detail Register</h3>
                        </div>
                        <div class="col-sm-8 col-xl-6">
                            <a href="{{url('registrasi/'.$reg->regid)}}" class="btn btn-sm btn-primary float-right"><i class="uil-info-circle"></i> Detail</a>
                            <a href="{{url('registrasi/'.$reg->regid.'/edit')}}" class="btn btn-sm btn-warning float-right"><i class="uil-edit"></i> Edit</a>
                            <a href="{{url('registrasi/delete/'.$reg->regid)}}" class="deletebtn btn btn-sm btn-danger float-right"><i class="uil-trash"></i> Delete</a>
                        </div>
                    </div>

                    <!-- content -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">  
                                    <h4 class="mt-0 mb-1">Register Pasien #{{$reg->reg_no}}</h4>
                                    
    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h3 class="header-title mt-2 mb-2">Identitas Pasien</h3>
                                            <table class="table">
          <tbody>
            <tr>
              <td width="40%"><b>Nama Lengkap Pasien</b></td>
              <td width="60%">{{$reg->reg_nama_pasien}}</td>
            </tr>
            <tr>
                <td width="40%"><b>Nomor Induk Kependudukan</b></td>
                <td width="60%">{{$reg->reg_nik}}</td>
              </tr>
              <tr>
                <td width="40%"><b>Tanggal Lahir & Usia</b></td>
                <td width="60%">{{$reg->reg_tanggallahir}}</td>
              </tr>
              <tr>
                <td width="40%"><b>Jenis Kelamin</b></td>
                <td width="60%"><p>{{$reg->reg_kelamin}}</p>
                @if(!is_null($reg->hamil_pasca))
            <p>{{$reg->reg_hamil_pasca}}</p>
                @endif</td>
              </tr>
              <tr>
                <td width="40%"><b>Alamat Pasien</b></td>
                <td width="60%">{{$reg->reg_alamat}}</td>
              </tr>
              <tr>
                <td width="40%"><b>No Telp Pasien</b></td>
                <td width="60%">{{$reg->reg_notelp_pasien}}</td>
              </tr>
          </tbody>
        </table>
        
</div>
<div class="col-md-6">
       
    <h3 class="header-title mt-2 mb-2">Identitas Pengirim Spesimen</h3>
    <table class="table">
<tbody>
<tr>
<td width="40%"><b>Dinkes Pengirim</b></td>
<td width="60%">{{$reg->reg_dinkes_pengirim}}</td>
</tr>
<tr>
<td width="40%"><b>Fasyankes Pengirim</b></td>
<td width="60%">{{$reg->reg_fasyankes_pengirim}}</td>
</tr>
<tr>
<td width="40%"><b>Nama Rumah Sakit / Fasyankes</b></td>
<td width="60%">{{$reg->reg_nama_rs}}</td>
</tr>
<tr>
<td width="40%"><b>Nomor Rekam Medis</b></td>
<td width="60%">{{$reg->reg_no_rekammedis}}</td>
</tr>
<tr>
<td width="40%"><b>Nama Dokter Penanggung Jawab</b></td>
<td width="60%">{{$reg->reg_nama_dokter}}</td>
</tr>
<tr>
<td width="40%"><b>No Telp Fasyankes Pengirim</b></td>
<td width="60%">{{$reg->reg_telp_fas_pengirim}}</td>
</tr>
</tbody>
</table>                          
</div>
</div>
<hr>
<h3 class="header-title mt-2 mb-2">Riwayat Perawatan Pasien Dalam Pengawasan COVID-19</h3>
@if(!empty($historyperawatan))
       <table class="table">
        <thead>
            <tr>
                <th>Tanggal Dirawat</th>
                <th>Rumah Sakit / Fasyankes</th>
            </tr>
        </thead>
          <tbody>
              @foreach($historyperawatan as $hp)
            <tr>
              <td width="30%">{{$hp->his_tanggalrawat}}</td>
              <td width="60%">{{$hp->his_rsfasyankes}}</td>
            </tr>
           @endforeach
          </tbody>
        </table>
@else
<p>Pasien tidak memiliki riwayat perawatan</p>
@endif
<hr>
<h3 class="header-title mt-2 mb-2">Tanda dan Gejala</h3>
<table class="table">
    <tbody>
    <tr>
    <td width="40%"><b>Tanggal onset gejala (panas)</b></td>
    <td width="60%">{{$reg->reg_onset_panas}}</td>
    </tr>
    <tr>
    <td width="40%"><i>Gejala klinis saat spesimen diambil :</i></td>
    </tr>
    <tr>
    <td width="40%"><b>Panas atau riwayat panas >= 38 C</b></td>
    <td width="60%">{{$reg->reg_gejpanas}}</td>
    </tr>
    <tr>
    <td width="40%"><b>Batuk</b></td>
    <td width="60%">{{$reg->reg_gejbatuk}}</td>
    </tr>
    <tr>
    <td width="40%"><b>Nyeri Tenggorokan</b></td>
    <td width="60%">{{$reg->reg_gejnyeritenggorokan}}</td>
    </tr>
    <tr>
    <td width="40%"><b>Sesak Nafas</b></td>
    <td width="60%">{{$reg->reg_gejsesaknafas}}</td>
    </tr>
    <tr>
        <td width="40%"><b>Pilek</b></td>
        <td width="60%">{{$reg->reg_gejpilek}}</td>
        </tr>
    <tr>
    <td width="40%"><b>Lesu</b></td>
    <td width="60%">{{$reg->reg_gejlesu}}</td>
    </tr>
    <tr>
    <td width="40%"><b>Sakit Kepala</b></td>
 <td width="60%">{{$reg->reg_gejsakitkepala}}</td>
    </tr>
    <tr>
    <td width="40%"><b>Diare</b></td>
    <td width="60%">{{$reg->reg_gejdiare}}</td>
    </tr>
    <tr>
    <td width="40%"><b>Mual / Muntah</b></td>
    <td width="60%">{{$reg->reg_gejmualmuntah}}</td>
    </tr>
    <tr>
    <td width="40%"><b>Gejala Lainnya</b></td>
    <td width="60%">{{$reg->reg_gejlain}}</td>
    </tr>
    </tbody>
    </table>     
    
<hr>
<h3 class="header-title mt-2 mb-2">Pemeriksaan Penunjang</h3>
<table class="table">
    <tbody>
    <tr>
    <td width="40%"><b>X-Ray Paru</b></td>
    <td width="60%">{{$reg->reg_xrayparu}}</td>
    </tr>
    <tr>
    <td width="40%"><b>Hasil X-Ray Paru</b></td>
    <td width="60%">{{$reg->reg_hasilxray}}</td>
    </tr>
    <tr>
    <td width="40%"><i>Hitung sel darah putih</i></td>
    </tr>
    <tr>
    <td width="40%"><b>Leukosit</b></td>
    <td width="60%">{{$reg->reg_leukosit}}</td>
    </tr>
    <tr>
    <td width="40%"><b>Limfosit</b></td>
    <td width="60%">{{$reg->reg_limfosit}}</td>
    </tr>
    <tr>
    <td width="40%"><b>Trombosit</b></td>
    <td width="60%">{{$reg->reg_trombosit}}</td>
    </tr>
    <tr>
    <td width="40%"><b>Menggunakan Ventilator</b></td>
    <td width="60%">{{$reg->reg_ventilator}}</td>
    </tr>
    <tr>
        <td width="40%"><b>Status Kesehatan Pasien</b></td>
        <td width="60%">{{$reg->reg_statuskes}}</td>
        </tr>
    <tr>
    
    </tbody>
    </table>                

    <hr>
    <h3 class="header-title mt-2 mb-2">Riwayat Kontak / Paparan</h3>
    <table class="table">
        <tbody>
        <tr>
        <td width="40%"><b>Dalam 14 hari sebelum sakit, apakah pasien melakukan perjalanan ke luar negeri?</b></td>
        <td width="60%">{{$reg->reg_luarnegri}}</td>
        </tr>
        
        </tbody>
        </table>     
        @if(!empty($historykunjungan))
        <table class="table">
         <thead>
             <tr>
                 <th>Tanggal Kunjungan</th>
                 <th>Kota</th>
                 <th>Negara</th>
             </tr>
         </thead>
           <tbody>
               @foreach($historykunjungan as $hk)
             <tr>
               <td>{{$hk->kun_tanggalkunjungan}}</td>
               <td>{{$hk->kun_kotakunjungan}}</td>
               <td>{{$hk->kun_negarakunjungan}}</td>
             </tr>
            @endforeach
           </tbody>
         </table>
 @else
 <p>Pasien tidak memiliki riwayat Kunjungan Luar Negri</p>
 @endif         
 <br>
 <table class="table">
    <tbody>
    <tr>
    <td width="40%"><b>Dalam 14 hari sebelum sakit, apakah pasien kontak dengan orang yang sakit?</b></td>
    <td width="60%">{{$reg->reg_kontakdgnsakit}}</td>
    </tr>
    </tbody>
    </table>         
    <br>
    @if(!empty($historykontak))
        <table class="table">
         <thead>
             <tr>
                 <th>Nama</th>
                 <th>Alamat</th>
                 <th>Hubungan</th>
                 <th>Tanggal Kontak</th>
             </tr>
         </thead>
           <tbody>
               @foreach($historykontak as $hk)
             <tr>
               <td>{{$hk->kon_namakon}}</td>
               <td>{{$hk->kon_alamatkon}}</td>
               <td>{{$hk->kon_hubungankon}}</td>
               <td>{{$hk->kon_tanggalkon}}</td>
             </tr>
            @endforeach
           </tbody>
         </table>
 @else
 <p>Pasien tidak memiliki riwayat kontak dengan yang lain</p>
 @endif      
 <br>
 <table class="table">
    <tbody>
    <tr>
    <td width="40%"><b>Apakah orang tersebut tersangka/terinfeksi Covid-19?</b></td>
    <td width="60%">{{$reg->reg_kontakterinfeksi}}</td>
    </tr>
    <tr>
    <td width="40%"><b>Apakah ada anggota keluarga pasien yang sakitnya sama?</b></td>
    <td width="60%">{{$reg->reg_keluargapasiensakitsama}}</td>
    </tr>
    </tbody>
    </table>       
    <hr>
    <h3 class="header-title mt-2 mb-2">Komorbid Pasien</h3>  
    <table class="table">
        <tbody>
        <tr>
        <td width="40%"><b>X-Ray Paru</b></td>
        <td width="60%">{{$reg->reg_xrayparu}}</td>
        </tr>
        <tr>
        <td width="40%"><b>Hasil X-Ray Paru</b></td>
        <td width="60%">{{$reg->reg_hasilxray}}</td>
        </tr>
        <tr>
        <td width="40%"><i>Hitung sel darah putih</i></td>
        </tr>
        <tr>
        <td width="40%"><b>Leukosit</b></td>
        <td width="60%">{{$reg->reg_leukosit}}</td>
        </tr>
        <tr>
        <td width="40%"><b>Limfosit</b></td>
        <td width="60%">{{$reg->reg_limfosit}}</td>
        </tr>
        <tr>
        <td width="40%"><b>Trombosit</b></td>
        <td width="60%">{{$reg->reg_trombosit}}</td>
        </tr>
        <tr>
        <td width="40%"><b>Menggunakan Ventilator</b></td>
        <td width="60%">{{$reg->reg_ventilator}}</td>
        </tr>
        <tr>
            <td width="40%"><b>Status Kesehatan Pasien</b></td>
            <td width="60%">{{$reg->reg_statuskes}}</td>
            </tr>
        <tr>
        
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