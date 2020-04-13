@extends('layouts.web')
@section('title','- Ubah data Registrasi')
@section('css')
<link rel="stylesheet" href="{{asset('assets/libs/smartwizard/smart_wizard.min.css')}}" type="text/css" />
@endsection
@section('content')

            <div class="content">
                <div class="container-fluid">
                    <div class="row page-title align-items-center">
                        <div class="col-sm-4 col-xl-6">
                            <h4 class="mb-1 mt-0">Edit Register #{{$edit->reg_no}}</h4>
                        </div>
                        <div class="col-sm-8 col-xl-6">
                           <a href="{{url('registrasi/')}}" class="btn btn-md btn-primary float-right"><i class="uil-arrow-left"></i> Kembali</a>
                        </div>
                    </div>

                    <!-- content -->
  <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-body">  
<form method="POST" action="{{url('registrasi/'.$edit->regid)}}">
    @csrf
<div id="smartwizard-default">
    <ul>
        <li><a href="#sw-default-step-1">Identitas Pengirim<small class="d-block">Identitas Pengirim Spesimen</small></a></li>
        <li><a href="#sw-default-step-2">Identitas Pasien<small class="d-block">Informasi Pasien</small></a></li>
        <li><a href="#sw-default-step-3">Tanda dan Gejala<small class="d-block">Gejala Pasien</small></a></li>
        <li><a href="#sw-default-step-4">Pemeriksaan Penunjang<small class="d-block">Pemeriksaan Pasien</small></a></li>
        <li><a href="#sw-default-step-5">Riwayat Kontak<small class="d-block">Riwayat Kontak Pasien</small></a></li>
        <li><a href="#sw-default-step-6">Penyakit Penyerta<small class="d-block">Komorbid Pasien</small></a></li>
    </ul>
    <div class="p-3">
        <div id="sw-default-step-1">
  <div class="form-group row mt-4">
      <label class="col-md-2">Nomor Registrasi</label>
      <div class="col-md-6">
     <input class="multisteps-form__input form-control" type="text" name="reg_no" value="{{$edit->reg_no}}" required/>
      </div>
    </div>
      <div class="form-group row mt-4">
      <label class="col-md-2" for="dinkespengirim">Dinkes Pengirim</label>
      <select class="multisteps-form__input form-control col-md-6" id="dinkespengirim" name="reg_dinkes_pengirim" onchange="dinkesotheroptionselect(this);">
      <option value="{{$edit->reg_dinkes_pengirim}}" selected>{{$edit->reg_dinkes_pengirim}}</option>  
      <option value="Kota Bandung">Kota Bandung</option>
          <option value="Kabupaten Bandung">Kabupaten Bandung</option>
          <option value="Kabupaten Bandung Barat">Kabupaten Bandung Barat</option>
          <option value="Kota Banjar">Kota Banjar</option>
          <option value="Kota Cimahi">Kota Cimahi</option>
          <option value="Kabupaten Bekasi">Kabupaten Bekasi</option>
          <option value="Kota Bekasi">Kota Bekasi</option>
          <option value="Kabupaten Bogor">Kabupaten Bogor</option>
          <option value="Kota Bogor">Kota Bogor</option>
          <option value="Kabupaten Ciamis">Kabupaten Ciamis</option>
          <option value="Kabupaten Cianjur">Kabupaten Cianjur</option>
          <option value="Kabupaten Cirebon">Kabupaten Cirebon</option>
          <option value="Kota Cirebon">Kota Cirebon</option>
          <option value="Kota Depok">Kota Depok</option>
          <option value="Kabupaten Garut">Kabupaten Garut</option>
          <option value="Kabupaten Indramayu">Kabupaten Indramayu</option>
          <option value="Kabupaten Karawang">Kabupaten Karawang</option>
          <option value="Kabupaten Kuningan">Kabupaten Kuningan</option>
          <option value="Kabupaten Majalengka">Kabupaten Majalengka</option>
          <option value="Kabupaten Pangandaran">Kabupaten Pangandaran</option>
          <option value="Kabupaten Purwakarta">Kabupaten Purwakarta</option>
          <option value="Kabupaten Subang">Kabupaten Subang</option>
          <option value="Kabupaten Sukabumi">Kabupaten Sukabumi</option>
          <option value="Kota Sukabumi">Kota Sukabumi</option>
          <option value="Kabupaten Sumedang">Kabupaten Sumedang</option>
          <option value="Kota Tasikmalaya">Kota Tasikmalaya</option>
          <option value="Kabupaten Tasikmalaya">Kabupaten Tasikmalaya</option>
          <option value="Other">Luar Provinsi Jawa Barat, Sebutkan</option>
        </select>
  </div>

  <div class="mt-4" id="inputdaerahlain" style="display: none;">
    <div class="form-group row">
      <label class="col-md-2"></label>
      <div class="col-md-6">
        <input class="multisteps-form__input form-control" type="text" id="daerahlain" name="daerahlain"  value="{{$edit->daerahlain}}"/>
      </div>
    </div>
  </div>
    <div class="form-group row mt-4">
      <label class="col-md-2">Fasyankes Pengirim</label>
      <div class="col-md-6">
      <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="reg_fasyankes_pengirim" id="fasyanrs" value="Rumah Sakit" @if($edit->reg_fasyankes_pengirim == "Rumah Sakit") checked @endif>
          <label class="form-check-label" for="fasyanrs">Rumah Sakit</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="reg_fasyankes_pengirim" id="fasyandinkes" value="Dinkes" @if($edit->reg_fasyankes_pengirim == "Dinkes") checked @endif>
          <label class="form-check-label" for="fasyandinkes">Dinkes</label>
        </div>
      </div>
    </div>
        
    <div class="form-group row mt-4">
      <label class="col-md-2">Nama Rumah Sakit / Fasyankes</label>
      <div class="col-md-6">
      <select class="multisteps-form__input form-control col-md-6" id="rsfasyankes" name="reg_nama_rs" onchange="rsotheroptionselect(this);">
      <option value="{{$edit->reg_nama_rs}}" selected>{{$edit->reg_nama_rs}}</option> 
          <option value="RSUP Dr. Hasan Sadikin">RSUP Dr. Hasan Sadikin</option>
          <option value="RSP Dr. H.A. Rotinsulu">RSP Dr. H.A. Rotinsulu</option>
          <option value="RSP Dr. Goenawan P"> RSP Dr. Goenawan P</option>
          <option value="RSUD Dr. Slamet">RSUD Dr. Slamet</option>
          <option value="RSUD R. Syamsudin, SH">RSUD R. Syamsudin, SH</option>
          <option value="RSUD Indramayu">RSUD Indramayu</option>
          <option value="RSUD Gunungjati">RSUD Gunungjati</option>
          <option value="Rumkit Tk. ll Dustira">Rumkit Tk. ll Dustira</option>
          <option value="RSUD Cibinong">RSUD Cibinong</option>
          <option value="RSUD Ciawi">RSUD Ciawi</option>
          <option value="RSUD Cibabat">RSUD Cibabat</option>
          <option value="RSUD Kota Bogor">RSUD Kota Bogor</option>
          <option value="RSUD Al Ihsan">RSUD Al Ihsan</option>
          <option value="RS Bhayangkara Sartika Asih">RS Bhayangkara Sartika Asih</option>
          <option value="RSUD dr. Soekardjo">RSUD dr. Soekardjo</option>
          <option value="RSUD SMC Kab. Tasik">RSUD SMC Kab. Tasik</option>
          <option value="RS Paru Prov. Jabar Sidawangi">RS Paru Prov. Jabar Sidawangi</option>
          <option value="RSUD Bayu Asih">RSUD Bayu Asih</option>
          <option value="RSUD Karawang">RSUD Karawang</option>
          <option value="RSUD Sekarwangi">RSUD Sekarwangi</option>
          <option value="RSUD Subang">RSUD Subang</option>
          <option value="RSUD Waled">RSUD Waled</option>
          <option value="RSUD Arjawinangun">RSUD Arjawinangun</option>
          <option value="RSUD 45 Kuningan">RSUD 45 Kuningan</option>
          <option value="RSUD Kab Bekasi">RSUD Kab Bekasi</option>
          <option value="RSUD Sumedang">RSUD Sumedang</option>
          <option value="RSUD Banjar">RSUD Banjar</option>
          <option value="RSUD Ciamis">RSUD Ciamis</option>
          <option value="RSUD Cideres">RSUD Cideres</option>
          <option value="RSUD Majalaya">RSUD Majalaya</option>
          <option value="RS Lanud dr. M. Salamun">RS Lanud dr. M. Salamun</option>
          <option value="RSUD Kota Depok">RSUD Kota Depok</option>
          <option value="RSUD Sayang">RSUD Sayang</option>
          <option value="RSUD dr. Chasbullah A">RSUD dr. Chasbullah A</option>
          <option value="Other">RS Lainnya, Sebutkan</option>
        </select>
      </div>
    </div>
    <div class="mt-4" id="inputrslain" style="display: none;">
      <div class="form-group row">
        <label class="col-md-2"></label>
        <div class="col-md-6">
          <input class="multisteps-form__input form-control" type="text" name="reg_nama_rs_lainnya" value="{{$edit->reg_nama_rs_lainnya}}"/>
        </div>
      </div>
    </div>
        
    <div class="form-group row mt-4">
      <label class="col-md-2">No Rekam Medis</label>
      <div class="col-md-6">
     <input class="multisteps-form__input form-control" type="text" name="reg_no_rekammedis" value="{{$edit->reg_no_rekammedis}}"/>
      </div>
    </div>
        
    <div class="form-group row mt-4">
      <label class="col-md-2">Dokter Penanggung Jawab</label>
      <div class="col-md-6">
     <input class="multisteps-form__input form-control" type="text" name="reg_nama_dokter" value="{{$edit->reg_nama_dokter}}"/>
      </div>
    </div>
        
    <div class="form-group row mt-4">
      <label class="col-md-2">No Telepon Fasyankes Pengirim (Dokter)</label>
      <div class="col-md-6">
     <input class="multisteps-form__input form-control" type="text" name="reg_telp_fas_pengirim" value="{{$edit->reg_telp_fas_pengirim}}"/>
      </div>
    </div>
  
        </div>
        <div id="sw-default-step-2">
            <div class="form-group row mt-4">
                <label class="col-md-2">Nama Pasien</label>
                <div class="col-md-6">
               <input class="multisteps-form__input form-control" type="text" name="reg_nama_pasien" value="{{$edit->reg_nama_pasien}}"/>
                </div>
              </div>
              <div class="form-group row mt-4">
                <label class="col-md-2" >Nomor Identitas <span style="color:red;">*</span></label>
                <div class="col-md-6">
                <div class="form-check form-check-inline">
  <input class="form-check-input" id="selectktpid" type="radio" name="reg_jenisidentitas" value="KTP" onclick="ktpselect();"  @if($edit->reg_jenisidentitas == "KTP") checked @endif required>
  <label class="form-check-label" for="selectktpid">Nomor Induk Kependudukan</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" id="selectsimid" type="radio" name="reg_jenisidentitas" value="SIM" onclick="simselect();"  @if($edit->reg_jenisidentitas == "SIM") checked @endif>
  <label class="form-check-label" for="selectsimid">Nomor Sim</label>
