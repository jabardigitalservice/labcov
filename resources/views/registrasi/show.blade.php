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
                <td width="40%"><b>>@if($reg->reg_jenisidentitas == "KTP")
                Nomor Induk Kependudukan
                @elseif($reg->reg_jenisidentitas == "SIM")
                Nomor Surat Izin Mengemudi
              @endif</b></td>
                <td width="60%">@if($reg->reg_jenisidentitas == "KTP")
                {{$reg->reg_nik}}
                @elseif($reg->reg_jenisidentitas == "SIM")
                {{$reg->reg_nosim}}
              @endif</td>
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
                <td width="60%">{{$reg->reg_alamat}}, {{$reg->reg_domisilikotakab}}, {{$reg->reg_domisilikecamatan}}, {{$reg->reg_domisilikelurahan}}</td>
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
<td width="60%">@if($reg->reg_nama_rs == "Other")
{{$reg->reg_nama_rs_lainnya}}
@else 
{{$reg->reg_nama_rs}}
@endif</td>
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
<h3 class="header-title mt-2 mb-2">Riwayat Perawatan Pasien</h3>
       <table class="table">
        <thead>
            <tr>
                <th>Kunjungan Ke</th>
                <th>Tanggal Dirawat</th>
                <th>Rumah Sakit / Fasyankes</th>
            </tr>
        </thead>
          <tbody>
            <tr>
              <td width="10%">{{$reg->reg_kunke}}</td>
              <td width="30%">{{$reg->reg_tanggalkunjungan}}</td>
              <td width="60%">{{$reg->reg_rsfasyankes}}</td>
            </tr>
            
          </tbody>
        </table>
