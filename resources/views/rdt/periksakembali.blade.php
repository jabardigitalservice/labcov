@extends('layouts.web')
@section('title','- Ubah Pemeriksaan Sampel')
@section('css')
<link rel="stylesheet" href="{{asset('assets/libs/smartwizard/smart_wizard.min.css')}}" type="text/css" />
@endsection
@section('content')

            <div class="content">
                <div class="container-fluid">
                    <div class="row page-title align-items-center">
                         <div class="col-sm-4 col-xl-6">
                            <h4 class="mb-1 mt-0">Ubah Pemeriksaan Sampel</h4>
                        </div>
                        <div class="col-sm-8 col-xl-6">
                        <a href="{{url('pemeriksaansampel/pemeriksaandikembalikan')}}" class="btn btn-sm btn-primary float-right"><i class="uil-arrow-left"></i>Kembali</a>
                        <a href="{{url('pemeriksaansampel/kembalikan/'.$edit->pem_eksid)}}" class="btn btn-sm btn-danger float-right"><i class="uil-backward"></i> Kembalikan ke Lab Ekstraksi</a>
                        </div>
                    </div>


                    <!-- content -->
  <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-body">  
              @if(!is_null($edit->pem_noreg))
              <h4 class="header-title mt-0 mb-1">No. Registrasi : <u>#{{$edit->pem_noreg}}</u></h4>
              @else
             <p><span class="badge badge-danger">Identitas Pasien Belum Dimasukan Register</span></p>
              @endif
                
                <h4 class="header-title mt-0 mb-1">No. Ekstraksi : <u>{{$edit->pem_nomor_ekstraksi}}</u></h4>