</div>
                </div>
              </div>
              <div class="mt-4" id="sim" style="display: none;">
                <div class="form-group row">
                  <label class="col-md-2" >Nomor SIM (Surat Izin Mengemudi)</label>
                  <div class="col-md-6">
                 <input class="multisteps-form__input form-control" type="text" id="idsim" name="reg_nosim" maxlength="12" value="{{$edit->reg_nosim}}"/>
                  </div>
                </div>
              </div>
              <div class="mt-4" id="ktp" style="display: none;">
                <div class="form-group row">
                  <label class="col-md-2" >NIK KTP (Nomor Induk Kependudukan)</label>
                  <div class="col-md-6">
                 <input class="multisteps-form__input form-control" type="text" id="idktp" name="reg_nik" maxlength="16" value="{{$edit->reg_nik}}"/>
                  </div>
                </div>
              </div>
              <div class="form-group row mt-4">
                <label class="col-md-2" >Tanggal Lahir <span style="color:red;">*</span><br>
                 <small>Format : yyyy-mm-dd (contoh : 2020/12/01)</small></label>
                <div class="col-md-6">
               <input class="multisteps-form__input form-control" id="tanggallahir" type="text" name="reg_tanggallahir" value="{{$edit->reg_tanggallahir}}" required/>
                </div>
              </div>
                    
   <div class="form-group row mt-4">
    <label class="col-md-2" >Jenis Kelamin <span style="color:red;">*</span></label>
    <div class="col-md-6">
    <div class="form-check form-check-inline">
 <input class="form-check-input" id="kellaki" type="radio" name="reg_kelamin" value="Laki Laki" onclick="show1();"  @if($edit->reg_kelamin == "Laki Laki") checked @endif required>
 <label class="form-check-label" for="kellaki">Laki Laki</label>
</div>
<div class="form-check form-check-inline">
 <input class="form-check-input" id="kelperempuan" type="radio" name="reg_kelamin" value="Perempuan" onclick="show2();"  @if($edit->reg_kelamin == "Perempuan") checked @endif >
 <label class="form-check-label" for="kelperempuan">Perempuan</label>
</div>
               </div>
             </div>
              <div class="form-group row mt-4" id="ifcewe" style="display: none;">
                <label class="col-md-2">Bila perempuan, apakah hamil atau pasca melahirkan?</label>
                <div class="col-md-6">
                <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="reg_hamil_pasca" value="Ya" @if($edit->reg_hamil_pasca == "Ya") checked @endif>
  <label class="form-check-label">Ya</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="reg_hamil_pasca" value="Tidak" @if($edit->reg_hamil_pasca == "Tidak") checked @endif>
  <label class="form-check-label">Tidak</label>
</div>
                </div>
              </div>
              <div class="form-group row mt-4">
                <label class="col-md-2" >Alamat</label>
                <div class="col-md-8">
                  <div class="row">
                  <select class="multisteps-form__input col-md-3 form-control" id="domisilikotakab" name="reg_domisilikotakab">
                    <option value="{{$edit->reg_domisilikotakab}}" selected>{{$edit->reg_domisilikotakab}}</option> 
                    <option value="Kota Bandung">Kota Bandung</option>
                    <option value="Kabupaten Bandung">Kabupaten Bandung</option>
                    <option value="Kabupaten Bandung Barat">Kabupaten Bandung Barat</option>
                    <option value="Kota Banjar">Kota Banjar</option>
                    <option value="Kota Cimahi">Kota Cimahi</option>
                    <option value="Kabupaten Bekasi">Kabupaten Bekasi</option>
                    <option value="Kota Bekasi">Kota Bekasi</option>
                    <option value="Kabupaten Bogor">Kabupaten Bogor</option>
                    <option value="Kota Bogor">Kota Bogor</option>
                    <option value="Kabupaten Ciamis">Kabupaten Ciamis</option>
                    <option value="Kabupaten Cianjur">Kabupaten Cianjur</option>
                    <option value="Kabupaten Cirebon">Kabupaten Cirebon</option>
                    <option value="Kota Cirebon">Kota Cirebon</option>
                    <option value="Kota Depok">Kota Depok</option>
                    <option value="Kabupaten Garut">Kabupaten Garut</option>
                    <option value="Kabupaten Indramayu">Kabupaten Indramayu</option>
                    <option value="Kabupaten Karawang">Kabupaten Karawang</option>
                    <option value="Kabupaten Kuningan">Kabupaten Kuningan</option>
                    <option value="Kabupaten Majalengka">Kabupaten Majalengka</option>
                    <option value="Kabupaten Pangandaran">Kabupaten Pangandaran</option>
                    <option value="Kabupaten Purwakarta">Kabupaten Purwakarta</option>
                    <option value="Kabupaten Subang">Kabupaten Subang</option>
                    <option value="Kabupaten Sukabumi">Kabupaten Sukabumi</option>
                    <option value="Kota Sukabumi">Kota Sukabumi</option>
                    <option value="Kabupaten Sumedang">Kabupaten Sumedang</option>
                    <option value="Kota Tasikmalaya">Kota Tasikmalaya</option>
                    <option value="Kabupaten Tasikmalaya">Kabupaten Tasikmalaya</option>
                  </select>
                  <div class="col-md-9">  
                    <div class="input-group">
                    <div class="input-group-preppend">
                      <span class="input-group-text">Alamat</span>
                    </div>
                    <input class="multisteps-form__input form-control" type="text" name="reg_alamat" value="{{$edit->reg_alamat}}"/>
                  </div>
              
              </div>
              </div>
               <div class="row mt-2">
               <div class="input-group col-md-6">
                <div class="input-group-preppend">
                  <span class="input-group-text">Kecamatan</span>
                </div>
                <input class="multisteps-form__input form-control" type="text" name="reg_domisilikecamatan" value="{{$edit->reg_domisilikecamatan}}"/>
              </div>
              <div class="input-group col-md-6">
                <div class="input-group-preppend">
                  <span class="input-group-text">Kelurahan</span>
                </div>
                <input class="multisteps-form__input form-control" type="text" name="reg_domisilikelurahan" value="{{$edit->reg_domisilikelurahan}}"/>
              </div>
            </div>
                </div>
              </div>
              
              <div class="form-group row mt-4">
                <label class="col-md-2">Nomor Telp/HP</label>
                <div class="col-md-6">
               <input class="multisteps-form__input form-control" type="text" name="reg_notelp_pasien" value="{{$edit->reg_notelp_pasien}}"/>
                </div>
              </div>
              <hr>
              <h4 class="mb-1 mt-0">Riwayat Kunjungan</h4>
              <div class="form-group row mt-4">
                <label class="col-md-2" >Kunjungan Ke</label>
                <div class="col-md-6">
                <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="kunke1" name="reg_kunke" value="1" required @if($edit->reg_kunke == "1") checked @endif >
  <label class="form-check-label" for="kunke1">Ke-1</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="kunke2" name="reg_kunke" value="2" @if($edit->reg_kunke == "2") checked @endif>
  <label class="form-check-label" for="kunke2">Ke-2</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="kunke3" name="reg_kunke" value="3" @if($edit->reg_kunke == "3") checked @endif>
  <label class="form-check-label" for="kunke3">Ke-3</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="kunke4" name="reg_kunke" value="4" @if($edit->reg_kunke == "4") checked @endif>
  <label class="form-check-label" for="kunke4">Ke-4</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="kunke5" name="reg_kunke" value="5" @if($edit->reg_kunke == "5") checked @endif>
  <label class="form-check-label" for="kunke5">Ke-5</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="kunke6" name="reg_kunke" value="6" @if($edit->reg_kunke == "6") checked @endif>
  <label class="form-check-label" for="kunke6">Ke-6</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="kunke7" name="reg_kunke" value="7" @if($edit->reg_kunke == "7") checked @endif>
  <label class="form-check-label" for="kunke7">Ke-7</label>