<hr>
<h3 class="header-title mt-2 mb-2">Tanda dan Gejala</h3>
<table class="table">
    <tbody>
      @if(!is_null($reg_rdt))
      <tr>
    <td width="40%"><b>Pernah RDT?</b></td>
    <td width="60%">{{$reg_rdt->rar_pernah_rdt}}</td>
    </tr>
    <tr>
    <td width="40%"><b>Hasil RDT</b></td>
    <td width="60%">{{$reg_rdt->rar_hasil_rdt}}</td>
    </tr>
    <tr>
    <td width="40%"><b>Tanggal RDT</b></td>
    <td width="60%">{{$reg_rdt->rar_tanggal_rdt}}</td>
    </tr>
    <tr>
    <td width="40%"><b>Keterangan RDT</b></td>
    <td width="60%">{{$reg_rdt->rar_keterangan}}</td>
    </tr>
      @else
      @endif
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
    <tr>
    <td width="40%"><b>Tanda Pneumonia</b></td>
    <td width="60%">{{$reg->reg_gejpenumonia}}</td>
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
    <td width="60%">{{$reg->reg_leukosit}} /ul</td>
    </tr>
    <tr>
    <td width="40%"><b>Limfosit</b></td>
    <td width="60%">{{$reg->reg_limfosit}} /ul</td>
    </tr>
    <tr>
    <td width="40%"><b>Trombosit</b></td>
    <td width="60%">{{$reg->reg_trombosit}} /ul</td>
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
          <td width="40%"><b>Hasil Lab Lainnya</b></td>
          <td width="60%">{{$reg->reg_hasilllablainya}}</td>
          </tr>
    </tbody>
    </table>                

    <hr>
    <h3 class="header-title mt-2 mb-2">Riwayat Kunjungan Luar Negri</h3>
    <table class="table">
        <tbody>
        <tr>
        <td width="40%"><b>Dalam 14 hari sebelum sakit, apakah pasien melakukan perjalanan ke luar negeri?</b></td>
        <td width="60%">{{$reg->reg_luarnegri}}</td>
        </tr>
        
        </tbody>
        </table>     
        <table class="table">
         <thead>
             <tr>
                 <th>Tanggal Kunjungan</th>
                 <th>Kota</th>
                 <th>Negara</th>
             </tr>
         </thead>
           <tbody>
             <tr>
               <td>{{$reg->reg_tanggalkunjungan_pasien1}}</td>
               <td>{{$reg->reg_kotakunjungan_pasien1}}</td>
               <td>{{$reg->reg_negarakunjungan_pasien1}}</td>
             </tr>
             <tr>
               <td>{{$reg->reg_tanggalkunjungan_pasien2}}</td>
               <td>{{$reg->reg_kotakunjungan_pasien2}}</td>
               <td>{{$reg->reg_negarakunjungan_pasien2}}</td>
             </tr>
             <tr>
               <td>{{$reg->reg_tanggalkunjungan_pasien3}}</td>
               <td>{{$reg->reg_kotakunjungan_pasien3}}</td>
               <td>{{$reg->reg_negarakunjungan_pasien3}}</td>
             </tr>
             <tr>
               <td>{{$reg->reg_tanggalkunjungan_pasien4}}</td>
               <td>{{$reg->reg_kotakunjungan_pasien4}}</td>
               <td>{{$reg->reg_negarakunjungan_pasien4}}</td>
             </tr>
             <tr>
               <td>{{$reg->reg_tanggalkunjungan_pasien5}}</td>
               <td>{{$reg->reg_kotakunjungan_pasien5}}</td>
               <td>{{$reg->reg_negarakunjungan_pasien5}}</td>
             </tr>
             <tr>
               <td>{{$reg->reg_tanggalkunjungan_pasien6}}</td>
               <td>{{$reg->reg_kotakunjungan_pasien6}}</td>
               <td>{{$reg->reg_negarakunjungan_pasien6}}</td>
             </tr>
             <tr>
               <td>{{$reg->reg_tanggalkunjungan_pasien7}}</td>
               <td>{{$reg->reg_kotakunjungan_pasien7}}</td>
               <td>{{$reg->reg_negarakunjungan_pasien7}}</td>
             </tr>
           </tbody>
         </table>     
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
        <table class="table">
         <thead>
             <tr>
                 <th>Nama</th>
                 <th>Alamat</th>
                 <th>Hubungan</th>
                 <th>Kontak Pertama</th>
                 <th>Kontak Terakhir</th>
             </tr>
         </thead>
           <tbody>
             <tr>
               <td>{{$reg->reg_namakon1}}</td>
               <td>{{$reg->reg_alamatkon1}}</td>
               <td>{{$reg->reg_hubungankon1}}</td>
               <td>{{$reg->reg_tanggalkonawal1}}</td>
               <td>{{$reg->reg_tanggalkonakhir1}}</td>
             </tr>
             <tr>
               <td>{{$reg->reg_namakon2}}</td>
               <td>{{$reg->reg_alamatkon2}}</td>
               <td>{{$reg->reg_hubungankon2}}</td>
               <td>{{$reg->reg_tanggalkonawal2}}</td>
               <td>{{$reg->reg_tanggalkonakhir2}}</td>
             </tr>
             <tr>
               <td>{{$reg->reg_namakon3}}</td>
               <td>{{$reg->reg_alamatkon3}}</td>
               <td>{{$reg->reg_hubungankon3}}</td>
               <td>{{$reg->reg_tanggalkonawal3}}</td>
               <td>{{$reg->reg_tanggalkonakhir3}}</td>
             </tr>
             <tr>
               <td>{{$reg->reg_namakon4}}</td>
               <td>{{$reg->reg_alamatkon4}}</td>
               <td>{{$reg->reg_hubungankon4}}</td>
               <td>{{$reg->reg_tanggalkonawal4}}</td>
               <td>{{$reg->reg_tanggalkonakhir4}}</td>
             </tr>
             <tr>
               <td>{{$reg->reg_namakon5}}</td>
               <td>{{$reg->reg_alamatkon5}}</td>
               <td>{{$reg->reg_hubungankon5}}</td>
               <td>{{$reg->reg_tanggalkonawal5}}</td>
               <td>{{$reg->reg_tanggalkonakhir5}}</td>
             </tr>
             <tr>
               <td>{{$reg->reg_namakon6}}</td>
               <td>{{$reg->reg_alamatkon6}}</td>
               <td>{{$reg->reg_hubungankon6}}</td>
               <td>{{$reg->reg_tanggalkonawal6}}</td>
               <td>{{$reg->reg_tanggalkonakhir6}}</td>
             </tr>
             <tr>
               <td>{{$reg->reg_namakon7}}</td>
               <td>{{$reg->reg_alamatkon7}}</td>
               <td>{{$reg->reg_hubungankon7}}</td>
               <td>{{$reg->reg_tanggalkonawal7}}</td>
               <td>{{$reg->reg_tanggalkonakhir7}}</td>
             </tr>

           </tbody>
         </table>
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
        <td width="40%"><b>Penyakit Kardiovaskuler/Hipertensi</b></td>
        <td width="60%">{{$reg->reg_komorbidhipertensi}}</td>
        </tr>
        <tr>
        <td width="40%"><b>Diabetes Mellitus</b></td>
        <td width="60%">{{$reg->reg_komorbiddm}}</td>
        </tr>
        <tr>
        <td width="40%"><b>Liver</b></td>
        <td width="60%">{{$reg->reg_komorbidliver}}</td>
        </tr>
        <tr>
        <td width="40%"><b>Kronik neurologi / neuromuskula</b></td>
        <td width="60%">{{$reg->reg_komorbidneurologi}}</td>
        </tr>
        <tr>
        <td width="40%"><b>Imunodefisiensi / HIV</b></td>
        <td width="60%">{{$reg->reg_komorbidhiv}}</td>
        </tr>
        <tr>
        <td width="40%"><b>Penyakit paru kronik</b></td>
        <td width="60%">{{$reg->reg_komorbidparu}}</td>
        </tr>
        <tr>
        <td width="40%"><b>Penyakit Ginjal</b></td>
        <td width="60%">{{$reg->reg_komorbidginjal}}</td>
        </tr>
        
        <tr>
            <td width="40%"><b>Penjelasan Lain</b></td>
            <td width="60%">{{$reg->reg_penjelasanlain}}</td>
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