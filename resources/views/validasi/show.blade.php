@extends('layouts.web')
@section('title','- Detail Pemeriksaan Sampel')
@section('css')
@endsection
@section('content')

            <div class="content">
                <div class="container-fluid">
                    <div class="row page-title align-items-center">
                        <div class="col-sm-4 col-xl-6">
                            <a href="{{url('validasi/')}}" class="btn btn-xs btn-primary float-left mr-3"><i class="uil-arrow-left"></i></a> <h3 class="header-title  mb-1 mt-0">Detail Status </h3>
                        </div>
                        <div class="col-sm-8 col-xl-6">
                         <a href="{{url('validasi/verifikasi/'.$show->pem_id)}}" class="btn btn-md btn-info ml-2 float-right"><i class="uil-print"></i> Verifikasi / Setujui Pemeriksaan</a>
                       <a href="{{url('validasi/kembalikan/'.$show->pem_id)}}" class="btn btn-md btn-danger float-right"><i class="uil-backward"></i> Kembalikan ke Lab Pemeriksaan</a>
                        </div>
                    </div>

                    <!-- content -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">  
                                <div class="row">
                                  <div class="col-md-8">
                                    <h4 class="mt-0 mb-1">Detail Pemeriksaan Sampel </h4>
</div>
<div class="col-md-4">
<div class="float-right">
     <h2 class="mt-2 mb-2">
       @if($show->pem_kesimpulan_pemeriksaan == "Positif")
       <span class="badge badge-danger">Positif</span>
       @else
       <span class="badge badge-success">Negatif</span>
       @endif
     </h2>
</div>
</div>     
</div>         
    <hr>
                                            <div class="row">
                                              <div class="col-md-6">
                                            <table class="table">
          <tbody>
            <tr>
              <td width="40%"><b>Nomor Registrasi</b></td>
              <td width="60%">@if(is_null($show->reg_nik))
              <span class="badge badge-danger">Identitas Pasien belum dimasukan Register</span>
              @else
              {{$show->pem_noreg}}
              @endif</td>
            </tr>
            <tr>
                <td width="40%"><b>Nomor Induk Kependudukan</b></td>
                <td width="60%">@if(is_null($show->reg_nik))
              <span class="badge badge-danger">Identitas Pasien belum dimasukan Register</span>
              @else
              {{$show->reg_nik}}
              @endif</td>
              </tr>
              <tr>
                <td width="40%"><b>Sampel yang Diperiksa</b></td>
                <td width="60%"><span class="badge badge-primary">{{$show->sam_barcodenomor_sampel}}</span>
                </td>
              </tr>
              <tr>
                <td width="40%"><b>Jenis Sampel</b></td>
                <td width="60%">@if($show->sam_jenis_sampel == 1)
                  Usap Nasofaring & Orofaring
                  @elseif($show->sam_jenis_sampel == 2)
                  Sputum
                  @elseif($show->sam_jenis_sampel == 3)
                  Bronchoalveolar Lavage
                   @elseif($show->sam_jenis_sampel == 4)
                   Tracheal Aspirate
                   @elseif($show->sam_jenis_sampel == 5)
                   Nasal Wash
                   @elseif($show->sam_jenis_sampel == 6)
                   Jaringan Biopsi/Otopsi
                   @elseif($show->sam_jenis_sampel == 7)
                   Serum Akut (kurang dari 7 hari demam) 
                   @elseif($show->sam_jenis_sampel == 8)
                   Serum konvalesen (2-3 minggu demam)
                   @elseif($show->sam_jenis_sampel == 9)
                   Whole Blood
                   @elseif($show->sam_jenis_sampel == 10)
                   Plasma
                   @elseif($show->sam_jenis_sampel == 11)
                   Fingerprick 
                   @elseif($show->sam_jenis_sampel == 12)
                   Jenis Sampel Lainnya : {{$show->sam_namadiluarjenis}}
                   @else
                   Jenis Sampel Lainnya : {{$show->sam_namadiluarjenis}}
                  @endif
                 </td>
              </tr>
              <tr>
                <td width="40%"><b>Tanggal Penerimaan sampel</b></td>
                <td width="60%">{{$show->pem_tanggal_penerimaan_sampel}} pada {{$show->pem_jam_penerimaan_sampel}}</td>
              </tr>
              <tr>
                <td width="40%"><b>Petugas Penerima Sampel RNA</b></td>
                <td width="60%">{{$show->pem_petugas_penerima_sampel_rna}}</td>
              </tr>
              <tr>
                <td width="40%"><b>Lab Penerima</b></td>
                <td width="60%">
                @if(!is_null($show->pem_lab_penerima_sampel))
                {{$show->pem_lab_penerima_sampel}}
                @else
                {{$show->pem_lab_penerima_sampel_lainnya}}
                @endif</td>