</div>
                </div>
              </div>

              <div class="form-group row mt-4">
                <div class="col-md-4">
                  <label>Tanggal Kunjungan</label>
                <input class="multisteps-form__input form-control" type="text" id="tanggalkunjungan" value="{{$edit->reg_tanggalkunjungan}}" name="reg_tanggalkunjungan"/>
                
                </div>
                <div class="col-md-8">
                <label>Rumah Sakit / Fasyankes</label>
                <input class="multisteps-form__input form-control" type="text" name="reg_rsfasyankes" value="{{$edit->reg_rsfasyankes}}"/>
                </div>
              </div>


           
             
        </div>
        <div id="sw-default-step-3">
       
          @if(!is_null($reg_rdt))
          <div class="form-group row mt-4">
            <label class="col-md-2">Pernah tes RDT sebelumnya / Pasien dengan sampel RDT ?</label>
            <div class="col-md-6">
            <div class="form-check form-check-inline">
<input class="form-check-input" type="radio" id="pernahrdt" name="rar_pernah_rdt" value="Ya" onclick="showRDT2();"  @if($reg_rdt->rar_pernah_rdt && $reg_rdt->rar_pernah_rdt == "Ya") checked @endif>
<label class="form-check-label"  for="pernahrdt">Ya</label>
</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" id="tidakpernahrdt" name="rar_pernah_rdt" value="Tidak" onclick="showRDT();" @if($reg_rdt->rar_pernah_rdt == "Tidak") checked @endif>
<label class="form-check-label"  for="tidakpernahrdt">Tidak</label>
</div>
          <div class="form-group mt-4" id="ifrdt" style="display: none;">
            <div class="form-group row">
            <label class="col-md-2">Hasil RDT Terakhir</label>
            <div class="col-md-10">
            <div class="form-check form-check-inline">
<input class="form-check-input" type="radio" id="reaktif" name="rar_hasil_rdt" value="Reaktif" @if($reg_rdt->rar_pernah_rdt == "Reaktif") checked @endif>
<label class="form-check-label" for="reaktif">Reaktif</label>
</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" id="nonreaktif"  name="rar_hasil_rdt" value="Non Reaktif" @if($reg_rdt->rar_pernah_rdt == "Non Reaktif") checked @endif>
<label class="form-check-label" for="nonreaktif">Non Reaktif</label>
</div>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2">Tanggal Pemeriksaan RDT</label>
            <div class="col-md-10">
              <input class="multisteps-form__input form-control" type="text" id="tanggalrdt" name="rar_tanggal_rdt" value="{{$reg_rdt->rar_tanggal_rdt}}"/>
            </div>
          </div>
          <div class="form-group row">
          <label class="col-md-2 col-form-label" for="gejlain">Keterangan RDT</label>
          <div class="col-md-10">
<textarea class="form-control" rows="3" name="rar_keterangan">{{$reg_rdt->rar_keterangan}}</textarea>
          </div>
        </div>
    </div>
    @else
    <div class="form-group row mt-4">
      <label class="col-md-2">Pernah tes RDT sebelumnya / Pasien dengan sampel RDT ?</label>
      <div class="col-md-6">
      <div class="form-check form-check-inline">
<input class="form-check-input" type="radio" id="pernahrdt" name="rar_pernah_rdt" value="Ya" onclick="showRDT2();">
<label class="form-check-label" for="pernahrdt">Ya</label>
</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" id="tidakpernahrdt" name="rar_pernah_rdt" value="Tidak" onclick="showRDT();">
<label class="form-check-label" for="tidakpernahrdt">Tidak</label>
</div>

            </div>
          </div>
          <div class="form-group mt-4" id="ifrdt" style="display: none;">
            <div class="form-group row">
            <label class="col-md-2">Hasil RDT Terakhir</label>
            <div class="col-md-10">
            <div class="form-check form-check-inline">
<input class="form-check-input" type="radio" id="reaktif" name="rar_hasil_rdt" value="Ya">
<label class="form-check-label" for="reaktif">Reaktif</label>
</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" id="nonreaktif" name="rar_hasil_rdt" value="Tidak">
<label class="form-check-label" for="nonreaktif">Non Reaktif</label>
</div>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2">Tanggal Pemeriksaan RDT</label>
            <div class="col-md-10">
              <input class="multisteps-form__input form-control" type="text" id="tanggalrdt" name="rar_tanggal_rdt" placeholder="Tanggal Pemeriksaan RDT"/>
            </div>
          </div>
          <div class="form-group row">
          <label class="col-md-2 col-form-label">Keterangan RDT</label>
          <div class="col-md-10">
<textarea class="form-control" rows="3" name="rar_keterangan">isikan Jenis sampel dan keterangan penting lainnya</textarea>
          </div>
        </div>
    </div>
    @endif
            <div class="form-group row mt-4">
                <label class="col-md-2">Tanggal onset gejala (panas)</label>
                <div class="col-md-6">
               <input class="multisteps-form__input form-control" type="text" id="onsetpanas" name="reg_onset_panas" value="{{$edit->reg_onset_panas}}"/>
                </div>
              </div>
            <div class="form-group row mt-4">
                <label class="col-md-2">Panas</label>
                <div class="col-md-6">
                <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="gejpanasya" name="reg_gejpanas" value="Ya" @if($edit->reg_gejpanas == "Ya") checked @endif>
  <label class="form-check-label" for="gejpanasya">Ya</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="gejpanasno" name="reg_gejpanas" value="Tidak" @if($edit->reg_gejpanas == "Tidak") checked @endif>
  <label class="form-check-label" for="gejpanasno">Tidak</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="gejpanasnull" name="reg_gejpanas" value="Tidak Diisi" @if($edit->reg_gejpanas == "Tidak Diisi") checked @endif>
  <label class="form-check-label" for="gejpanasnull">Tidak Diisi</label>
</div>
                </div>
              </div>

              <div class="form-group row mt-4">
                <label class="col-md-2">Tanda Pneumonia</label>
                <div class="col-md-6">
                <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="gejpneumoniaya" name="reg_gejpenumonia" value="Ya" @if($edit->reg_gejpenumonia == "Ya") checked @endif>
  <label class="form-check-label" for="gejpneumoniaya">Ya</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="gejpneumoniano" name="reg_gejpenumonia" value="Tidak" @if($edit->reg_gejpenumonia == "Tidak") checked @endif>
  <label class="form-check-label" for="gejpneumoniano">Tidak</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="gejpneumonianull" name="reg_gejpenumonia" value="Tidak Diisi" @if($edit->reg_gejpenumonia == "Tidak Diisi") checked @endif>
  <label class="form-check-label" for="gejpneumonianull">Tidak Diisi</label>
</div>
                </div>
              </div>

              <div class="form-group row mt-4">
                <label class="col-md-2">Batuk</label>
                <div class="col-md-6">
                <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="gejbatukya" name="reg_gejbatuk" value="Ya" @if($edit->reg_gejbatuk == "Ya") checked @endif>
  <label class="form-check-label" for="gejbatukya">Ya</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="gejbatukno" name="reg_gejbatuk" value="Tidak" @if($edit->reg_gejbatuk == "Tidak") checked @endif>
  <label class="form-check-label" for="gejbatukno">Tidak</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="gejbatuknull" name="reg_gejbatuk" value="Tidak Diisi" @if($edit->reg_gejbatuk == "Tidak Diisi") checked @endif>
  <label class="form-check-label" for="gejbatuknull">Tidak Diisi</label>
