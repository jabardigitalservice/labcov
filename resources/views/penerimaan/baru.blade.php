@extends('layouts.web')
@section('title','- Lengkapi Pengambilan Sampel')
@section('css')
<link rel="stylesheet" href="{{asset('assets/libs/smartwizard/smart_wizard.min.css')}}" type="text/css" />
@endsection
@section('content')

<div class="content">
                <div class="container-fluid">
                    <div class="row page-title align-items-center">
                         <div class="col-sm-4 col-xl-6">
                            <h4 class="mb-1 mt-0">Lengkapi Pengambilan / Penerimaan Sampel</h4>
                        </div>
                        <div class="col-sm-8 col-xl-6">
                           <a href="{{url('pengambilansampel')}}" class="btn btn-md btn-primary float-right"><i class="uil-arrow-left"></i> Kembali</a>
                        </div>
                    </div>

                    <!-- content -->
  <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-body">  
                @if(!is_null($pen->pen_noreg))
                <h4 class="header-title mt-0 mb-1">NOMOR REGISTRASI : #{{$pen->pen_noreg}}</h4>
                @endif
<form method="POST" action="{{url('pengambilansampel/savescanbarcode')}}">
    @csrf
    <input type="hidden" name="pen_id" value="{{$pen->pen_id}}">
    <div class="form-group row mt-4">
      <label class="col-md-2" >Sampel Diambil</label>
      <div class="col-md-6">
      <div class="form-check form-check-inline">
<input class="form-check-input" type="radio" id="sampeldiambilya" name="pen_sampel_diambil" value="1" @if($pen->pen_sampel_diambil == 1) checked @endif>
<label class="form-check-label" for="sampeldiambilya">Ya</label>
</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" id="sampeldiambilno" name="pen_sampel_diambil" value="0"  @if($pen->pen_sampel_diambil  == 0 && !is_null($pen->pen_sampel_diambil)) checked @endif>
<label class="form-check-label" for="sampeldiambilno">Tidak</label>
</div>
      </div>
    </div>

    <div class="form-group row mt-4">
      <label class="col-md-2" >Sampel Diterima</label>
      <div class="col-md-6">
      <div class="form-check form-check-inline">
<input class="form-check-input" type="radio" id="sampel_diterimaya" name="pen_sampel_diterima" value="1" @if($pen->pen_sampel_diterima == 1) checked @endif>
<label class="form-check-label" for="sampel_diterimaya">Ya</label>
</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" id="sampel_diterimano" name="pen_sampel_diterima" value="0" @if($pen->pen_sampel_diterima == 0 && !is_null($pen->pen_sampel_diterima)) checked @endif>
<label class="form-check-label" for="sampel_diterimano">Tidak</label>
</div>
      </div>
    </div>

    <div class="form-group row mt-4">
      <label class="col-md-2" >Sampel Diambil dari Fasyankes Rujukan</label>
      <div class="col-md-6">
      <div class="form-check form-check-inline">
<input class="form-check-input" type="radio" id="fas_rujukanya" name="pen_sampel_diterima_dari_fas_rujukan" value="1" @if($pen->pen_sampel_diterima_dari_fas_rujukan == 1) checked @endif>
<label class="form-check-label" for="fas_rujukanya">Ya</label>
</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" id="fas_rujukanno" name="pen_sampel_diterima_dari_fas_rujukan" value="0" @if($pen->pen_sampel_diterima_dari_fas_rujukan == 0 && !is_null($pen->pen_sampel_diterima_dari_fas_rujukan)) checked  @endif>
<label class="form-check-label" for="fas_rujukanno">Tidak</label>
</div>
      </div>
    </div>
    <div class="form-group row mt-4">
      <label class="col-md-2" >Petugas Penerima Sampel <small>Isi bila diterima dari fasyankes rujukan</small></label>
      <div class="col-md-6">
     <input class="form-control" type="text" name="pen_penerima_sampel" value="{{$pen->pen_penerima_sampel}}"/>
      </div>
    </div>
    
    <div class="form-group row">
      <label class="col-md-2 col-form-label" for="gejlain">Catatan Lain</label>
      <div class="col-md-10">