<hr><form method="POST" action="{{url('pemeriksaansampel/periksaulang')}}" enctype="multipart/form-data">
    @csrf
    <p><b>Sampel yang diperiksa : <span class="badge badge-primary">Sampel #{{$edit->sam_barcodenomor_sampel}}</span>  (@if($edit->sam_jenis_sampel == 1)
                                                Usap Nasofaring & Orofaring
                                                @elseif($edit->sam_jenis_sampel == 2)
                                                Sputum
                                                @elseif($edit->sam_jenis_sampel == 3)
                                                Bronchoalveolar Lavage
                                                 @elseif($edit->sam_jenis_sampel == 4)
                                                 Tracheal Aspirate
                                                 @elseif($edit->sam_jenis_sampel == 5)
                                                 Nasal Wash
                                                 @elseif($edit->sam_jenis_sampel == 6)
                                                 Jaringan Biopsi/Otopsi
                                                 @elseif($edit->sam_jenis_sampel == 7)
                                                 Serum Akut (kurang dari 7 hari demam) 
                                                 @elseif($edit->sam_jenis_sampel == 8)
                                                 Serum konvalesen (2-3 minggu demam)
                                                 @elseif($edit->sam_jenis_sampel == 9)
                                                 Whole Blood
                                                 @elseif($edit->sam_jenis_sampel == 10)
                                                 Plasma
                                                 @elseif($edit->sam_jenis_sampel == 11)
                                                 Fingerprick 
                                                 @elseif($edit->sam_jenis_sampel == 12)
                                                 Jenis Sampel Lainnya : {{$edit->sam_namadiluarjenis}}
                                                 @else
                                                 Jenis Sampel Lainnya : {{$edit->sam_namadiluarjenis}}
                                                @endif)</b></p>
  
    @if(!is_null($edit->pem_noreg))
 <input type="hidden" name="pem_noreg" value="{{$edit->pem_noreg}}">
 @endif
    <div class="form-group row mt-4">
      <label class="col-md-2">Tanggal penerimaan sampel</label>
      <div class="col-md-6">
        <input class="form-control" type="text" id="tglpenerimaansampel" name="pem_tanggal_penerimaan_sampel"  value="{{$edit->pem_tanggal_penerimaan_sampel}}"/>
      </div>
    </div>

    <div class="form-group row mt-4">
      <label class="col-md-2" >Jam penerimaan sampel</label>
      <div class="col-md-6">
        <input class="form-control" type="text" name="pem_jam_penerimaan_sampel"  value="{{$edit->pem_jam_penerimaan_sampel}}"/>
      </div>
    </div>

    <div class="form-group row mt-4">
      <label class="col-md-2" >Laboratorium Penerima Sampel</label>
      <div class="col-md-6">
        <input class="form-check-input" id="unped" type="radio" name="pem_lab_penerima_sampel" value="Unpad"  @if($edit->pem_lab_penerima_sampel == "Unpad") checked @endif><label for="unped">Unpad</label>
        <br>
        <input class="form-check-input" id="labkes" type="radio" name="pem_lab_penerima_sampel" value="LABKES"  @if($edit->pem_lab_penerima_sampel == "LABKES") checked @endif><label for="labkes">LABKES</label>
        <br>
        <label>Lainnya, sebutkan nama lab <small>kosongkan jika terdapat pilihannya</small></label>
     <input class="form-control" type="text" name="pem_lab_penerima_sampel_lainnya" value="{{$edit->pem_lab_penerima_sampel_lainnya}}"/>
      </div>
    </div>

    <div class="form-group row mt-4">
      <label class="col-md-2" >Petugas penerima sampel RNA</label>
      <div class="col-md-6">
        <input class="form-control" type="text" name="pem_petugas_penerima_sampel_rna" value="{{$edit->pem_petugas_penerima_sampel_rna}}"/>
      </div>
    </div>
    

    <div class="form-group row mt-4">
      <label class="col-md-2" >Operator real time RPCR </label>
      <div class="col-md-6">
     <input class="form-control" type="text" name="pem_operator_real_time_pcr" value="{{$edit->pem_operator_real_time_pcr}}"/>
      </div>
    </div>

    <div class="form-group row mt-4">
      <label class="col-md-2">Tanggal mulai pemeriksaan</label>
      <div class="col-md-6">
        <input class="form-control" type="text" id="tglmulaipemeriksaan" name="pem_tanggal_mulai_pemeriksaan" value="{{$edit->pem_tanggal_mulai_pemeriksaan}}"/>
      </div>
    </div>
    <div class="form-group row mt-4">
      <label class="col-md-2" >Jam mulai PCR</label>
      <div class="col-md-6">
        <input class="form-control" type="text" name="pem_jam_mulai_pcr" value="{{$edit->pem_jam_mulai_pcr}}"/>
      </div>
    </div>
    <div class="form-group row mt-4">
      <label class="col-md-2" >Jam selesai PCR</label>
      <div class="col-md-6">
        <input class="form-control" type="text" name="pem_jam_selesai_pcr" value="{{$edit->pem_jam_selesai_pcr}}"/>
      </div>
    </div>
    
    <div class="form-group row mt-4">
      <label class="col-md-2" >Metode pemeriksaan </label>
      <div class="col-md-6">
     <input class="form-control" type="text" name="pem_metode_pemeriksaan" value="{{$edit->pem_metode_pemeriksaan}}"/>
      </div>
    </div>
    <div class="form-group row mt-4">
      <label class="col-md-2" >Nama kit pemeriksaan </label>
      <div class="col-md-6">
     <input class="form-control" type="text" name="pem_nama_kit_pemeriksaan" value="{{$edit->pem_nama_kit_pemeriksaan}}"/>
      </div>
    </div>

    <div class="form-group row mt-4">
      <label class="col-md-2" >Target gen </label>
      <div class="col-md-6">
     <input class="form-control" type="text" name="pem_target_gen" value="{{$edit->pem_target_gen}}"/>
      </div>
    </div>

    
    <div class="form-group row mt-4">
      <label class="col-md-2" >Hasil Deteksi</label>
      <div class="col-md-6">
        <div class="input-group">
          <div class="input-group-preppend">
            <span class="input-group-text">CT Value</span>
          </div>
          <input class="multisteps-form__input form-control" type="text" name="pem_hasil_deteksi" value="{{$edit->pem_hasil_deteksi}}"/>
      </div>
    </div>
  </div>

    <div class="form-group row mt-4">
      <label class="col-md-2" >Kesimpulan Pemeriksaan</label>
      <div class="col-md-6">
        <input class="form-check-input"  id="positif" type="radio" name="pem_kesimpulan_pemeriksaan" value="Positif" @if($edit->pem_kesimpulan_pemeriksaan == "Positif") checked @endif><label for="positif">Positif</label>
        <br>
        <input class="form-check-input" id="negatif" type="radio" name="pem_kesimpulan_pemeriksaan" value="Negatif" @if($edit->pem_kesimpulan_pemeriksaan == "Negatif") checked @endif><label for="negatif">Negatif</label>
      </div>
    </div>

    <div class="form-group row mt-4">
      <label class="col-md-2" >Gambar Grafik</label>
      <div class="col-md-6">
        <img src="{{asset($edit->pem_grafik)}}" id="preview" style="max-width:700px;max-height:300px;" />
        <input type="file" id="gambargrafik" name="grafik" class="validate" >
      </div>
    </div>

  
    <div class="form-group row mt-4">
      <label class="col-md-2 col-form-label">Catatan Lain</label>
      <div class="col-md-10">
<textarea class="form-control" rows="5" name="pem_catatan">{{$edit->pem_catatan}}</textarea>
      </div>
  </div>

  <input type="hidden" name="pem_id" value="{{$edit->pem_id}}">

  <hr>
<h5>Catatan Pengubahan</h5>
<p><b>Silahkan isi keterangan pengubahan ini, semua bentuk ubahan akan dicatat dan dapat dilihat oleh semua pihak. Silahkan berikan keterangan tentang apa yang diubah</b></p>

<div class="form-group row">
      <label class="col-md-2 col-form-label">Catatan Pengubahan <span style="color:red;"> *</span></label>
      <div class="col-md-10">
<textarea class="form-control" rows="5" name="note_isi" required></textarea>
      </div>
  </div>
  <input type="hidden" name="note_item_id" value="{{$edit->pem_id}}">
  <input type="hidden" name="note_item_type" value="2">
  <input type="hidden" name="note_userid" value="{{Auth::user()->id}}">


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
  
$("#tglmulaipemeriksaan").flatpickr();
</script>
@endsection
@endsection