</div>
                </div>
              </div>
              <div class="form-group row mt-4">
                <label class="col-md-2">Nyeri Tenggorokan</label>
                <div class="col-md-6">
                <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="gejnyeritenggorokanya" name="reg_gejnyeritenggorokan" value="Ya" @if($edit->reg_gejnyeritenggorokan == "Ya") checked @endif>
  <label class="form-check-label" for="gejnyeritenggorokanya">Ya</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="gejnyeritenggorokanno" name="reg_gejnyeritenggorokan" value="Tidak" @if($edit->reg_gejnyeritenggorokan == "Tidak") checked @endif>
  <label class="form-check-label" for="gejnyeritenggorokanno">Tidak</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="gejnyeritenggorokannull" name="reg_gejnyeritenggorokan" value="Tidak Diisi" @if($edit->reg_gejnyeritenggorokan == "Tidak Diisi") checked @endif>
  <label class="form-check-label" for="gejnyeritenggorokannull">Tidak</label>
</div>
                </div>
              </div>
              <div class="form-group row mt-4">
                <label class="col-md-2">Sesak Nafas</label>
                <div class="col-md-6">
                <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="gejsesaknafasya" name="reg_gejsesaknafas" value="Ya" @if($edit->reg_gejsesaknafas == "Ya") checked @endif>
  <label class="form-check-label" for="gejsesaknafasya">Ya</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="gejsesaknafasno" name="reg_gejsesaknafas" value="Tidak" @if($edit->reg_gejsesaknafas == "Tidak") checked @endif>
  <label class="form-check-label" for="gejsesaknafasno">Tidak</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="gejsesaknafasnull" name="reg_gejsesaknafas" value="Tidak Diisi" @if($edit->reg_gejsesaknafas == "Tidak Diisi") checked @endif>
  <label class="form-check-label" for="gejsesaknafasnull">Tidak Diisi</label>
</div>
        
                </div>
              </div>
              <div class="form-group row mt-4">
                <label class="col-md-2">Pilek</label>
                <div class="col-md-6">
                <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="gejpilekya" name="reg_gejpilek" value="Ya" @if($edit->reg_gejpilek == "Ya") checked @endif>
  <label class="form-check-label" for="gejpilekya">Ya</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="gejpilekno" name="reg_gejpilek" value="Tidak" @if($edit->reg_gejpilek == "Tidak") checked @endif>
  <label class="form-check-label" for="gejpilekno">Tidak</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="gejpileknull" name="reg_gejpilek" value="Tidak Diisi" @if($edit->reg_gejpilek == "Tidak Diisi") checked @endif>
  <label class="form-check-label" for="gejpileknull">Tidak Diisi</label>
</div>
                </div>
              </div>
              <div class="form-group row mt-4">
                <label class="col-md-2">Lesu</label>
                <div class="col-md-6">
                <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="gejlesuya" name="reg_gejlesu" value="Ya" @if($edit->reg_gejlesu == "Ya") checked @endif>
  <label class="form-check-label" for="gejlesuya">Ya</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="gejlesuno" name="reg_gejlesu" value="Tidak" @if($edit->reg_gejlesu == "Tidak") checked @endif>
  <label class="form-check-label" for="gejlesuno">Tidak</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="gejlesunull" name="reg_gejlesu" value="Tidak Diisi" @if($edit->reg_gejlesu == "Tidak Diisi") checked @endif>
  <label class="form-check-label" for="gejlesunull">Tidak Diisi</label>
</div>
                </div>
              </div>
              <div class="form-group row mt-4">
                <label class="col-md-2">Sakit Kepala</label>
                <div class="col-md-6">
                <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="gejsakitkepalaya" name="reg_gejsakitkepala" value="Ya" @if($edit->reg_gejsakitkepala == "Ya") checked @endif>
  <label class="form-check-label" for="gejsakitkepalaya">Ya</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="gejsakitkepalano" name="reg_gejsakitkepala" value="Tidak" @if($edit->reg_gejsakitkepala == "Tidak") checked @endif>
  <label class="form-check-label" for="gejsakitkepalano">Tidak</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="gejsakitkepalanull" name="reg_gejsakitkepala" value="Tidak Diisi" @if($edit->reg_gejsakitkepala == "Tidak Diisi") checked @endif>
  <label class="form-check-label" for="gejsakitkepalanull">Tidak Diisi</label>
</div>
                </div>
              </div>
              <div class="form-group row mt-4">
                <label class="col-md-2">Diare</label>
                <div class="col-md-6">
                <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="gejdiareya" name="reg_gejdiare" value="Ya" @if($edit->reg_gejdiare == "Ya") checked @endif>
  <label class="form-check-label" for="gejdiareya">Ya</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="gejdiareno" name="reg_gejdiare" value="Tidak" @if($edit->reg_gejdiare == "Tidak") checked @endif>
  <label class="form-check-label" for="gejdiareno">Tidak</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="gejdiarenull" name="reg_gejdiare" value="Tidak Diisi" @if($edit->reg_gejdiare == "Tidak Diisi") checked @endif>
  <label class="form-check-label" for="gejdiarenull">Tidak Diisi</label>
</div>
                </div>
              </div>
              <div class="form-group row mt-4">
                <label class="col-md-2">Mual/Muntah</label>
                <div class="col-md-6">
                <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="gejmualmuntahya" name="reg_gejmualmuntah" value="Ya" @if($edit->reg_gejmualmuntah == "Ya") checked @endif>
  <label class="form-check-label" for="gejmualmuntahya">Ya</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="gejmualmuntahno" name="reg_gejmualmuntah" value="Tidak" @if($edit->reg_gejmualmuntah == "Tidak") checked @endif>
  <label class="form-check-label" for="gejmualmuntahno">Tidak</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="gejmualmuntahnull" name="reg_gejmualmuntah" value="Tidak Diisi" @if($edit->reg_gejmualmuntah == "Tidak Diisi") checked @endif>
  <label class="form-check-label" for="gejmualmuntahnull">Tidak Diisi</label>
</div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="gejlain">Gejala Lainnya (jelaskan)</label>
                <div class="col-md-10">
  <textarea class="form-control" rows="3" name="reg_gejlain" id="gejlain">{{$edit->reg_gejlain}}</textarea>
                </div>
            </div>

        </div>
        <div id="sw-default-step-4">
            <div class="form-group row mt-4">
                <label class="col-md-2">X-Ray Paru</label>
                <div class="col-md-6">
                <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio"  id="xrayya"  name="reg_xrayparu" value="Ya" @if($edit->reg_xrayparu == "Ya") checked @endif>
  <label class="form-check-label" for="xrayya">Ya</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio"  id="xrayno"  name="reg_xrayparu" value="Tidak" @if($edit->reg_xrayparu == "Tidak") checked @endif>
  <label class="form-check-label" for="xrayno">Tidak</label>
</div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="hasilxray">Hasil X-Ray Paru(jelaskan)</label>
                <div class="col-md-10">
  <textarea class="form-control" rows="3" name="reg_hasilxray" id="hasilxray">{{$edit->reg_hasilxray}}</textarea>
                </div>
            </div>
            <div class="form-group row mt-4">
                <label class="col-md-2">Leukosit</label>
                <div class="input-group col-md-3">
               <input class="multisteps-form__input form-control" type="number" min="0" name="reg_leukosit" value="{{$edit->reg_leukosit}}"/>
               <div class="input-group-append"> 
                <span class="input-group-text">/ul</span>
              </div>   
              </div>
              </div>
              <div class="form-group row mt-4">
                <label class="col-md-2">Limfosit</label>
                <div class="input-group col-md-3">
               <input class="multisteps-form__input form-control" type="number" min="0" name="reg_limfosit" value="{{$edit->reg_limfosit}}"/>
               <div class="input-group-append"> 
                <span class="input-group-text">/ul</span>
              </div> 
              </div>
              </div>
              <div class="form-group row mt-4">
                <label class="col-md-2">Trombosit</label>
                <div class="input-group col-md-3">
               <input class="multisteps-form__input form-control" type="number" min="0" name="reg_trombosit"  value="{{$edit->reg_trombosit}}"/>
               <div class="input-group-append"> 
                <span class="input-group-text">/ul</span>
              </div>
              </div>
              </div>

            <div class="form-group row mt-4">
                <label class="col-md-2">Menggunakan Ventilator</label>
                <div class="col-md-6">
                <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="ventilatorya" name="reg_ventilator" value="Ya" @if($edit->reg_ventilator == "Ya") checked @endif>
  <label class="form-check-label" for="ventilatorya">Ya</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="ventilatorno" name="reg_ventilator" value="Tidak" @if($edit->reg_ventilator == "Tidak") checked @endif>
  <label class="form-check-label" for="ventilatorno">Tidak</label>
