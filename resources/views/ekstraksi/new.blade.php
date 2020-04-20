@extends('layouts.web')
@section('title','- Penerimaan dan Ekstraksi RNA Baru')
@section('css')
<link rel="stylesheet" href="{{asset('assets/libs/smartwizard/smart_wizard.min.css')}}" type="text/css" />
@endsection
@section('content')

            <div class="content">
                <div class="container-fluid">
                    <div class="row page-title align-items-center">
                         <div class="col-sm-4 col-xl-6">
                            <h4 class="mb-1 mt-0">Penerimaan dan Ekstraksi RNA Baru</h4>
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
                @if(is_null($selected->pen_noreg))
                <p><span class="badge badge-danger">Identitas Pasien Belum Dimasukan Register</span></p>
                @else
                <h4 class="header-title mt-0 mb-1">No. Registrasi : <u>#{{$selected->pen_noreg}}</u></h4>
                <h4 class="header-title mt-0 mb-1">No. Induk Kependudukan : <u>{{$selected->pen_nik}}</u></h4>
                @endif
                <h4 class="header-title mt-0 mb-1">No. Ekstraksi : <u>{{$selected->pen_nomor_ekstraksi}}</u></h4>
<hr>
<form method="POST" action="{{url('ekstraksi/pilih')}}">
    @csrf
    @if(!is_null($selected->pen_noreg))
    <input type="hidden" name="regno" value="{{$selected->pen_noreg}}">
    @endif
    <p><span class="badge badge-info">Pilih sampel untuk dikirimkan ke bagian pemeriksaan sampel</span></p>
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
    
    <input type="hidden" name="penid" value="{{$selected->pen_id}}">
 <div id="form-group row">
   <div class="col-md-2">
    <input class="form-check-input" id="samid{{$s->sam_id}}" type="radio" name="eks_samid" value="{{$s->sam_id}}" required>
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
 <input type="hidden" name="eks_penid" value="{{$selected->pen_id}}">
    <div class="form-group row mt-4">
      <label class="col-md-2">Tanggal penerimaan sampel <span style="color:red">*</span></label>
      <div class="col-md-6">
        <input class="form-control" type="text" id="tglpenerimaansampel" name="eks_tanggal_penerimaan_sampel" placeholder="YYYY/MM/DD"/>
      </div>
    </div>

    <div class="form-group row mt-4">
      <label class="col-md-2" >Jam penerimaan sampel <span style="color:red">*</span></label>
      <div class="col-md-6">
        <input class="form-control" type="text" name="eks_jam_penerimaan_sampel" placeholder="JJ:MM"/>
      </div>
    </div>

    <div class="form-group row mt-4">
      <label class="col-md-2" >Petugas penerima sampel <span style="color:red">*</span></label>
      <div class="col-md-6">
        <input class="form-control" type="text" name="eks_petugas_penerima_sampel" placeholder="Petugas penerima sampel"/>
      </div>
    </div>
    

    <div class="form-group row mt-4">
      <label class="col-md-2" >Operator ekstraksi <span style="color:red">*</span></label>
      <div class="col-md-6">
     <input class="form-control" type="text" name="eks_operator_ekstraksi" placeholder="Operator ekstraksi"/>
      </div>
    </div>

    <div class="form-group row mt-4">
      <label class="col-md-2">Tanggal mulai ekstraksi <span style="color:red">*</span></label>
      <div class="col-md-6">
        <input class="form-control" type="text" id="tglmulaiekstraksi" name="eks_tanggal_mulai_ekstraksi" placeholder="YYYY/MM/DD"/>
      </div>
    </div>
    <div class="form-group row mt-4">
      <label class="col-md-2" >Jam mulai ekstraksi <span style="color:red">*</span></label>
      <div class="col-md-6">
        <input class="form-control" type="text" name="eks_jam_mulai_ekstraksi" placeholder="JJ:MM"/>
      </div>
    </div>
    
    
    <div class="form-group row mt-4">
      <label class="col-md-2" >Metode ekstraksi <span style="color:red">*</span></label>
      <div class="col-md-6">
     <input class="form-control" type="text" name="eks_metode_ekstraksi" placeholder="Metode ekstraksi"/>
      </div>
    </div>
    <div class="form-group row mt-4">
      <label class="col-md-2" >Nama kit ekstraksi <span style="color:red">*</span></label>
      <div class="col-md-6">
     <input class="form-control" type="text" name="eks_nama_kit_ekstraksi" placeholder="Nama kit ekstraksi"/>
      </div>
    </div>
    <div class="form-group row mt-4">
      <label class="col-md-2" >Dikirim ke Lab <span style="color:red">*</span></label>
      <div class="col-md-6">
        <input class="form-check-input" type="radio" name="eks_dikirim_ke_lab" id="labunpad" value="Unpad" ><label for="labunpad">Unpad</label>
        <br>
        <input class="form-check-input" type="radio" name="eks_dikirim_ke_lab" id="lablabkes" value="LABKES" ><label for="lablabkes">LABKES</label>
        <br>
        <label>Lainnya, sebutkan nama lab <small>kosongkan jika terdapat pilihannya</small></label>
     <input class="form-control" type="text" name="eks_nama_lab_lain"/>
      </div>
    </div>

    <div class="form-group row mt-4">
      <label class="col-md-2" >Nama pengirim RNA <span style="color:red">*</span></label>
      <div class="col-md-6">
     <input class="form-control" type="text" name="eks_nama_pengirim_rna" placeholder="Nama pengirim RNA"/>
      </div>
    </div>

    <div class="form-group row mt-4">
      <label class="col-md-2" >Tanggal pengiriman RNA <span style="color:red">*</span></label>
      <div class="col-md-6">
     <input class="form-control" type="text" id="tanggalpengirimanrna" name="eks_tanggal_pengiriman_rna" placeholder="YYYY/MM/DD"/>
      </div>
    </div>

    <div class="form-group row mt-4">
      <label class="col-md-2" >Jam pengiriman RNA <span style="color:red">*</span></label>
      <div class="col-md-6">
     <input class="form-control" type="text" name="eks_jam_pengiriman_rna" placeholder="JJ:MM"/>
      </div>
    </div>


    <div class="form-group row">
      <label class="col-md-2 col-form-label" for="gejlain">Catatan Lain</label>
      <div class="col-md-10">
<textarea class="form-control" rows="5" name="eks_catatan" placeholder="Catatan"></textarea>
      </div>
  </div>
  


  <div class="form-group row mt-4">
    <div class="col-md-12">
<button class="btn btn-md btn-primary" type="submit">Pilih dan Kirim Sampel</button>
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
</script>
<script>
$("#tglpenerimaansampel").flatpickr({maxDate: new Date(),dateFormat: "Y/m/d",allowInput: true});
$("#tglmulaiekstraksi").flatpickr({maxDate: new Date(),dateFormat: "Y/m/d",allowInput: true});
$("#tanggalpengirimanrna").flatpickr({maxDate: new Date(),dateFormat: "Y/m/d",allowInput: true});
</script>
@endsection

@endsection