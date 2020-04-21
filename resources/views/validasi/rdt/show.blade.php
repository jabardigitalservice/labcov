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
                          @if(is_null($validated))
                       <a href="{{url('validasi/kembalikan/'.$show->pem_id)}}" class="btn btn-md btn-danger float-right"><i class="uil-backward"></i> Kembalikan ke Lab Pemeriksaan</a>
                       @else
                       <a href="{{url('validasi/print/'.$validated->val_id)}}" class="btn btn-sm btn-primary float-right ml-2"><i class="uil-print"></i> Print / Download</a>
                       @endif
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
       @if($show->rapid_kesimpulan_rdt_1 == "Reaktif")
       <span class="badge badge-danger">Reaktif</span>
       @else
       <span class="badge badge-success">Non Reaktif</span>
       @endif
     </h2>
</div>
</div>     
</div>         
    <hr>
                                            <div class="row">
                                              <div class="col-md-12">
                                              <table class="table">
                                            <tbody>
            <tr>
              <td width="40%"><b>Nomor Registrasi</b></td>
              <td width="60%">@if(is_null($show->reg_no))
              <span class="badge badge-danger">Identitas Pasien belum dimasukan Register</span>
              @else
              {{$show->reg_no}}
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
        
       @if(is_null($validated))
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
<button class="btn btn-md btn-primary" type="submit">Validasi</button>
    </div>
</div>

  </form>
  @endif
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