</div>
                </div>
              </div>
              <div class="form-group row mt-4">
                <label class="col-md-2">Status Kesehatan Pasien</label>
                <div class="col-md-6">
                <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="pulang" name="reg_statuskes" value="Pulang" @if($edit->reg_statuskes == "Pulang") checked @endif>
  <label class="form-check-label" for="pulang">Pulang</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="dirawat" name="reg_statuskes" value="Dirawat" @if($edit->reg_statuskes == "Dirawat") checked @endif>
  <label class="form-check-label" for="dirawat">Dirawat</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="meninggal" name="reg_statuskes" value="Meninggal" @if($edit->reg_statuskes == "Meninggal") checked @endif>
  <label class="form-check-label" for="meninggal">Meninggal</label>
</div>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-md-2 col-form-label">Hasil lab lainnya :</label>
                <div class="col-md-10">
  <textarea class="form-control" rows="5" name="reg_hasillablainnya">{{$edit->reg_hasillablainnya}}</textarea>
                </div>
            </div>
        </div>
        <div id="sw-default-step-5">
            <div class="form-group row mt-4">
                <label class="col-md-4">Dalam 14 hari sebelum sakit, apakah pasien melakukan perjalanan ke luar negeri?</label>
                <div class="col-md-6">
                <div class="form-check form-check-inline"> 
  <input class="form-check-input" type="radio" id="luarnegriya" name="reg_luarnegri" value="Ya"  @if($edit->reg_luarnegri == "Ya") checked @endif>
  <label class="form-check-label" for="luarnegriya">Ya</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="luarnegrino" name="reg_luarnegri" value="Tidak"  @if($edit->reg_luarnegri == "Tidak") checked @endif>
  <label class="form-check-label" for="luarnegrino">Tidak</label>
</div>
                </div>
              </div>
              <p><b>Jika Ya, urutkan berdasarkan tanggal kunjungan</b></p>
              <div class="form-group row mt-4">
                <div class="input-group col-md-4">
                  <div class="input-group-preppend">
                    <span class="input-group-text">Tanggal Kunjungan / Lawatan ke 1</span>
                  </div>
                  <input class="multisteps-form__input form-control" type="text" id="tanggalkunjungan_pasien1" value="{{$edit->reg_tanggalkunjungan_pasien1}}" name="reg_tanggalkunjungan_pasien1"/>
                </div>
                    <div class="input-group col-md-4">
                      <div class="input-group-preppend">
                      <span class="input-group-text">Nama Kota</span>
                    </div
                  ><input class="multisteps-form__input form-control" type="text"  value="{{$edit->reg_kotakunjungan_pasien1}}" name="reg_kotakunjungan_pasien1"/>
                  </div>
                  <div class="input-group col-md-4">
                    <div class="input-group-preppend">
                      <span class="input-group-text">Nama Negara</span>
                    </div>
                    <input class="multisteps-form__input form-control" type="text"  value="{{$edit->reg_negarakunjungan_pasien1}}" name="reg_negarakunjungan_pasien1"/>
                  </div>
                </div>
                
                <div class="form-group row mt-4">
                  <div class="input-group col-md-4">
                    <div class="input-group-preppend">
                      <span class="input-group-text">Tanggal Kunjungan / Lawatan ke 2</span>
                    </div>
                    <input class="multisteps-form__input form-control" type="text" id="tanggalkunjungan_pasien2" value="{{$edit->reg_tanggalkunjungan_pasien2}}" name="reg_tanggalkunjungan_pasien2"/>
                  </div>
                      <div class="input-group col-md-4">
                        <div class="input-group-preppend">
                        <span class="input-group-text">Nama Kota</span>
                      </div
                    ><input class="multisteps-form__input form-control" type="text"  value="{{$edit->reg_kotakunjungan_pasien2}}" name="reg_kotakunjungan_pasien2"/>
                    </div>
                    <div class="input-group col-md-4">
                      <div class="input-group-preppend">
                        <span class="input-group-text">Nama Negara</span>
                      </div>
                      <input class="multisteps-form__input form-control" type="text"  value="{{$edit->reg_negarakunjungan_pasien2}}" name="reg_negarakunjungan_pasien2"/>
                    </div>
                  </div>

                  <div class="form-group row mt-4">
                    <div class="input-group col-md-4">
                      <div class="input-group-preppend">
                        <span class="input-group-text">Tanggal Kunjungan / Lawatan ke 3</span>
                      </div>
                      <input class="multisteps-form__input form-control" type="text" id="tanggalkunjungan_pasien3" value="{{$edit->reg_tanggalkunjungan_pasien3}}" name="reg_tanggalkunjungan_pasien3"/>
                    </div>
                        <div class="input-group col-md-4">
                          <div class="input-group-preppend">
                          <span class="input-group-text">Nama Kota</span>
                        </div
                      ><input class="multisteps-form__input form-control" type="text"  value="{{$edit->reg_kotakunjungan_pasien3}}" name="reg_kotakunjungan_pasien3"/>
                      </div>
                      <div class="input-group col-md-4">
                        <div class="input-group-preppend">
                          <span class="input-group-text">Nama Negara</span>
                        </div>
                        <input class="multisteps-form__input form-control" type="text"  value="{{$edit->reg_negarakunjungan_pasien3}}" name="reg_negarakunjungan_pasien3"/>
                      </div>
                    </div>

                    <div class="form-group row mt-4">
                      <div class="input-group col-md-4">
                        <div class="input-group-preppend">
                          <span class="input-group-text">Tanggal Kunjungan / Lawatan ke 4</span>
                        </div>
                        <input class="multisteps-form__input form-control" type="text" id="tanggalkunjungan_pasien4" value="{{$edit->reg_tanggalkunjungan_pasien4}}" name="reg_tanggalkunjungan_pasien4"/>
                      </div>
                          <div class="input-group col-md-4">
                            <div class="input-group-preppend">
                            <span class="input-group-text">Nama Kota</span>
                          </div
                        ><input class="multisteps-form__input form-control" type="text"  value="{{$edit->reg_kotakunjungan_pasien4}}" name="reg_kotakunjungan_pasien4"/>
                        </div>
                        <div class="input-group col-md-4">
                          <div class="input-group-preppend">
                            <span class="input-group-text">Nama Negara</span>
                          </div>
                          <input class="multisteps-form__input form-control" type="text"  value="{{$edit->reg_negarakunjungan_pasien4}}" name="reg_negarakunjungan_pasien4"/>
                        </div>
                      </div>

                      <div class="form-group row mt-4">
                        <div class="input-group col-md-4">
                          <div class="input-group-preppend">
                            <span class="input-group-text">Tanggal Kunjungan / Lawatan ke 5</span>
                          </div>
                          <input class="multisteps-form__input form-control" type="text" id="tanggalkunjungan_pasien5" value="{{$edit->reg_tanggalkunjungan_pasien5}}" name="reg_tanggalkunjungan_pasien5"/>
                        </div>
                            <div class="input-group col-md-4">
                              <div class="input-group-preppend">
                              <span class="input-group-text">Nama Kota</span>
                            </div
                          ><input class="multisteps-form__input form-control" type="text"  value="{{$edit->reg_kotakunjungan_pasien5}}" name="reg_kotakunjungan_pasien5"/>
                          </div>
                          <div class="input-group col-md-4">
                            <div class="input-group-preppend">
                              <span class="input-group-text">Nama Negara</span>
                            </div>
                            <input class="multisteps-form__input form-control" type="text"  value="{{$edit->reg_negarakunjungan_pasien5}}" name="reg_negarakunjungan_pasien5"/>
                          </div>
                        </div>

                        <div class="form-group row mt-4">
                          <div class="input-group col-md-4">
                            <div class="input-group-preppend">
                              <span class="input-group-text">Tanggal Kunjungan / Lawatan ke 6</span>
                            </div>
                            <input class="multisteps-form__input form-control" type="text" id="tanggalkunjungan_pasien6" value="{{$edit->reg_tanggalkunjungan_pasien6}}" name="reg_tanggalkunjungan_pasien6"/>
                          </div>
                              <div class="input-group col-md-4">
                                <div class="input-group-preppend">
                                <span class="input-group-text">Nama Kota</span>
                              </div
                            ><input class="multisteps-form__input form-control" type="text"  value="{{$edit->reg_kotakunjungan_pasien6}}" name="reg_kotakunjungan_pasien6"/>
                            </div>
                            <div class="input-group col-md-4">
                              <div class="input-group-preppend">
                                <span class="input-group-text">Nama Negara</span>
                              </div>
                              <input class="multisteps-form__input form-control" type="text"  value="{{$edit->reg_negarakunjungan_pasien6}}" name="reg_negarakunjungan_pasien6"/>
                            </div>
                          </div>

                          <div class="form-group row mt-4">
                            <div class="input-group col-md-4">
                              <div class="input-group-preppend">
                                <span class="input-group-text">Tanggal Kunjungan / Lawatan ke 7</span>
                              </div>
                              <input class="multisteps-form__input form-control" type="text" id="tanggalkunjungan_pasien7" value="{{$edit->reg_tanggalkunjungan_pasien7}}" name="reg_tanggalkunjungan_pasien7"/>
                            </div>
                                <div class="input-group col-md-4">
                                  <div class="input-group-preppend">
                                  <span class="input-group-text">Nama Kota</span>
                                </div
                              ><input class="multisteps-form__input form-control" type="text"  value="{{$edit->reg_kotakunjungan_pasien7}}" name="reg_kotakunjungan_pasien7"/>
                              </div>
                              <div class="input-group col-md-4">
                                <div class="input-group-preppend">
                                  <span class="input-group-text">Nama Negara</span>
                                </div>
                                <input class="multisteps-form__input form-control" type="text"  value="{{$edit->reg_negarakunjungan_pasien7}}" name="reg_negarakunjungan_pasien7"/>
                              </div>
                            </div>

            <div class="form-group row mt-4">
                <label class="col-md-4">Dalam 14 hari sebelum sakit, apakah pasien kontak dengan orang yang sakit?</label>
                <div class="col-md-6">
                <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="kontakdgnsakitya" name="reg_kontakdgnsakit" value="Ya"  @if($edit->reg_kontakdgnsakit == "Ya") checked @endif>
  <label class="form-check-label" for="kontakdgnsakitya">Ya</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="kontakdgnsakitno" name="reg_kontakdgnsakit" value="Tidak"  @if($edit->reg_kontakdgnsakit == "Tidak") checked @endif>
  <label class="form-check-label" for="kontakdgnsakitno">Tidak</label>