</tr>
          </tbody>
        </table>
</div>
<div class="col-md-6">
<tr>
<table class="table">
          <tbody>
            <tr>
          <td width="40%"><b>Operator Realtime PCR</b></td>
                <td width="60%">{{$show->pem_operator_real_time_pcr}}</td>
              </tr>
              <tr>
                <td width="40%"><b>Tanggal Mulai Pemeriksaan</b></td>
                <td width="60%">{{$show->pem_tanggal_mulai_pemeriksaan }}</td>
              </tr>
              <tr>
                <td width="40%"><b>Jam Mulai Pemeriksaan</b></td>
                <td width="60%">{{$show->pem_jam_mulai_pcr }}</td>
              </tr>
              <tr>
                <td width="40%"><b>Jam Selesai Pemeriksaan</b></td>
                <td width="60%">{{$show->pem_jam_selesai_pcr }}</td>
              </tr>
              <tr>
                <td width="40%"><b>Metode Pemeriksaan</b></td>
                <td width="60%">{{$show->pem_metode_pemeriksaan}}</td>
              </tr>
              <tr>
                <td width="40%"><b>Nama Kit Pemeriksaan</b></td>
                <td width="60%">{{$show->pem_nama_kit_pemeriksaan}}</td>
              </tr>
              <tr>
                <td width="40%"><b>Target Gen</b></td>
                <td width="60%">{{$show->pem_target_gen}}</td>
              </tr>
              <tr>
                <td width="40%"><b>Hasil Deteksi</b></td>
                <td width="60%">CT Value {{$show->pem_hasil_deteksi }}</td>
              </tr>
          </tbody>
        </table>
            
</div>
</div>
<table class="table">
          <tbody>
            <tr>
                <td width="40%"><b>Catatan</b></td>
                <td width="60%">{{$show->pem_catatan}}</td>
              </tr>  
          </tbody>
        </table>
        
       
<hr>

<h3 class="header-title mt-2 mb-2">Setujui Pemeriksaan & Print Hasil</h3>

<form method="POST" action="{{url('validasi/verify')}}">
    @csrf
    <div class="form-group row mt-4">
                <label class="col-md-2">Pejabat yang Menandatangani Hasil Lab yang tercetak <span style="color:red;"> *</span></label>
                <div class="col-md-6">
                <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="drryan" name="val_ttd" value="1">
  <label class="form-check-label" for="drryan">dr. RYAN B. RISTANDI, Sp.PK., MMRS <br>NIP. 19820507 200902 1 004</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="drcut" name="val_ttd" value="2">
  <label class="form-check-label" for="drcut">dr. CUT NUR CINTHIA ALAMANDA, Sp.PK., M.Kes <br>NIP. 19740906 201412 2 001</label>
</div>
                </div>
              </div>
  <input type="hidden" name="val_pemid" value="{{$show->pem_id}}" >
  <input type="hidden" name="val_samid" value="{{$show->pem_samid}}" >
  <input type="hidden" name="val_noreg" value="{{$show->pem_noreg}}">
  <input type="hidden" name="val_userid" value="{{Auth::user()->id}}">
  <input type="hidden" name="val_status" value="1">


  <div class="form-group row mt-4">
    <div class="col-md-12">
<button class="btn btn-md btn-primary" type="submit">Kembalikan</button>
    </div>
</div>

  </form>
<hr>
<h3 class="header-title mt-2 mb-2">Riwayat Perubahan atau Pengiriman Kembali</h3>
@if(!empty($notes))
       <table class="table">
        <thead>
            <tr>
                <th>Tanggal Perubahan</th>
                <th>Keterangan</th>
                
            </tr>
        </thead>
          <tbody>
              @foreach($notes as $n)
            <tr>
              <td>{{$n->created_at}}</td>
              <td><p>{!! $n->note_isi !!}</p></td>
            
            </tr>
           @endforeach
          </tbody>
        </table>
@else
<p>Hasil Pemeriksaan ini belum pernah diubah atau belum ada pengiriman kembali</p>
@endif
</div>

</div>
    
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