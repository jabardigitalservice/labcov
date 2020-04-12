@extends('layouts.web')
@section('title','- Pengambilan / Penerimaan Sampel Baru')
@section('css')
<link rel="stylesheet" href="{{asset('assets/libs/smartwizard/smart_wizard.min.css')}}" type="text/css" />
@endsection
@section('content')

            <div class="content">
                <div class="container-fluid">
                    <div class="row page-title align-items-center">
                         <div class="col-sm-4 col-xl-6">
                            <h4 class="mb-1 mt-0">Pengambilan / Penerimaan Sampel Baru</h4>
                        </div>
                        <div class="col-sm-8 col-xl-6">
                           <a href="{{url('registrasi')}}" class="btn btn-md btn-primary float-right"><i class="uil-arrow-left"></i> Kembali</a>
                        </div>
                    </div>

                    <!-- content -->
  <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-body">  
                <h4 class="header-title mt-0 mb-1">No. Registrasi : #{{$selected_reg->reg_no}}</h4>
                <h4 class="header-title mt-0 mb-1">No. Induk Kependudukan : {{$selected_reg->reg_no}}</h4>
<form method="POST" action="{{url('pengambilansampel/ambil')}}">
    @csrf
 <input type="hidden" name="pen_noreg" value="{{$selected_reg->reg_no}}">
 
 <input type="hidden" name="pen_nik" value="{{$selected_reg->reg_nik}}">
    <div class="form-group row mt-4">
      <label class="col-md-2" >Sampel Diambil</label>
      <div class="col-md-6">
      <div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="pen_sampel_diambil" value="1" >
<label class="form-check-label">Ya</label>
</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="pen_sampel_diambil" value="0" >
<label class="form-check-label">Tidak</label>
</div>
      </div>
    </div>

    <div class="form-group row mt-4">
      <label class="col-md-2" >Sampel Diterima</label>
      <div class="col-md-6">
      <div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="pen_sampel_diterima" value="1" >
<label class="form-check-label">Ya</label>
</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="pen_sampel_diterima" value="0" >
<label class="form-check-label">Tidak</label>
</div>
      </div>
    </div>

    <div class="form-group row mt-4">
      <label class="col-md-2" >Sampel Diambil dari Fasyankes Rujukan</label>
      <div class="col-md-6">
      <div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="pen_sampel_diterima_dari_fas_rujukan" value="1" >
<label class="form-check-label">Ya</label>
</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="pen_sampel_diterima_dari_fas_rujukan" value="0" >
<label class="form-check-label">Tidak</label>
</div>
      </div>
    </div>
    

    <div class="form-group row mt-4">
      <label class="col-md-2" >Petugas Penerima Sampel <small>Isi bila diterima dari fasyankes rujukan</small></label>
      <div class="col-md-6">
     <input class="form-control" type="text" name="pen_penerima_sampel " placeholder="Nama Petugas Penerima Sampel"/>
      </div>
    </div>
    
    <div class="form-group row">
      <label class="col-md-2 col-form-label" for="gejlain">Catatan Lain</label>
      <div class="col-md-10">
<textarea class="form-control" rows="5" name="pen_catatan" placeholder="Catatan(Catat bila kualitas sampel kurang baik, jumlah material terlalu sedikit, pengepakan atau pengiriman sampel kurang layak, atau pengambilan serum akut/konvalesen tidak sesuai rentang waktu, dll)"></textarea>
      </div>
  </div>
  
  <div class="form-group row">
      <label class="col-md-2 col-form-label" >Nomor Ekstraksi</label>
      <div class="col-md-10">
      <input class="form-control" type="text" name="pen_nomor_sampel" placeholder="Nomor Ekstraksi"/>
      </div>
  </div>
    <hr>
    <h4 class="mb-1 mt-0">Sampel</h4>
    <p>Dibawah ini adalah sampel yang diambil atau diterima, klik tambahkan sesuai dengan banyaknya sampel</p>
    <button class="btn btn-sm btn-primary" id="tambah">Tambah Sampel</button>
    <table class="table table-striped dt-responsive table-bordered" style="width:100%">
      <thead>
          <tr>
              <th>Jenis Sampel</th>
              <th>Petugas pengambil sampel</th>
              <th>Tanggal</th>
              <th>Pukul</th>
              <th>Nomor sampel</th>
          </tr>
      </thead>
      <tbody class="field_wrapper">
       
      </tbody>
  </table>
     

  <div class="form-group row mt-4">
    <div class="col-md-12">
<button class="btn btn-md btn-primary" type="submit">Tambahkan Status Sampel</button>
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
   
var max_fields = 10; //maximum input boxes allowed
var wrapper = $(".field_wrapper"); //Fields wrapper
var add_button = $("#tambah"); //Add button ID
var x = 1; //initlal text box count
$(add_button).click(function(e){ //on add input button click
e.preventDefault();
if(x <= max_fields){ //max input box allowed
x++; //text box increment
$(wrapper).append('<tr><td><select class="form-control" id="jenissampel" name="sam_jenis_sampel[]" ><option value="1">Usap Nasofaring & Orofaring</option><option value="2">Sputum</option><option value="3">Bronchoalveolar Lavage</option><option value="4">Tracheal Aspirate</option><option value="5">Nasal Wash</option><option value="6">Jaringan Biopsi/Otopsi</option><option value="7">Serum Akut (kurang dari 7 hari demam)</option><option value="8">Serum konvalesen (2-3 minggu demam)</option><option value="9">Whole blood</option><option value="10">Plasma</option><option value="11">Fingerprick</option><option value="12">Jenis Sampel Lainnya (Sebutkan)</option></select><div id="othertype"><small for="specify">Jenis Lainnya (isi apabila tidak tercantum diatas)</small><input type="text" class="form-control" name="sam_namadiluarjenis[]" placeholder="isi apabila tidak tercantum"/></div></td><td><input class="form-control" type="text" name="petugas_pengambil[]"/></td><td><input class="form-control" type="text" name="tanggalsampel[]"/></td><td><input class="form-control" type="text" name="pukulsampel[]"/></td><td><input class="form-control" type="text" name="nomorsampel[]"/></td><td><button class="btn btn-sm btn-danger remove_field"><i class="uil-trash"></i></button></td></tr>');
}
});
$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
e.preventDefault(); $(this).parent().parent('tr').remove(); x--;
})
 });
</script>
<script>
$("#tanggallahir").flatpickr();
$("#onsetpanas").flatpickr();
</script>
@endsection

@endsection