</div>
                </div>
              </div>
              <p><b>Jika Ya, Tambahkan beberapa kontak terakhir dengan orang sakit</b></p>

                
<div class="form-group row mt-4">
  <div class="input-group col-md-3">
  <div class="input-group-preppend">
    <span class="input-group-text">Nama</span>
  </div><input class="multisteps-form__input form-control" type="text" value="{{$edit->reg_namakon1}}" name="reg_namakon1"/>
</div>
<div class="input-group col-md-3"
><div class="input-group-preppend">
  <span class="input-group-text">Alamat</span>
</div>
<input class="multisteps-form__input form-control" type="text" value="{{$edit->reg_alamatkon1}}"  name="reg_alamatkon1"/>
</div>
<div class="input-group col-md-2"
><div class="input-group-preppend">
<span class="input-group-text">Hubungan</span>
</div>
<input class="multisteps-form__input form-control" type="text" value="{{$edit->reg_hubungankon1}}" name="reg_hubungankon1"/>
</div>
<div class="input-group col-md-2">
<div class="input-group-preppend">
<span class="input-group-text">Tanggal Pertama</span>
</div>
<input class="multisteps-form__input form-control" type="text" id="tanggalkonawal1" value="{{$edit->reg_tanggalkonawal1}}" name="reg_tanggalkonawal1"/>
</div>
<div class="input-group col-md-2">
  <div class="input-group-preppend">
  <span class="input-group-text">Tanggal Terakhir</span>
  </div>
  <input class="multisteps-form__input form-control" type="text" id="tanggalkonakhir1" value="{{$edit->reg_tanggalkonakhir1}}" name="reg_tanggalkonakhir1"/>
  </div>
</div>
             

                
<div class="form-group row mt-4">
  <div class="input-group col-md-3">
  <div class="input-group-preppend">
    <span class="input-group-text">Nama</span>
  </div><input class="multisteps-form__input form-control" type="text" value="{{$edit->reg_namakon2}}" name="reg_namakon2"/>
</div>
<div class="input-group col-md-3"
><div class="input-group-preppend">
  <span class="input-group-text">Alamat</span>
</div>
<input class="multisteps-form__input form-control" type="text" value="{{$edit->reg_alamatkon2}}"  name="reg_alamatkon2"/>
</div>
<div class="input-group col-md-2"
><div class="input-group-preppend">
<span class="input-group-text">Hubungan</span>
</div>
<input class="multisteps-form__input form-control" type="text" value="{{$edit->reg_hubungankon2}}" name="reg_hubungankon2"/>
</div>
<div class="input-group col-md-2">
  <div class="input-group-preppend">
  <span class="input-group-text">Tanggal Pertama</span>
  </div>
  <input class="multisteps-form__input form-control" type="text" id="tanggalkonawal2" value="{{$edit->reg_tanggalkonawal2}}" name="reg_tanggalkonawal2"/>
  </div>
  <div class="input-group col-md-2">
    <div class="input-group-preppend">
    <span class="input-group-text">Tanggal Terakhir</span>
    </div>
    <input class="multisteps-form__input form-control" type="text" id="tanggalkonakhir2" value="{{$edit->reg_tanggalkonakhir2}}" name="reg_tanggalkonakhir2"/>
    </div>
</div>


                
<div class="form-group row mt-4">
  <div class="input-group col-md-3">
  <div class="input-group-preppend">
    <span class="input-group-text">Nama</span>
  </div><input class="multisteps-form__input form-control" type="text" value="{{$edit->reg_namakon3}}" name="reg_namakon3"/>
</div>
<div class="input-group col-md-3"
><div class="input-group-preppend">
  <span class="input-group-text">Alamat</span>
</div>
<input class="multisteps-form__input form-control" type="text" value="{{$edit->reg_alamatkon3}}"  name="reg_alamatkon3"/>
</div>
<div class="input-group col-md-2"
><div class="input-group-preppend">
<span class="input-group-text">Hubungan</span>
</div>
<input class="multisteps-form__input form-control" type="text" value="{{$edit->reg_hubungankon3}}" name="reg_hubungankon3"/>
</div>
<div class="input-group col-md-2">
  <div class="input-group-preppend">
  <span class="input-group-text">Tanggal Pertama</span>
  </div>
  <input class="multisteps-form__input form-control" type="text" id="tanggalkonawal3" value="{{$edit->reg_tanggalkonawal3}}" name="reg_tanggalkonawal3"/>
  </div>
  <div class="input-group col-md-2">
    <div class="input-group-preppend">
    <span class="input-group-text">Tanggal Terakhir</span>
    </div>
    <input class="multisteps-form__input form-control" type="text" id="tanggalkonakhir3" value="{{$edit->reg_tanggalkonakhir3}}" name="reg_tanggalkonakhir3"/>
    </div>
</div>


                
<div class="form-group row mt-4">
  <div class="input-group col-md-3">
  <div class="input-group-preppend">
    <span class="input-group-text">Nama</span>
  </div><input class="multisteps-form__input form-control" type="text" value="{{$edit->reg_namakon4}}" name="reg_namakon4"/>
</div>
<div class="input-group col-md-3"
><div class="input-group-preppend">
  <span class="input-group-text">Alamat</span>
</div>
<input class="multisteps-form__input form-control" type="text" value="{{$edit->reg_alamatkon4}}"  name="reg_alamatkon4"/>
</div>
<div class="input-group col-md-2"
><div class="input-group-preppend">
<span class="input-group-text">Hubungan</span>
</div>
<input class="multisteps-form__input form-control" type="text" value="{{$edit->reg_hubungankon4}}" name="reg_hubungankon4"/>
</div>
<div class="input-group col-md-2">
  <div class="input-group-preppend">
  <span class="input-group-text">Tanggal Pertama</span>
  </div>
  <input class="multisteps-form__input form-control" type="text" id="tanggalkonawal4" value="{{$edit->reg_tanggalkonawal4}}" name="reg_tanggalkonawal4"/>
  </div>
  <div class="input-group col-md-2">
    <div class="input-group-preppend">
    <span class="input-group-text">Tanggal Terakhir</span>
    </div>
    <input class="multisteps-form__input form-control" type="text" id="tanggalkonakhir4" value="{{$edit->reg_tanggalkonakhir4}}" name="reg_tanggalkonakhir4"/>
    </div>
</div>


                
<div class="form-group row mt-4">
  <div class="input-group col-md-3">
  <div class="input-group-preppend">
    <span class="input-group-text">Nama</span>
  </div><input class="multisteps-form__input form-control" type="text" value="{{$edit->reg_namakon5}}" name="reg_namakon5"/>
</div>
<div class="input-group col-md-3"
><div class="input-group-preppend">
  <span class="input-group-text">Alamat</span>
