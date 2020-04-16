@extends('layouts.web')
@section('title','- Pemeriksaan Sampel Baru')
@section('css')
<link rel="stylesheet" href="{{asset('assets/libs/smartwizard/smart_wizard.min.css')}}" type="text/css" />
@endsection
@section('content')

            <div class="content">
                <div class="container-fluid">
                    <div class="row page-title align-items-center">
                         <div class="col-sm-4 col-xl-6">
                            <h4 class="mb-1 mt-0">Pemeriksaan Sampel Baru</h4>
                        </div>
                        <div class="col-sm-8 col-xl-6">
                        <a href="{{url('pemeriksaansampel')}}" class="btn btn-sm btn-primary float-right"><i class="uil-arrow-left"></i>Kembali</a>
                        <a href="{{url('pemeriksaansampel/kembalikan/'.$periksa->pem_eksid)}}" class="btn btn-sm btn-danger float-right"><i class="uil-backward"></i> Kembalikan ke Lab Ekstraksi</a>
                        </div>
                    </div>


                    <!-- content -->
  <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-body">
              @if(!is_null($periksa->eks_noreg) && !is_null($periksa->eks_nik))
                <h4 class="header-title mt-0 mb-1">No. Registrasi : <u>#{{$periksa->eks_noreg}}</u></h4>
                <h4 class="header-title mt-0 mb-1">No. Induk Kependudukan : <u>{{$periksa->eks_nik}}</u></h4>
              @else
             <p> <span class="badge badge-danger">Identitas Pasien Belum Dimasukan Register</span></p>
              @endif
                <h4 class="header-title mt-0 mb-1">No. Ekstraksi : <u>{{$periksa->pen_nomor_ekstraksi}}</u></h4>
