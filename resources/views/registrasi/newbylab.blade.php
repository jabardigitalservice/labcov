@extends('layouts.web')
@section('title','- Registrasi Baru')
@section('css')
<link rel="stylesheet" href="{{asset('assets/libs/smartwizard/smart_wizard.min.css')}}" type="text/css" />
@endsection
@section('content')

            <div class="content">
                <div class="container-fluid">
                    <div class="row page-title align-items-center">
                        <div class="col-sm-4 col-xl-6">
                            <h4 class="mb-1 mt-0">Registrasi Baru</h4>
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
<form method="POST" action="{{url('registrasi')}}">
    @csrf

    <div class="p-3">
        <div id="sw-default-step-1">
  <div class="form-group row mt-4">
      <label class="col-md-2">Nomor Registrasi</label>
      <div class="col-md-6">
     <input class="multisteps-form__input form-control" type="text" name="reg_no" placeholder="Nomor Registrasi" required/>
      </div>
    </div>
    <div class="form-group row mt-4">
      <label class="col-md-2">Nomor Sampel</label>
      <div class="col-md-6">
     <input class="multisteps-form__input form-control" type="text" name="reg_no" placeholder="Nomor Registrasi" required/>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-md-2 col-form-label" for="gejlain">Keterangan lainnya: (sebutkan informasi yang dianggap penting)</label>
      <div class="col-md-10">
<textarea class="form-control" rows="5" name="reg_penjelasanlain" id="penjelasanlain"></textarea>
      </div>
  </div>
  
  <div class="form-group row mt-4">
      <div class="col-md-12">
<button class="btn btn-md btn-primary" type="submit">Tambahkan Register</button>
      </div>
  </div>
    
        </div>
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

<script>
    function show1(){
  document.getElementById('ifcewe').style.display ='none';
};
function show2(){
  document.getElementById('ifcewe').style.display = 'block';
};
    $(document).ready(function(){
    $("#smartwizard-default").smartWizard(
        {useURLhash:!1,
            showStepURLhash:!1,
            lang: {  // Language variables
                next: 'Selanjutnya', 
                previous: 'Sebelumnya'
            }
        }
        );
 });
</script>
<script src="{{asset('assets/libs/flatpickr/flatpickr.min.js')}}"></script>
<script>
$("#tanggalrawat1").flatpickr();
$("#tanggalrawat2").flatpickr();
$("#tanggalrawat3").flatpickr();
$("#tanggalrawat4").flatpickr();
$("#tanggalrawat5").flatpickr();
$("#tanggalrawat6").flatpickr();
$("#tanggalrawat7").flatpickr();
$("#tanggalkunjungan1").flatpickr();
$("#tanggalkunjungan2").flatpickr();
$("#tanggalkunjungan3").flatpickr();
$("#tanggalkunjungan4").flatpickr();
$("#tanggalkunjungan5").flatpickr();
$("#tanggalkunjungan6").flatpickr();
$("#tanggalkunjungan7").flatpickr();
$("#tanggalkon1").flatpickr();
$("#tanggalkon2").flatpickr();
$("#tanggalkon3").flatpickr();
$("#tanggalkon4").flatpickr();
$("#tanggalkon5").flatpickr();
$("#tanggalkon6").flatpickr();
$("#tanggalkon7").flatpickr();
$("#tanggallahir").flatpickr();
$("#onsetpanas").flatpickr();
    function yesnoCheck(that) {
    if (that.value == "Other") {
        document.getElementById("ifYes").style.display = "block";
    } else {
        document.getElementById("ifYes").style.display = "none";
    }
}
</script>
@endsection

@endsection