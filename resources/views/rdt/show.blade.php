@extends('layouts.web')
@section('title','- Detail Pemeriksaan Sampel RDT')
@section('css')
@endsection
@section('content')

            <div class="content">
                <div class="container-fluid">
                    <div class="row page-title align-items-center">
                        <div class="col-sm-4 col-xl-6">
                            <a href="{{url('pemeriksaanrdt/')}}" class="btn btn-xs btn-primary float-left mr-3"><i class="uil-arrow-left"></i></a> <h3 class="header-title  mb-1 mt-0">Detail Status </h3>
                        </div>
                        <div class="col-sm-8 col-xl-6">
                         <a href="{{url('pemeriksaanrdt/edit/'.$show->rapid_id)}}" class="btn btn-sm btn-warning float-right"><i class="uil-edit"></i> Ubah</a>
                       
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
              <td width="60%">@if(is_null($show->pen_noreg))
              <span class="badge badge-danger">Identitas Pasien belum dimasukan Register</span>
              @else
              {{$show->pen_noreg}}
              @endif</td>
            </tr>
            <tr>
                <td width="40%"><b>Nomor Induk Kependudukan</b></td>
                <td width="60%">@if(is_null($show->pen_nik))
              <span class="badge badge-danger">Identitas Pasien belum dimasukan Register</span>
              @else
              {{$show->pen_nik}}
              @endif</td>
              </tr>
              <tr>
                <td width="40%"><b>Sampel yang Diperiksa</b></td>
                <td width="60%"><span class="badge badge-primary">{{$show->sam_barcodenomor_sampel}}</span>
                (@if($show->sam_jenis_sampel == 9)
                  Whole Blood
                  @elseif($show->sam_jenis_sampel == 10)
                  Plasma
                  @elseif($show->sam_jenis_sampel == 11)
                  Fingerprick 
                  @elseif($show->sam_jenis_sampel == 12)
                  Jenis Sampel Lainnya : {{$show->sam_namadiluarjenis}}
                  @else
                  Jenis Sampel Lainnya : {{$show->sam_namadiluarjenis}}
                 @endif)
                </td>
              </tr>
              <tr>
                <td width="40%"><b>Tanggal Pertama Demam</b></td>
                <td width="60%">{{$show->rapid_tanggal_pertama_demam}}</td>
              </tr>
              <tr>
                <td width="40%"><b>Tanggal RDT</b></td>
                <td width="60%">{{$show->rapid_tanggal_rdt_1}}</td>
              </tr>
              <tr>
                <td width="40%"><b>RDT Ke</b></td>
                <td width="60%">{{$show->rapid_ke}}</td>
              </tr>
              <tr>
                <td width="40%"><b>Kesimpulan RDT</b></td>
                <td width="60%">@if($show->rapid_kesimpulan_rdt_1 == "Reaktif")
                  <span class="badge badge-danger">Reaktif</span>
                  @else
                  <span class="badge badge-success">Reaktif</span>
                  @endif
                </td>
              </tr>
             
              <tr>
                <td width="40%"><b>Jenis RDT</b></td>
                <td width="60%">@if($show->rapid_jenistes == 1) IgG 
@elseif($show->rapid_jenistes == 2) IgM
@elseif($show->rapid_jenistes == 3) IgG/IgM
@elseif($show->rapid_jenistes == 4) Antigen
@endif</td>
              </tr>
              <tr>
                <td width="40%"><b>Keterangan Hasil Tes</b></td>
                <td width="60%">@if($show->rapid_jenistes == 1) {{$show->rapid_igg_1}} 
@elseif($show->rapid_jenistes == 2){{$show->rapid_igm_1}}
@elseif($show->rapid_jenistes == 3){{$show->rapid_igg_igm_1}}
@elseif($show->rapid_jenistes == 4){{$show->rapid_antigen_1}}
@endif</td>
              </tr>
          
              <tr>
                <td width="40%"><b>Catatan</b></td>
                <td width="60%">{{$show->rapid_catatan_1}}</td>
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
    
});
                        </script>
@endsection

@endsection