<hr>
<form method="POST" action="{{url('pemeriksaansampel/periksa')}}" enctype="multipart/form-data">
    @csrf
    <p><b>Sampel yang diperiksa : <span class="badge badge-primary">Sampel #{{$periksa->sam_barcodenomor_sampel}}</span></b></p>
  
    @if(!is_null($periksa->eks_noreg))
 <input type="hidden" name="pem_noreg" value="{{$periksa->eks_noreg}}">
 @endif
 <input type="hidden" name="pem_samid" value="{{$periksa->sam_id}}">
 <input type="hidden" name="pem_penid" value="{{$periksa->pen_id}}">
 <input type="hidden" name="pem_eksid" value="{{$periksa->eks_id}}">
    <div class="form-group row mt-4">
      <label class="col-md-2">Tanggal penerimaan sampel</label>
      <div class="col-md-6">
        <input class="form-control" type="text" id="tglpenerimaansampel" name="pem_tanggal_penerimaan_sampel" placeholder="YYYY/MM/DD"/>
      </div>
    </div>

    <div class="form-group row mt-4">
      <label class="col-md-2" >Jam penerimaan sampel</label>
      <div class="col-md-6">
        <input class="form-control" type="text" name="pem_jam_penerimaan_sampel" placeholder="JJ:MM"/>
      </div>
    </div>

    <div class="form-group row mt-4">
      <label class="col-md-2" >Laboratorium Penerima Sampel</label>
      <div class="col-md-6">
        <input class="form-check-input" id="unped" type="radio" name="pem_lab_penerima_sampel" value="Unpad" ><label for="unped">Unpad</label>
        <br>
        <input class="form-check-input" id="labkes" type="radio" name="pem_lab_penerima_sampel" value="LABKES" ><label for="labkes">LABKES</label>
        <br>
        <label>Lainnya, sebutkan nama lab <small>kosongkan jika terdapat pilihannya</small></label>
     <input class="form-control" type="text" name="pem_lab_penerima_sampel_lainnya"/>
      </div>
    </div>

    <div class="form-group row mt-4">
      <label class="col-md-2" >Petugas penerima sampel RNA</label>
      <div class="col-md-6">
        <input class="form-control" type="text" name="pem_petugas_penerima_sampel_rna" placeholder="Petugas penerima sampel"/>
      </div>
    </div>
    

    <div class="form-group row mt-4">
      <label class="col-md-2" >Operator rRT-PCR</label>
      <div class="col-md-6">
     <input class="form-control" type="text" name="pem_operator_real_time_pcr" placeholder="Operator rRT-PCR"/>
      </div>
    </div>

    <div class="form-group row mt-4">
      <label class="col-md-2">Tanggal mulai pemeriksaan</label>
      <div class="col-md-6">
        <input class="form-control" type="text" id="tglmulaipemeriksaan" name="pem_tanggal_mulai_pemeriksaan" placeholder="YYYY/MM/DD"/>
      </div>
    </div>
    <div class="form-group row mt-4">
      <label class="col-md-2" >Jam mulai rRT-PCR</label>
      <div class="col-md-6">
        <input class="form-control" type="text" name="pem_jam_mulai_pcr" placeholder="JJ:MM"/>
      </div>
    </div>
    <div class="form-group row mt-4">
      <label class="col-md-2" >Jam selesai rRT-PCR</label>
      <div class="col-md-6">
        <input class="form-control" type="text" name="pem_jam_selesai_pcr" placeholder="JJ:MM"/>
      </div>
    </div>
    
    <div class="form-group row mt-4">
      <label class="col-md-2" >Metode pemeriksaan </label>
      <div class="col-md-6">
     <input class="form-control" type="text" name="pem_metode_pemeriksaan" placeholder="Metode pemeriksaan"/>
      </div>
    </div>
    <div class="form-group row mt-4">
      <label class="col-md-2" >Nama kit pemeriksaan </label>
      <div class="col-md-6">
     <input class="form-control" type="text" name="pem_nama_kit_pemeriksaan" placeholder="Nama kit pemeriksaan"/>
      </div>
    </div>

    <div class="form-group row mt-4">
      <label class="col-md-2" >Target gen </label>
      <div class="col-md-6">
     <input class="form-control" type="text" name="pem_target_gen" placeholder="Target gen"/>
      </div>
    </div>

    
    <div class="form-group row mt-4">
      <label class="col-md-2" >Hasil Deteksi</label>
      <div class="col-md-6">
        <div class="input-group">
          <div class="input-group-preppend">
            <span class="input-group-text">CT Value</span>
          </div>
          <input class="multisteps-form__input form-control" type="text" name="pem_hasil_deteksi"/>
      </div>
    </div>
  </div>

    <div class="form-group row mt-4">
      <label class="col-md-2" >Kesimpulan Pemeriksaan</label>
      <div class="col-md-6">
        <input class="form-check-input" id="positif" type="radio" name="pem_kesimpulan_pemeriksaan" value="Positif" ><label for="positif">Positif</label>
        <br>
        <input class="form-check-input" id="negatif" type="radio" name="pem_kesimpulan_pemeriksaan" value="Negatif" ><label for="negatif">Negatif</label>
      </div>
    </div>

    <div class="form-group row mt-4">
      <label class="col-md-2" >Gambar Grafik</label>
      <div class="col-md-6">
        <img src="" id="preview" style="max-width:700px;max-height:300px;" />
        <input type="file" id="gambargrafik" name="grafik" class="validate" >
      </div>
    </div>

  
    <div class="form-group row mt-4">
      <label class="col-md-2 col-form-label" for="gejlain">Catatan Lain</label>
      <div class="col-md-10">
<textarea class="form-control" rows="5" name="pem_catatan" placeholder="Catatan"></textarea>
      </div>
  </div>

  <input type="hidden" name="penid" value="{{$periksa->pen_id}}">
  @if(!is_null($periksa->eks_noreg))
  <input type="hidden" name="regno" value="{{$periksa->pen_noreg}}">
  @endif

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
  
  function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
  
        reader.onload = function (e) {
            $('#preview').attr('src', e.target.result);
        }
  
        reader.readAsDataURL(input.files[0]);
    }
  }
  
  $("#gambargrafik").change(function () {
    readURL(this);
  });
$("#tglpenerimaansampel").flatpickr({maxDate: new Date(),dateFormat: "Y/m/d",allowInput: true});
$("#tglmulaipemeriksaan").flatpickr({maxDate: new Date(),dateFormat: "Y/m/d",allowInput: true});
</script>
@endsection

@endsection