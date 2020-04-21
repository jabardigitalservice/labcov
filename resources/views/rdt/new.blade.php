@extends('layouts.web')
@section('title','- Pencatatan RDT')
@section('content')

            <div class="content">
                <div class="container-fluid">
                    <div class="row page-title align-items-center">
                         <div class="col-sm-4 col-xl-6">
                            <h4 class="mb-1 mt-0">Pencatatan Rapid Diagnostic Test</h4>
                        </div>
                        <div class="col-sm-8 col-xl-6">
                        <a href="{{url('pemeriksaanrdt/')}}" class="btn btn-sm btn-primary float-right"><i class="uil-arrow-left"></i>Kembali</a>
                        </div>
                    </div>


                    <!-- content -->
  <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-body">
                @if(is_null($selected->pen_noreg))
                <p><span class="badge badge-danger">Identitas Pasien Belum Dimasukan Register</span></p>
                @else
                <h4 class="header-title mt-0 mb-1">No. Registrasi : <u>#{{$selected->pen_noreg}}</u></h4>
                <h4 class="header-title mt-0 mb-1">No. Induk Kependudukan : <u>{{$selected->pen_nik}}</u></h4>
                @endif
                <h4 class="header-title mt-0 mb-1">No. Ekstraksi : <u>{{$selected->pen_nomor_ekstraksi}}</u></h4>
<hr>
<form method="POST" action="{{url('pemeriksaanrdt/periksa')}}" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="rapid_penid" value="{{$selected->pen_id}}">
  @if(!is_null($selected->pen_noreg))
  <input type="hidden" name="rapid_noreg" value="{{$selected->pen_noreg}}">
  @endif
  @foreach($selected_sampel as $s)
  <div>  
    <div class="col-md-2">
     <input class="form-check-input" id="samid{{$s->sam_id}}" type="radio" name="rapid_sampel_id" value="{{$s->sam_id}}" required>
    </div>
    <div class="col-md-10">
     <div class="media mb-3">
         <div class="media-body row">
         <div class="col-md-6">
             <label class="mt-0 mb-1 font-size-16" for="samid{{$s->sam_id}}">Sampel No : #{{$s->sam_barcodenomor_sampel}}</label> <a data-samid="<b>Nomor Sampel</b> : #{{$s->sam_barcodenomor_sampel}}" data-petugas="<b>Petugas Pengambil Sampel</b> : {{$s->sam_petugas_pengambil_sampel}}" data-tanggal="<b>Tanggal Sampel</b> : {{$s->sam_tanggal_sampel}}" data-pukul="<b>Pukul Sampel</b> : {{$s->sam_pukul_sampel}}" id="modals" class="modals btn btn-xs btn-info"><i class="uil-search-alt"></i></a>
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
   
 </div>
 @endforeach
                            
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


  <div class="form-group row mt-4">
    <label class="col-md-2">Tanggal hari pertama demam</label>
    <div class="col-md-6">
      <input class="form-control" type="text" id="tgldemampertama" name="rapid_tanggal_pertama_demam" placeholder="YYYY/MM/DD"/>
    </div>
  </div>

  <div class="form-group row mt-4">
    <label class="col-md-2" >Test RDT ke <span style="color: red">*</span></label>
    <div class="col-md-6">
    <div class="form-check form-check-inline">
<input class="form-check-input" type="radio" id="rapid1" name="rapid_ke" value="1" required>
<label class="form-check-label" for="rapid1">Ke-1</label>
</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" id="rapid2" name="rapid_ke" value="2">
<label class="form-check-label" for="rapid2">Ke-2</label>
</div>
    </div>
  </div>

  <div class="form-group row mt-4">
    <label class="col-md-2">Tanggal dilakukannya tes RDT <span style="color: red">*</span></label>
    <div class="col-md-6">
      <input class="form-control" type="text" id="tglpemeriksaanrdt" name="rapid_tanggal_rdt_1" placeholder="YYYY/MM/DD"/>
    </div>
  </div>

  <div class="form-group row mt-4">
    <label class="col-md-2">Jam dilakukannya tes RDT </label>
    <div class="col-md-6">
      <input class="form-control" type="text" name="rapid_jam_rdt_1"/>
    </div>
  </div>


  <div class="form-group row mt-4">
    <label class="col-md-2" >Jenis Test RDT <span style="color: red">*</span></label>
    <div class="col-md-6">
    <div class="form-check form-check-inline">
<input class="form-check-input" type="radio" id="igg" name="rapid_jenistes" value="1" required>
<label class="form-check-label" for="igg">IgG</label>
</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" id="igm" name="rapid_jenistes" value="2">
<label class="form-check-label" for="igm">IgM</label>
</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" id="iggigm" name="rapid_jenistes" value="3">
<label class="form-check-label" for="iggigm">IgG/IgM</label>
</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" id="antigen" name="rapid_jenistes" value="4">
<label class="form-check-label" for="antigen">Antigen</label>
</div>
    </div>
  </div>

  <div class="form-group row mt-4">
    <label class="col-md-2 col-form-label" for="gejlain">Hasil test </label>
    <div class="col-md-10">
<textarea class="form-control" rows="2" name="hasiltest" placeholder="Keluaran hasil dari jenis test yang dipilih"></textarea>
    </div>
</div>

  <div class="form-group row mt-4">
    <label class="col-md-2" >Kesimpulan Tes RDT  <span style="color: red">*</span></label>
    <div class="col-md-6">
    <div class="form-check form-check-inline">
<input class="form-check-input" type="radio" id="reaktif" name="rapid_kesimpulan_rdt_1" value="Reaktif" required>
<label class="form-check-label" for="reaktif">Reaktif</label>
</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" id="nonreaktif" name="rapid_kesimpulan_rdt_1" value="Non Reaktif">
<label class="form-check-label" for="nonreaktif">Non Reaktif</label>
</div>
    </div>
  </div>
  
  <div class="form-group row mt-4">
    <label class="col-md-2 col-form-label" for="gejlain">Catatan Lain</label>
    <div class="col-md-10">
<textarea class="form-control" rows="5" name="rapid_catatan_1" placeholder="Catatan"></textarea>
    </div>
</div>

<div class="form-group row mt-4">
  <div class="col-md-12">
<button class="btn btn-md btn-primary" type="submit">Kirim</button>
  </div>
</div>

</form>
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
<script>

$("#tgldemampertama").flatpickr({maxDate: new Date(),dateFormat: "Y/m/d",allowInput: true});
$("#tglpemeriksaanrdt").flatpickr({maxDate: new Date(),dateFormat: "Y/m/d",allowInput: true});
</script>
@endsection

@endsection