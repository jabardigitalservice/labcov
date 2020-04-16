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
                           <a href="{{url('pemeriksaansampel')}}" class="btn btn-md btn-primary float-right"><i class="uil-arrow-left"></i> Kembali</a>
                        </div>
                    </div>
                    <!-- content -->
  <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-body">  
                <h4 class="header-title mt-0 mb-1"></h4>
<form method="POST" action="{{url('pemeriksaansampel/kembalikan')}}">
    @csrf
<h5>Kembalikan Sampel ke Ekstraksi</h5>
<p>Silahkan isi kotak isian ini dengan keterangan dan alasan yang jelas untuk mengembalikan sampel ke Lab Ekstraksi, setelah status sampel dikembalikan ke Ekstraksi, tidak bisa dikembalikan oleh Lab Pemeriksa</p>
<p><span class="badge badge-danger">Apabila formulir pemeriksaan sampel telah terisi untuk sampel ini, jika sampel dikembalikan hasil pemeriksaan akan terhapus</span>
<hr>
<p><b>Nomor Sampel :</b> <span class="badge badge-primary">{{$eksreturn->sam_barcodenomor_sampel}}</span></p>
<p><b>Jenis Sampel :</b> @if($eksreturn->sam_jenis_sampel == 1)
              Usap Nasofaring & Orofaring
              @elseif($eksreturn->sam_jenis_sampel == 2)
              Sputum
              @elseif($eksreturn->sam_jenis_sampel == 3)
              Bronchoalveolar Lavage
               @elseif($eksreturn->sam_jenis_sampel == 4)
               Tracheal Aspirate
               @elseif($eksreturn->sam_jenis_sampel == 5)
               Nasal Wash
               @elseif($eksreturn->sam_jenis_sampel == 6)
               Jaringan Biopsi/Otopsi
               @elseif($eksreturn->sam_jenis_sampel == 7)
               Serum Akut (kurang dari 7 hari demam) 
               @elseif($eksreturn->sam_jenis_sampel == 8)
               Serum konvalesen (2-3 minggu demam)
               @elseif($eksreturn->sam_jenis_sampel == 9)
               Whole Blood
               @elseif($eksreturn->sam_jenis_sampel == 10)
               Plasma
               @elseif($eksreturn->sam_jenis_sampel == 11)
               Fingerprick 
               @elseif($eksreturn->sam_jenis_sampel == 12)
               Jenis Sampel Lainnya : {{$eksreturn->sam_namadiluarjenis}}
               @else
               Jenis Sampel Lainnya : {{$eksreturn->sam_namadiluarjenis}}
              @endif</p>
<p><b>Nomor Ekstraksi : </b> {{$eksreturn->pen_nomor_ekstraksi}}</p>

<div class="form-group row">
      <label class="col-md-2 col-form-label">Catatan Pengembalian <span style="color:red;"> *</span></label>
      <div class="col-md-10">
<textarea class="form-control" rows="5" name="note_isi" required> Isi kondisi, alasan, dll</textarea>
      </div>
  </div>
  <input type="hidden" name="eks_id" value="{{$eksreturn->eks_id}}" >
  <input type="hidden" name="note_item_id" value="{{$eksreturn->eks_id}}" >
  <input type="hidden" name="note_item_type" value="22">
  <input type="hidden" name="note_userid" value="{{Auth::user()->id}}">
@if(!is_null($pem->pem_id) || isset($pem))
<input type="hidden" name="pemid" value="{{$pem->pem_id}}">
@endif

  <div class="form-group row mt-4">
    <div class="col-md-12">
<button class="btn btn-md btn-primary" type="submit">Kembalikan</button>
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