</div>
<input class="multisteps-form__input form-control" type="text" value="{{$edit->reg_alamatkon5}}"  name="reg_alamatkon5"/>
</div>
<div class="input-group col-md-2"
><div class="input-group-preppend">
<span class="input-group-text">Hubungan</span>
</div>
<input class="multisteps-form__input form-control" type="text" value="{{$edit->reg_hubungankon5}}" name="reg_hubungankon5"/>
</div>
<div class="input-group col-md-2">
  <div class="input-group-preppend">
  <span class="input-group-text">Tanggal Pertama</span>
  </div>
  <input class="multisteps-form__input form-control" type="text" id="tanggalkonawal5" value="{{$edit->reg_tanggalkonawal5}}" name="reg_tanggalkonawal5"/>
  </div>
  <div class="input-group col-md-2">
    <div class="input-group-preppend">
    <span class="input-group-text">Tanggal Terakhir</span>
    </div>
    <input class="multisteps-form__input form-control" type="text" id="tanggalkonakhir5" value="{{$edit->reg_tanggalkonakhir5}}" name="reg_tanggalkonakhir5"/>
    </div>
</div>


                
<div class="form-group row mt-4">
  <div class="input-group col-md-3">
  <div class="input-group-preppend">
    <span class="input-group-text">Nama</span>
  </div><input class="multisteps-form__input form-control" type="text" value="{{$edit->reg_namakon6}}" name="reg_namakon6"/>
</div>
<div class="input-group col-md-3"
><div class="input-group-preppend">
  <span class="input-group-text">Alamat</span>
</div>
<input class="multisteps-form__input form-control" type="text" value="{{$edit->reg_alamatkon6}}"  name="reg_alamatkon6"/>
</div>
<div class="input-group col-md-2"
><div class="input-group-preppend">
<span class="input-group-text">Hubungan</span>
</div>
<input class="multisteps-form__input form-control" type="text" value="{{$edit->reg_hubungankon6}}" name="reg_hubungankon6"/>
</div>
<div class="input-group col-md-2">
  <div class="input-group-preppend">
  <span class="input-group-text">Tanggal Pertama</span>
  </div>
  <input class="multisteps-form__input form-control" type="text" id="tanggalkonawal6" value="{{$edit->reg_tanggalkonawal6}}" name="reg_tanggalkonawal6"/>
  </div>
  <div class="input-group col-md-2">
    <div class="input-group-preppend">
    <span class="input-group-text">Tanggal Terakhir</span>
    </div>
    <input class="multisteps-form__input form-control" type="text" id="tanggalkonakhir6" value="{{$edit->reg_tanggalkonakhir6}}" name="reg_tanggalkonakhir6"/>
    </div>
</div>


                
<div class="form-group row mt-4">
  <div class="input-group col-md-3">
  <div class="input-group-preppend">
    <span class="input-group-text">Nama</span>
  </div><input class="multisteps-form__input form-control" type="text" value="{{$edit->reg_namakon7}}" name="reg_namakon7"/>
</div>
<div class="input-group col-md-3"
><div class="input-group-preppend">
  <span class="input-group-text">Alamat</span>
</div>
<input class="multisteps-form__input form-control" type="text" value="{{$edit->reg_alamatkon7}}"  name="reg_alamatkon7"/>
</div>
<div class="input-group col-md-2"
><div class="input-group-preppend">
<span class="input-group-text">Hubungan</span>
</div>
<input class="multisteps-form__input form-control" type="text" value="{{$edit->reg_hubungankon7}}" name="reg_hubungankon7"/>
</div>
<div class="input-group col-md-2">
  <div class="input-group-preppend">
  <span class="input-group-text">Tanggal Pertama</span>
  </div>
  <input class="multisteps-form__input form-control" type="text" id="tanggalkonawal7" value="{{$edit->reg_tanggalkonawal7}}" name="reg_tanggalkonawal7"/>
  </div>
  <div class="input-group col-md-2">
    <div class="input-group-preppend">
    <span class="input-group-text">Tanggal Terakhir</span>
    </div>
    <input class="multisteps-form__input form-control" type="text" id="tanggalkonakhir7" value="{{$edit->reg_tanggalkonakhir7}}" name="reg_tanggalkonakhir7"/>
    </div>
</div>


           
            <div class="form-group row mt-4">
                <label class="col-md-4">Apakah orang tersebut tersangka/terinfeksi Covid-19?</label>
                <div class="col-md-6">
                <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio"  id="kontakterinfeksiya" name="reg_kontakterinfeksi" value="Ya"  @if($edit->reg_kontakterinfeksi == "Ya") checked @endif>
  <label class="form-check-label" for="kontakterinfeksiya">Ya</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="kontakterinfeksino" name="reg_kontakterinfeksi" value="Tidak"  @if($edit->reg_kontakterinfeksi == "Tidak") checked @endif>
  <label class="form-check-label" for="kontakterinfeksino">Tidak</label>
</div>
                </div>
              </div>
              <div class="form-group row mt-4">
                <label class="col-md-4">Apakah ada anggota keluarga pasien yang sakitnya sama?</label>
                <div class="col-md-6">
                <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="keluargapasiensakitya" name="reg_keluargapasiensakitsama" value="Ya"  @if($edit->reg_keluargapasiensakitsama == "Ya") checked @endif>
  <label class="form-check-label" for="keluargapasiensakitya">Ya</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="keluargapasiensakitno" name="reg_keluargapasiensakitsama" value="Tidak"  @if($edit->reg_keluargapasiensakitsama == "Tidak") checked @endif>
  <label class="form-check-label" for="keluargapasiensakitno">Tidak</label>
</div>
                </div>
              </div>
         
        </div>
        <div id="sw-default-step-6">
            
            <div class="form-group row mt-4">
                <label class="col-md-2">Penyakit Kardiovaskuler/Hipertensi</label>
                <div class="col-md-6">
                <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="komorbidhipertensiya" name="reg_komorbidhipertensi" value="Ya" @if($edit->reg_komorbidhipertensi == "Ya") checked @endif>
  <label class="form-check-label" for="komorbidhipertensiya">Ya</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="komorbidhipertensino" name="reg_komorbidhipertensi" value="Tidak" @if($edit->reg_komorbidhipertensi == "Tidak") checked @endif>
  <label class="form-check-label" for="komorbidhipertensino">Tidak</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="komorbidhipertensinull" name="reg_komorbidhipertensi" value="Tidak Diisi" @if($edit->reg_komorbidhipertensi == "Tidak Diisi") checked @endif>
  <label class="form-check-label"for="komorbidhipertensinull">Tidak Diisi</label>
</div>
                </div>
              </div>
              <div class="form-group row mt-4">
                <label class="col-md-2">Diabetes Mellitus</label>
                <div class="col-md-6">
                <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="komorbiddmya" name="reg_komorbiddm" value="Ya" @if($edit->reg_komorbiddm == "Ya") checked @endif>
  <label class="form-check-label" for="komorbiddmya">Ya</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="komorbiddmno" name="reg_komorbiddm" value="Tidak" @if($edit->reg_komorbiddm == "Tidak") checked @endif>
  <label class="form-check-label" for="komorbiddmno">Tidak</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="komorbiddmnull" name="reg_komorbiddm" value="Tidak Diisi" @if($edit->reg_komorbiddm == "Tidak Diisi") checked @endif>
  <label class="form-check-label" for="komorbiddmnull">Tidak Diisi</label>
</div>
                </div>
              </div>
              <div class="form-group row mt-4">
                <label class="col-md-2">Liver</label>
                <div class="col-md-6">
                <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="komorbidliverya" name="reg_komorbidliver" value="Ya" @if($edit->reg_komorbidliver == "Ya") checked @endif>
  <label class="form-check-label" for="komorbidliverya">Ya</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="komorbidliverno" name="reg_komorbidliver" value="Tidak" @if($edit->reg_komorbidliver == "Tidak") checked @endif>
  <label class="form-check-label" for="komorbidliverno">Tidak</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="komorbidlivernull" name="reg_komorbidliver" value="Tidak Diisi" @if($edit->reg_komorbidliver == "Tidak Diisi") checked @endif>
  <label class="form-check-label" for="komorbidlivernull">Tidak Diisi</label>
</div>
                </div>
              </div>
              <div class="form-group row mt-4">
                <label class="col-md-2">Kronik neurologi / neuromuskula</label>
                <div class="col-md-6">
                <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="komorbidneurologiya" name="reg_komorbidneurologi" value="Ya" @if($edit->reg_komorbidneurologi == "Ya") checked @endif>
  <label class="form-check-label" for="komorbidneurologiya">Ya</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="komorbidneurologino" name="reg_komorbidneurologi" value="Tidak" @if($edit->reg_komorbidneurologi == "Tidak") checked @endif> 
  <label class="form-check-label" for="komorbidneurologino">Tidak</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="komorbidneurologinull" name="reg_komorbidneurologi" value="Tidak Diisi" @if($edit->reg_komorbidneurologi == "Tidak Diisi") checked @endif> 
  <label class="form-check-label" for="komorbidneurologinull">Tidak Diisi</label>
