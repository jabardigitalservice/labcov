@extends('layouts.web')
@section('title','- Detail Ekstraksi & Pengiriman Sampel')
@section('css')
@endsection
@section('content')

            <div class="content">
                <div class="container-fluid">
                    <div class="row page-title align-items-center">
                        <div class="col-sm-4 col-xl-6">
                            <a href="{{url('ekstraksi/')}}" class="btn btn-xs btn-primary float-left mr-3"><i class="uil-arrow-left"></i></a> <h3 class="header-title  mb-1 mt-0">Detail Status </h3>
                        </div>
                        <div class="col-sm-8 col-xl-6">
                         <a href="{{url('ekstraksi/edit/'.$show->eks_id)}}" class="btn btn-sm btn-warning float-right"><i class="uil-edit"></i> Ubah</a>
                      
                        </div>
                    </div>

                    <!-- content -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">  
                                    <h4 class="mt-0 mb-1">Detail Ekstraksi & Pengiriman Sampel </h4>
                                    
    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3 class="header-title mt-2 mb-2">Informasi Ekstraksi & Pengiriman Sampel</h3>
                                            <table class="table">
          <tbody>
            <tr>
              <td width="40%"><b>Nomor Registrasi</b></td>
              <td width="60%">@if(is_null($show->eks_noreg))
              <span class="badge badge-danger">Identitas Pasien Belum Dimasukan Register</span>
              @else
              {{$show->eks_noreg}}
              @endif</td>
            </tr>
            <tr>
                <td width="40%"><b>Nomor Induk Kependudukan</b></td>
                <td width="60%">@if(is_null($show->eks_nik))
              <span class="badge badge-danger">Identitas Pasien Belum Dimasukan Register</span>
              @else
              {{$show->eks_noreg}}
              @endif</td>
              </tr>
              <tr>
                <td width="40%"><b>Sampel yang Dikirim</b></td>
                <td width="60%"><span class="badge badge-primary">{{$show->sam_barcodenomor_sampel}}</span>
                </td>
              </tr>
              <tr>
                <td width="40%"><b>Tanggal penerimaan sampel</b></td>
                <td width="60%">{{$show->eks_tanggal_penerimaan_sampel}} pada {{$show->eks_jam_penerimaan_sampel}}</td>
              </tr>
              <tr>
                <td width="40%"><b>Petugas Penerima Sampel</b></td>
                <td width="60%">{{$show->eks_petugas_penerima_sampel}}</td>
              </tr>
              <tr>
                <td width="40%"><b>Tanggal Mulai Ekstraksi</b></td>
                <td width="60%">{{$show->eks_tanggal_mulai_ekstraksi }} pada {{$show->eks_jam_mulai_ekstraksi}}</td>
              </tr>
              <tr>
                <td width="40%"><b>Metode Ekstraksi</b></td>
                <td width="60%">{{$show->eks_metode_ekstraksi}}</td>
              </tr>
              <tr>
                <td width="40%"><b>Nama Kit Ekstraksi</b></td>
                <td width="60%">{{$show->eks_nama_kit_ekstraksi}}</td>
              </tr>
              <tr>
                <td width="40%"><b>Dikirim ke Lab</b></td>
                <td width="60%">
                @if(!is_null($show->eks_dikirim_ke_lab))
                {{$show->eks_dikirim_ke_lab}}
                @else
                {{$show->eks_nama_lab_lain }}
                @endif</td>
              </tr>
              <tr>
                <td width="40%"><b>Nama Pengirim RNA</b></td>
                <td width="60%">{{$show->eks_nama_pengirim_rna }}</td>
              </tr>
              <tr>
                <td width="40%"><b>Tanggal Pengiriman RNA</b></td>
                <td width="60%">{{$show->eks_tanggal_pengiriman_rna }} pada {{$show->eks_jam_pengiriman_rna }}</td>
              </tr>
              <tr>
                <td width="40%"><b>Catatan</b></td>
                <td width="60%">{{$show->eks_catatan}}</td>
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
<p>Hasil Ekstraksi dan Pengiriman Sampel ini belum pernah diubah atau belum ada pengiriman kembali</p>
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