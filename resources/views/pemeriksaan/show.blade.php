@extends('layouts.web')
@section('title','- Detail Pemeriksaan Sampel')
@section('css')
@endsection
@section('content')

            <div class="content">
                <div class="container-fluid">
                    <div class="row page-title align-items-center">
                        <div class="col-sm-4 col-xl-6">
                            <a href="{{url('pemeriksaansampel/')}}" class="btn btn-xs btn-primary float-left mr-3"><i class="uil-arrow-left"></i></a> <h3 class="header-title  mb-1 mt-0">Detail Status </h3>
                        </div>
                        <div class="col-sm-8 col-xl-6">
                         <a href="{{url('pemeriksaansampel/edit/'.$show->pem_id)}}" class="btn btn-sm btn-warning float-right"><i class="uil-edit"></i> Ubah</a>
                        <a href="{{url('pemeriksaansampel/kembalikan/'.$show->pem_eksid)}}" class="btn btn-sm btn-danger float-right"><i class="uil-backward"></i> Kembalikan ke Lab Ekstraksi</a>
                        </div>
                    </div>

                    <!-- content -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">  
                                    <h4 class="mt-0 mb-1">Detail Pemeriksaan Sampel </h4>
                                    
    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3 class="header-title mt-2 mb-2">Informasi Pemeriksaan Sampel</h3>
                                            <table class="table">
          <tbody>
            <tr>
              <td width="40%"><b>Nomor Registrasi</b></td>
              <td width="60%">@if(is_null($show->pem_noreg))
              <span class="badge badge-danger">Identitas Pasien belum dimasukan Register</span>
              @else
              {{$show->pem_noreg}}
              @endif</td>
            </tr>
            <tr>
                <td width="40%"><b>Nomor Induk Kependudukan</b></td>
                <td width="60%">@if(is_null($show->eks_nik))
              <span class="badge badge-danger">Identitas Pasien belum dimasukan Register</span>
              @else
              {{$show->pem_noreg}}
              @endif</td>
              </tr>
              <tr>
                <td width="40%"><b>Sampel yang Diperiksa</b></td>
                <td width="60%"><span class="badge badge-primary">{{$show->sam_barcodenomor_sampel}}</span>
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
              <tr>
                <td width="40%"><b>Grafik</b></td>
                <td width="60%"><img src="{{asset($show->pem_grafik)}}" class="img-fluid"></td>
              </tr>
              <tr>
                <td width="40%"><b>Catatan</b></td>
                <td width="60%">{{$show->pem_catatan}}</td>
              </tr>
          </tbody>
        </table>
        
</div>
</div>
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