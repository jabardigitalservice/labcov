@extends('layouts.web')
@section('title','- Pengembalian Sampel')
@section('css')
<link rel="stylesheet" href="{{asset('assets/libs/smartwizard/smart_wizard.min.css')}}" type="text/css" />
@endsection
@section('content')

            <div class="content">
                <div class="container-fluid">
                    <div class="row page-title align-items-center">
                         <div class="col-sm-4 col-xl-6">
                            <h4 class="mb-1 mt-0">Pengembalian Sampel</h4>
                        </div>
                        <div class="col-sm-8 col-xl-6">
                           <a href="{{url('ekstraksi')}}" class="btn btn-md btn-primary float-right"><i class="uil-arrow-left"></i> Kembali</a>
                        </div>
                    </div>


                    <!-- content -->
  <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-body">  
              <h3 class="header-title mt-2 mb-2">Riwayat Pengubahan atau Pengiriman Kembali</h3>
@if(!empty($notes))
       <table class="table">
        <thead>
            <tr>
                <th>Tanggal Pengubahan</th>
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
<hr>
<form method="POST" action="{{url('ekstraksi/sampeldikembalikan/pilihulang')}}">
    @csrf
    <p><span class="badge badge-info">Pilih sampel untuk dikirimkan kembali</span> <span class="badge badge-warning">PERHATIAN : Status ini dikirimkan ulang oleh Lab Pemeriksaan, harap periksa kembali pilihan sampel sesuai dengan petunjuk dan alasan pengembalian Lab Pemeriksaan</span></p>
    <!-- <div id="form-group row mt-4">
      <div class="col-md-3">
        <input class="form-check-input" type="radio" name="samid" value="0" checked>
      </div>
      <div class="col-md-9">
       <div class="media mb-3">
           <div class="media-body">
               <h4 class="mt-0 mb-1 font-size-16">Tidak Pilih Sampel</h4>
           </div>
       </div>
     </div>
    </div> -->
    @foreach($selected_sampel as $s)
 <div id="form-group row">
   <div class="col-md-3">
    <input class="form-check-input" id="samid{{$s->sam_id}}" type="radio" name="eks_samid" value="{{$s->sam_id}}" required  @if($kirimulang->eks_samid == $s->sam_id) checked @endif>
   </div>
   <div class="col-md-9">
    <div class="media mb-3">
        <div class="media-body row">
        <div class="col-md-6">
           <p><label for="samid{{$s->sam_id}}" class="mt-0 mb-1 font-size-16">Sampel No : #{{$s->sam_barcodenomor_sampel}} </label> <a data-samid="<b>Nomor Sampel</b> : #{{$s->sam_barcodenomor_sampel}}" data-petugas="<b>Petugas Pengambil Sampel</b> : {{$s->sam_petugas_pengambil_sampel}}" data-tanggal="<b>Tanggal Sampel</b> : {{$s->sam_tanggal_sampel}}" data-pukul="<b>Pukul Sampel</b> : {{$s->sam_pukul_sampel}}" id="modals" class="modals btn btn-xs btn-info"><i class="uil-search-alt"></i></a></p>
            <p><span class="text-muted">@if($s->sam_jenis_sampel == 1)
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
               @else
               Jenis Sampel Lainnya : {{$s->sam_namadiluarjenis}}
              @endif</span></p>
             
        </div>
        
</div>
    </div>
  </div>