</div>
                </div>
              </div>
              <div class="form-group row mt-4">
                <label class="col-md-2">Imunodefisiensi / HIV</label>
                <div class="col-md-6">
                <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="komorbidhivya" name="reg_komorbidhiv" value="Ya" @if($edit->reg_komorbidhiv == "Ya") checked @endif>
  <label class="form-check-label" for="komorbidhivya">Ya</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="komorbidhivno" name="reg_komorbidhiv" value="Tidak" @if($edit->reg_komorbidhiv == "Tidak") checked @endif>
  <label class="form-check-label" for="komorbidhivno">Tidak</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="komorbidhivnull" name="reg_komorbidhiv" value="Tidak Diisi" @if($edit->reg_komorbidhiv == "Tidak Diisi") checked @endif>
  <label class="form-check-label" for="komorbidhivnull">Tidak Diisi</label>
</div>
                </div>
              </div>
              <div class="form-group row mt-4">
                <label class="col-md-2">Penyakit paru kronik</label>
                <div class="col-md-6">
                <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="komorbidparuya" name="reg_komorbidparu" value="Ya" @if($edit->reg_komorbidparu == "Ya") checked @endif>
  <label class="form-check-label" for="komorbidparuya">Ya</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="komorbidparuno" name="reg_komorbidparu" value="Tidak" @if($edit->reg_komorbidparu == "Tidak") checked @endif>
  <label class="form-check-label" for="komorbidparuno">Tidak</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="komorbidparunull" name="reg_komorbidparu" value="Tidak Diisi" @if($edit->reg_komorbidparu == "Tidak Diisi") checked @endif>
  <label class="form-check-label" for="komorbidparunull">Tidak Diisi</label>
</div>
                </div>
              </div>
              <div class="form-group row mt-4">
                <label class="col-md-2">Penyakit ginjal</label>
                <div class="col-md-6">
                <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="komorbidginjalya" name="reg_komorbidginjal" value="Ya" @if($edit->reg_komorbidginjal == "Ya") checked @endif>
  <label class="form-check-label" for="komorbidginjalya">Ya</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="komorbidginjalno" name="reg_komorbidginjal" value="Tidak" @if($edit->reg_komorbidginjal == "Tidak") checked @endif>
  <label class="form-check-label" for="komorbidginjalno">Tidak</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="komorbidginjalnull" name="reg_komorbidginjal" value="Tidak Diisi" @if($edit->reg_komorbidginjal == "Tidak Diisi") checked @endif>
  <label class="form-check-label" for="komorbidginjalnull">Tidak Diisi</label>
</div>
                </div>
              </div>
              
            
              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="gejlain">Keterangan lainnya: (sebutkan informasi yang dianggap penting)</label>
                <div class="col-md-10">
  <textarea class="form-control" rows="5" name="reg_penjelasanlain" id="penjelasanlain">{{$edit->reg_penjelasanlain}}</textarea>
                </div>
            </div>
            
            <div class="form-group row mt-4">
                <div class="col-md-12">
 <button class="btn btn-md btn-primary" type="submit">Simpan Register</button>
                </div>
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
<script src="{{asset('assets/libs/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{asset('assets/libs/smartwizard/jquery.smartWizard.min.js')}}"></script>
<script>
    function show1(){
  document.getElementById('ifcewe').style.display ='none';
};
function show2(){
  document.getElementById('ifcewe').style.display = 'block';
};

function simselect(){
  document.getElementById('sim').style.display ='block';
  document.getElementById('ktp').style.display ='none';
  $('#idktp').val('');
};
function ktpselect(){
  document.getElementById('sim').style.display ='none';
  document.getElementById('ktp').style.display ='block';
  $('#idsim').val('');
};

function showRDT(){
  document.getElementById('ifrdt').style.display ='none';
};
function showRDT2(){
  document.getElementById('ifrdt').style.display = 'block';
};
   
$(document).ready(function(){
if(document.getElementById('selectktpid').checked) {
  document.getElementById('sim').style.display ='none';
  document.getElementById('ktp').style.display ='block';
  }
if(document.getElementById('selectsimid').checked) {
  document.getElementById('sim').style.display ='block';
  document.getElementById('ktp').style.display ='none';
}
if(document.getElementById('pernahrdt').checked) {
  document.getElementById('ifrdt').style.display = 'block';
}
if(document.getElementById('kelperempuan').checked) {
  document.getElementById('ifcewe').style.display = 'block';
}
if(document.getElementById("dinkespengirim").value == "Other"){
  document.getElementById("inputdaerahlain").style.display = "block";
}

if(document.getElementById("rsfasyankes").value == "Other"){
  document.getElementById("inputrslain").style.display = "block";
}

$("#smartwizard-default").smartWizard({
useURLhash:!1,
showStepURLhash:!1, 
keyNavigation:false, // Enable/Disable keyboard navigation(left and right keys are used if enabled)
lang: {  // Language variables
next: 'Selanjutnya', 
previous: 'Sebelumnya'
}
});
 });
</script>
<script>
$("#tanggalkunjungan").flatpickr({maxDate: new Date(),dateFormat: "Y/m/d",allowInput: true});
$("#tanggalkunjungan_pasien1").flatpickr({maxDate: new Date(),dateFormat: "Y/m/d",allowInput: true});
$("#tanggalkunjungan_pasien2").flatpickr({maxDate: new Date(),dateFormat: "Y/m/d",allowInput: true});
$("#tanggalkunjungan_pasien3").flatpickr({maxDate: new Date(),dateFormat: "Y/m/d",allowInput: true});
$("#tanggalkunjungan_pasien4").flatpickr({maxDate: new Date(),dateFormat: "Y/m/d",allowInput: true});
$("#tanggalkunjungan_pasien5").flatpickr({maxDate: new Date(),dateFormat: "Y/m/d",allowInput: true});
$("#tanggalkunjungan_pasien6").flatpickr({maxDate: new Date(),dateFormat: "Y/m/d",allowInput: true});
$("#tanggalkunjungan_pasien7").flatpickr({maxDate: new Date(),dateFormat: "Y/m/d",allowInput: true});
$("#tanggalkonawal1").flatpickr({maxDate: new Date(),dateFormat: "Y/m/d",allowInput: true});
$("#tanggalkonawal2").flatpickr({maxDate: new Date(),dateFormat: "Y/m/d",allowInput: true});
$("#tanggalkonawal3").flatpickr({maxDate: new Date(),dateFormat: "Y/m/d",allowInput: true});
$("#tanggalkonawal4").flatpickr({maxDate: new Date(),dateFormat: "Y/m/d",allowInput: true});
$("#tanggalkonawal5").flatpickr({maxDate: new Date(),dateFormat: "Y/m/d",allowInput: true});
$("#tanggalkonawal6").flatpickr({maxDate: new Date(),dateFormat: "Y/m/d",allowInput: true});
$("#tanggalkonawal7").flatpickr({maxDate: new Date(),dateFormat: "Y/m/d",allowInput: true});
$("#tanggalkonakhir1").flatpickr({maxDate: new Date(),dateFormat: "Y/m/d",allowInput: true});
$("#tanggalkonakhir2").flatpickr({maxDate: new Date(),dateFormat: "Y/m/d",allowInput: true});
$("#tanggalkonakhir3").flatpickr({maxDate: new Date(),dateFormat: "Y/m/d",allowInput: true});
$("#tanggalkonakhir4").flatpickr({maxDate: new Date(),dateFormat: "Y/m/d",allowInput: true});
$("#tanggalkonakhir5").flatpickr({maxDate: new Date(),dateFormat: "Y/m/d",allowInput: true});
$("#tanggalkonakhir6").flatpickr({maxDate: new Date(),dateFormat: "Y/m/d",allowInput: true});
$("#tanggalkonakhir7").flatpickr({maxDate: new Date(),dateFormat: "Y/m/d",allowInput: true});
$("#tanggallahir").flatpickr({maxDate: new Date(),dateFormat: "Y/m/d",allowInput: true});
$("#tanggalrdt").flatpickr({maxDate: new Date(),dateFormat: "Y/m/d",allowInput: true});
$("#onsetpanas").flatpickr({maxDate: new Date(),dateFormat: "Y/m/d",allowInput: true});

  function dinkesotheroptionselect(that) {
    if (that.value == "Other") {
        document.getElementById("inputdaerahlain").style.display = "block";
    } else {
        document.getElementById("inputdaerahlain").style.display = "none";
    }
  }

  function rsotheroptionselect(that) {
    if (that.value == "Other") {
        document.getElementById("inputrslain").style.display = "block";
    } else {
        document.getElementById("inputrslain").style.display = "none";
    }
  }
</script>
@endsection
@endsection