<textarea class="form-control" rows="5" name="pen_catatan">{{$pen->pen_catatan}}</textarea>
      </div>
  </div>
  
  <div class="form-group row">
      <label class="col-md-2 col-form-label" >Nomor Ekstraksi</label>
      <div class="col-md-10">
      <input class="form-control" type="text" name="pen_nomor_ekstraksi" value="{{$pen->pen_nomor_ekstraksi}}"/>
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
              <th>Aksi</th>
          </tr>
      </thead>
      <tbody class="field_wrapper">
        @foreach($sampel as $s)
      <tr>
        <td>
        
    <input type="hidden" name="eks_samid[]" value="{{$s->sam_id}}">
        <select class="form-control" name="eks_jenis_sampel[]">\
      <option value="{{$s->sam_jenis_sampel}}">@if($s->sam_jenis_sampel == 1)
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
               @elseif($s->sam_jenis_sampel == 12)
               Jenis Sampel Lainnya : {{$s->sam_namadiluarjenis}}
               @else
              @endif</option>
      <option value="1">Usap Nasofaring & Orofaring</option>
      <option value="2">Sputum</option>
      <option value="3">Bronchoalveolar Lavage</option>
      <option value="4">Tracheal Aspirate</option>
      <option value="5">Nasal Wash</option>
      <option value="6">Jaringan Biopsi/Otopsi</option>
      <option value="7">Serum Akut (kurang dari 7 hari demam)</option>
      <option value="8">Serum konvalesen (2-3 minggu demam)</option>
      <option value="9">Whole blood</option>
      <option value="10">Plasma</option>
      <option value="11">Fingerprick</option>
      <option value="12">Jenis Sampel Lainnya (Sebutkan)</option>
      </select>
      <input type="text" class="form-control"  name="eks_namadiluarjenis[]" value="{{$s->sam_namadiluarjenis}}">
      </td>
        <td><input type="text" class="form-control" name="eks_petugas_pengambil_sampel[]" value="{{$s->sam_petugas_pengambil_sampel}}"></td>
        <td><input type="text" class="form-control"  name="eks_tanggal_sampel[]" value="{{$s->sam_tanggal_sampel}}"></td>
        <td><input type="text" class="form-control"  name="eks_pukul_sampel[]" value="{{$s->sam_pukul_sampel}}"></td>
        <td><input type="text" class="form-control"  name="eks_barcodenomor_sampel[]" value="{{$s->sam_barcodenomor_sampel}}"></td>
        <td><button class="btn btn-sm btn-danger delete-sampel"><i class="uil-trash"></i></button></td>
      </tr>
      
      @endforeach
      </tbody>
  </table>
     

  <div class="form-group row mt-4">
    <div class="col-md-12">
<button class="btn btn-md btn-primary" type="submit">Ubah Status Sampel</button>
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
$(wrapper).append('<tr><td><select class="form-control" id="jenissampel" name="sam_jenis_sampel[]" ><option value="1">Usap Nasofaring & Orofaring</option><option value="2">Sputum</option><option value="3">Bronchoalveolar Lavage</option><option value="4">Tracheal Aspirate</option><option value="5">Nasal Wash</option><option value="6">Jaringan Biopsi/Otopsi</option><option value="7">Serum Akut (kurang dari 7 hari demam)</option><option value="8">Serum konvalesen (2-3 minggu demam)</option><option value="9">Whole blood</option><option value="10">Plasma</option><option value="11">Fingerprick</option><option value="12">Jenis Sampel Lainnya (Sebutkan)</option></select> <input type="text" class="form-control" placeholder="Nama jenis sampel lainnya" name="namadiluarjenis[]"></td><td><input class="form-control" type="text" name="petugas_pengambil[]" placeholder="Nama petugas pengambil"/></td><td><input class="form-control" type="text" name="tanggalsampel[]" placeholder="YYYY/MM/DD (contoh : 2020/09/21)"/></td><td><input class="form-control" type="text" name="pukulsampel[]" placeholder="JJ.MM (contoh 21.30)"/></td><td><input class="form-control" type="text" name="nomorsampel[]"/></td><td><button class="btn btn-sm btn-danger remove_field"><i class="uil-trash"></i></button></td></tr>');
}
});
$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
e.preventDefault(); $(this).parent().parent('tr').remove(); x--;
})

 });
</script>
<script>
</script>
@endsection

@endsection