@endforeach
</div>
                                    
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
            <h5>Detail Sampel</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
          </div>
          <div class="modal-body">
              <p id="sam_id"></p>
              <p id="sam_petugas_pengambil_sampel"></p>
              <p id="tanggalsampel"></p>
              <p id="pukulsampel"></p>
          </div>
        
      </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>

  
 <input type="hidden" name="eks_noreg" value="{{$selected->pen_noreg}}">
 <input type="hidden" name="eks_nik" value="{{$selected->pen_nik}}">
 <input type="hidden" name="eks_id" value="{{$kirimulang->eks_id}}">
 <input type="hidden" name="oldsamid" value="{{$kirimulang->eks_samid}}">
    <div class="form-group row mt-4">
      <label class="col-md-2">Tanggal penerimaan sampel</label>
      <div class="col-md-6">
        <input class="form-control" type="text" id="tglpenerimaansampel" name="eks_tanggal_penerimaan_sampel" value="{{$kirimulang->eks_tanggal_penerimaan_sampel}}"/>
      </div>
    </div>

    <div class="form-group row mt-4">
      <label class="col-md-2" >Jam penerimaan sampem</label>
      <div class="col-md-6">
        <input class="form-control" type="text" name="eks_jam_penerimaan_sampel" value="{{$kirimulang->eks_jam_penerimaan_sampel}}"/>
      </div>
    </div>

    <div class="form-group row mt-4">
      <label class="col-md-2" >Petugas penerima sampel</label>
      <div class="col-md-6">
        <input class="form-control" type="text" name="eks_petugas_penerima_sampel" value="{{$kirimulang->eks_petugas_penerima_sampel}}"/>
      </div>
    </div>
    

    <div class="form-group row mt-4">
      <label class="col-md-2" >Operator ekstraksi</label>
      <div class="col-md-6">
     <input class="form-control" type="text" name="eks_operator_ekstraksi" value="{{$kirimulang->eks_operator_ekstraksi}}"/>
      </div>
    </div>

    <div class="form-group row mt-4">
      <label class="col-md-2">Tanggal mulai ekstraksi</label>
      <div class="col-md-6">
        <input class="form-control" type="text" id="tglmulaiekstraksi" name="eks_tanggal_mulai_ekstraksi" value="{{$kirimulang->eks_tanggal_mulai_ekstraksi}}"/>
      </div>
    </div>
    <div class="form-group row mt-4">
      <label class="col-md-2" >Jam mulai ekstraksi</label>
      <div class="col-md-6">
        <input class="form-control" type="text" name="eks_jam_mulai_ekstraksi" value="{{$kirimulang->eks_jam_mulai_ekstraksi}}"/>
      </div>
    </div>
    
    
    <div class="form-group row mt-4">
      <label class="col-md-2" >Metode ekstraksi</label>
      <div class="col-md-6">
     <input class="form-control" type="text" name="eks_metode_ekstraksi" value="{{$kirimulang->eks_metode_ekstraksi}}"/>
      </div>
    </div>
    <div class="form-group row mt-4">
      <label class="col-md-2" >Nama kit ekstraksi </label>
      <div class="col-md-6">
     <input class="form-control" type="text" name="eks_nama_kit_ekstraksi" value="{{$kirimulang->eks_nama_kit_ekstraksi}}"/>
      </div>
    </div>
    <div class="form-group row mt-4">
      <label class="col-md-2" >Dikirim ke Lab </label>
      <div class="col-md-6">
        <input class="form-check-input" type="radio" name="eks_dikirim_ke_lab" value="Unpad" @if($kirimulang->eks_dikirim_ke_lab == "Unpad") checked @endif><label>Unpad</label>
        <br>
        <input class="form-check-input" type="radio" name="eks_dikirim_ke_lab" value="LABKES" @if($kirimulang->eks_dikirim_ke_lab == "LABKES") checked @endif><label>LABKES</label>
        <br>
        <label>Lainnya, sebutkan nama lab <small>kosongkan jika terdapat pilihannya</small></label>
     <input class="form-control" type="text" name="eks_nama_lab_lain" @if(is_null($kirimulang->eks_dikirim_ke_lab)) {{$kirimulang->eks_nama_lab_lain}} @endif/>
      </div>
    </div>

    <div class="form-group row mt-4">
      <label class="col-md-2" >Nama pengirim RNA</label>
      <div class="col-md-6">
     <input class="form-control" type="text" name="eks_nama_pengirim_rna" value="{{$kirimulang->eks_nama_pengirim_rna}}"/>
      </div>
    </div>

    <div class="form-group row mt-4">
      <label class="col-md-2" >Tanggal pengiriman RNA</label>
      <div class="col-md-6">
     <input class="form-control" type="text" id="tanggalpengirimanrna" name="eks_tanggal_pengiriman_rna" value="{{$kirimulang->eks_tanggal_pengiriman_rna}}"/>
      </div>
    </div>

    <div class="form-group row mt-4">
      <label class="col-md-2" >Jam pengiriman RNA</label>
      <div class="col-md-6">
     <input class="form-control" type="text" name="eks_jam_pengiriman_rna" value="{{$kirimulang->eks_jam_pengiriman_rna}}"/>
      </div>
    </div>


    <div class="form-group row">
      <label class="col-md-2 col-form-label">Catatan Lain</label>
      <div class="col-md-10">
<textarea class="form-control" rows="5" name="eks_catatan" placeholder="Catatan">{{$kirimulang->eks_catatan}}</textarea>
      </div>
  </div>
  
<hr>
<h5>Catatan Pengubahan <span style="color:red">*</span></h5>
<p><b>Silahkan isi keterangan tentang pengubahan yang dibuat</b></p>

<div class="form-group row">
      <label class="col-md-2 col-form-label" for="gejlain">Catatan Pengubahan  <span style="color:red">*</span></label>
      <div class="col-md-10">
<textarea class="form-control" rows="5" name="note_isi" required></textarea>
      </div>
  </div>
  <input type="hidden" name="note_item_id" value="{{$kirimulang->eks_id}}">
  <input type="hidden" name="note_userid" value="{{Auth::user()->id}}">

<div class="form-group row mt-4">
    <div class="col-md-12">
<button class="btn btn-md btn-primary" type="submit">Kirim</button>
    </div>
</div>

  </form>
  <hr>

                                </div>
                            </div>
                        </div>

                    </div>

         

                </div>
            </div> <!-- content -->
          
@section('js')
<script src="{{asset('assets/libs/flatpickr/flatpickr.min.js')}}"></script>
<script>
    $(document).ready(function(){
  $(".modals").click(function(){
    document.getElementById("sam_id").innerHTML = this.getAttribute("data-samid"); 
    document.getElementById("sam_petugas_pengambil_sampel").innerHTML = this.getAttribute("data-petugas");
    document.getElementById("tanggalsampel").innerHTML = this.getAttribute("data-tanggal");
    document.getElementById("pukulsampel").innerHTML = this.getAttribute("data-pukul");
    $("#myModal").modal();
  });
});
</script>
</script>
<script>
$("#tglpenerimaansampel").flatpickr();
$("#tglmulaiekstraksi").flatpickr();
$("#tanggalpengirimanrna").flatpickr();
</script>
@endsection

@endsection