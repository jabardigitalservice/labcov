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
     <input class="multisteps-form__input form-control" type="text" name="reg_no" placeholder="Nomor Registrasi" required/>
      </div>
    </div>
      <div class="form-group row mt-4">
      <label class="col-md-2" for="dinkespengirim">Dinkes Pengirim</label>
      <select class="multisteps-form__input form-control col-md-6" id="dinkespengirim" name="reg_dinkes_pengirim" onchange="yesnoCheck(this);">
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
      
        <div id="ifYes" class="mt-3 col-md-6" style="display: none;">
          <input class="multisteps-form__input form-control" type="text" id="daerahlain" name="daerahlain" placeholder="Masukan Dinkes Terkait"/>
      </div>
  </div>
        
    <div class="form-group row mt-4">
      <label class="col-md-2" >Fasyankes Pengirim</label>
      <div class="col-md-6">
      <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="reg_fasyankes_pengirim" id="fasyanrs" value="Rumah Sakit">
          <label class="form-check-label">Rumah Sakit</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="reg_fasyankes_pengirim" id="fasyandinkes" value="Dinkes">
          <label class="form-check-label">Dinkes</label>
        </div>
      </div>
    </div>
        
    <div class="form-group row mt-4">
      <label class="col-md-2">Nama Rumah Sakit</label>
      <div class="col-md-6">
     <input class="multisteps-form__input form-control" type="text" name="reg_nama_rs" placeholder="Nama Rumah Sakit"/>
      </div>
    </div>
        
    <div class="form-group row mt-4">
      <label class="col-md-2" >No Rekam Medis</label>
      <div class="col-md-6">
     <input class="multisteps-form__input form-control" type="text" name="reg_no_rekammedis" placeholder="Nomor Rekam Medis"/>
      </div>
    </div>
        
    <div class="form-group row mt-4">
      <label class="col-md-2" >Dokter Penanggung Jawab</label>
      <div class="col-md-6">
     <input class="multisteps-form__input form-control" type="text" name="reg_nama_dokter" placeholder="Dokter Penanggung Jawab"/>
      </div>
    </div>
        
    <div class="form-group row mt-4">
      <label class="col-md-2">No Telepon Fasyankes Pengirim</label>
      <div class="col-md-6">
     <input class="multisteps-form__input form-control" type="text" name="reg_telp_fas_pengirim" placeholder="Nomor Telp  Fasyankes Pengirim"/>
      </div>
    </div>
  
        </div>
        <div id="sw-default-step-2">
            <div class="form-group row mt-4">
                <label class="col-md-2">Nama Pasien</label>
                <div class="col-md-6">
               <input class="multisteps-form__input form-control" type="text" name="reg_nama_pasien" placeholder="Nama Lengkap Pasien"/>
                </div>
              </div>

              <div class="form-group row mt-4">
                <label class="col-md-2" >NIK (Nomor Induk Kependudukan)</label>
                <div class="col-md-6">
               <input class="multisteps-form__input form-control" type="text" name="reg_nik" placeholder="NIK Pasien"/>
                </div>
              </div>

              <div class="form-group row mt-4">
                <label class="col-md-2" >Tanggal Lahir</label>
                <div class="col-md-6">
               <input class="multisteps-form__input form-control" id="tanggallahir" type="text" name="reg_tanggallahir" placeholder="Tanggal Lahir"/>
                </div>
              </div>
              <div class="form-group row mt-4">
                <label class="col-md-2" >Usia</label>
                <div class="input-group col-md-3">
               <input class="multisteps-form__input form-control" type="number" name="usiatahun"/>
               <div class="input-group-append">
                <span class="input-group-text">Tahun</span>
              </div>
                </div>
                <div class="input-group col-md-3">
                 <input class="multisteps-form__input form-control" type="number" name="usiabulan"/>
                 <div class="input-group-append">
  <span class="input-group-text">Bulan</span>
</div>
                 </div>
              </div>
              <div class="form-group row mt-4">
                <label class="col-md-2" >Jenis Kelamin</label>
                <div class="col-md-6">
                <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="reg_kelamin" value="Laki Laki" onclick="show1();" >
  <label class="form-check-label">Laki Laki</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="reg_kelamin" value="Perempuan" onclick="show2();" >
  <label class="form-check-label">Perempuan</label>
</div>
                </div>
              </div>

              <div class="form-group row mt-4" id="ifcewe" style="display: none;">
                <label class="col-md-2" >Bila perempuan, apakah hamil atau pasca melahirkan?</label>
                <div class="col-md-6">
                <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="reg_hamil_pasca" value="Ya">
  <label class="form-check-label" >Ya</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="reg_hamil_pasca" value="Tidak">
  <label class="form-check-label">Tidak</label>
</div>
                </div>
              </div>

              <div class="form-group row mt-4">
                <label class="col-md-2" >Alamat</label>
                <div class="col-md-6">
               <input class="multisteps-form__input form-control" type="text" name="reg_alamat" placeholder="Alamat Pasien"/>
                </div>
              </div>
              
              <div class="form-group row mt-4">
                <label class="col-md-2" >Nomor Telp/HP</label>
                <div class="col-md-6">
               <input class="multisteps-form__input form-control" type="text" name="reg_notelp_pasien" placeholder="Nomor Telp/HP Pasien"/>
                </div>
              </div>
              <hr>
              <h4 class="mb-1 mt-0">Riwayat Perawatan</h4>
              <button class="btn btn-sm btn-primary" id="tambah">Tambah Riwayat</button>
              <div class="field_wrapper">
            </div> <!-- wrapper field-->
        </div>
        <div id="sw-default-step-3">
            <div class="form-group row mt-4">
                <label class="col-md-2" >Tanggal onset gejala (panas)</label>
                <div class="col-md-6">
               <input class="multisteps-form__input form-control" type="text" id="onsetpanas" name="reg_onsetpanas" placeholder="Tanggal Onset Panas"/>
                </div>
              </div>
            <div class="form-group row mt-4">
                <label class="col-md-2" >Panas</label>
                <div class="col-md-6">
                <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="reg_gejpanas" value="Ya">
  <label class="form-check-label">Ya</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="reg_gejpanas" value="Tidak">
  <label class="form-check-label">Tidak</label>
</div>
                </div>
              </div>
              <div class="form-group row mt-4">
                <label class="col-md-2" >Batuk</label>
                <div class="col-md-6">
                <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="reg_gejbatuk" value="Ya">
  <label class="form-check-label">Ya</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="reg_gejbatuk" value="Tidak">
  <label class="form-check-label">Tidak</label>
</div>
                </div>
              </div>
              <div class="form-group row mt-4">
                <label class="col-md-2" >Nyeri Tenggorokan</label>
                <div class="col-md-6">
                <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="reg_gejnyeritenggorokan" value="Ya">
  <label class="form-check-label">Ya</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="reg_gejnyeritenggorokan" value="Tidak">
  <label class="form-check-label">Tidak</label>
</div>
                </div>
              </div>
              <div class="form-group row mt-4">
                <label class="col-md-2" >Sesak Nafas</label>
                <div class="col-md-6">
                <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="reg_gejsesaknafas" value="Ya">
  <label class="form-check-label">Ya</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="reg_gejsesaknafas" value="Tidak">
  <label class="form-check-label">Tidak</label>
</div>
                </div>
              </div>
              <div class="form-group row mt-4">
                <label class="col-md-2" >Pilek</label>
                <div class="col-md-6">
                <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="reg_gejpilek" value="Ya">
  <label class="form-check-label">Ya</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="reg_gejpilek" value="Tidak">
  <label class="form-check-label">Tidak</label>
</div>
                </div>
              </div>
              <div class="form-group row mt-4">
                <label class="col-md-2" >Lesu</label>
                <div class="col-md-6">
                <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="reg_gejlesu" value="Ya">
  <label class="form-check-label">Ya</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="reg_gejlesu" value="Tidak">
  <label class="form-check-label">Tidak</label>
</div>
                </div>
              </div>
              <div class="form-group row mt-4">
                <label class="col-md-2" >Sakit Kepala</label>
                <div class="col-md-6">
                <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="reg_gejsakitkepala" value="Ya">
  <label class="form-check-label">Ya</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="reg_gejsakitkepala" value="Tidak">
  <label class="form-check-label">Tidak</label>
</div>
                </div>
              </div>
              <div class="form-group row mt-4">
                <label class="col-md-2" >Diare</label>
                <div class="col-md-6">
                <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="reg_gejdiare" value="Ya">
  <label class="form-check-label">Ya</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="reg_gejdiare" value="Tidak">
  <label class="form-check-label">Tidak</label>
</div>
                </div>
              </div>
              <div class="form-group row mt-4">
                <label class="col-md-2" >Mual/Muntah</label>
                <div class="col-md-6">
                <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="reg_gejmualmuntah" value="Ya">
  <label class="form-check-label">Ya</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="reg_gejmualmuntah" value="Tidak">
  <label class="form-check-label">Tidak</label>
</div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="gejlain">Gejala Lainnya (jelaskan)</label>
                <div class="col-md-10">
  <textarea class="form-control" rows="3" name="reg_gejlain" id="gejlain"></textarea>
                </div>
            </div>

        </div>
        <div id="sw-default-step-4">
            <div class="form-group row mt-4">
                <label class="col-md-2" >X-Ray Paru</label>
                <div class="col-md-6">
                <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="reg_xrayparu" value="Ya">
  <label class="form-check-label">Ya</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="reg_xrayparu" value="Tidak">
  <label class="form-check-label">Tidak</label>
</div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="hasilxray">Hasil X-Ray Paru(jelaskan)</label>
                <div class="col-md-10">
  <textarea class="form-control" rows="3" name="reg_hasilxray" id="hasilxray"></textarea>
                </div>
            </div>
            <div class="form-group row mt-4">
                <label class="col-md-2" >Leukosit</label>
                <div class="col-md-6">
               <input class="multisteps-form__input form-control" type="text" name="reg_leukosit" placeholder="Leukosit"/>
                </div>
              </div>
              <div class="form-group row mt-4">
                <label class="col-md-2" >Limfosit</label>
                <div class="col-md-6">
               <input class="multisteps-form__input form-control" type="text" name="reg_limfosit" placeholder="Limfosit"/>
                </div>
              </div>
              <div class="form-group row mt-4">
                <label class="col-md-2" >Trombosit</label>
                <div class="col-md-6">
               <input class="multisteps-form__input form-control" type="text" name="reg_trombosit" placeholder="Trombosit"/>
                </div>
              </div>
            <div class="form-group row mt-4">
                <label class="col-md-2" >Menggunakan Ventilator</label>
                <div class="col-md-6">
                <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="reg_ventilator" value="Ya">
  <label class="form-check-label">Ya</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="reg_ventilator" value="Tidak">
  <label class="form-check-label">Tidak</label>
</div>
                </div>
              </div>
              <div class="form-group row mt-4">
                <label class="col-md-2" >Status Kesehatan Pasien</label>
                <div class="col-md-6">
                <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="reg_statuskes" value="Pulang">
  <label class="form-check-label">Pulang</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="reg_statuskes" value="Dirawat">
  <label class="form-check-label">Dirawat</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="reg_statuskes" value="Meninggal">
  <label class="form-check-label">Meninggal</label>
</div>
                </div>
              </div>
        </div>
        <div id="sw-default-step-5">
            <div class="form-group row mt-4">
                <label class="col-md-4" >Dalam 14 hari sebelum sakit, apakah pasien melakukan perjalanan ke luar negeri?</label>
                <div class="col-md-6">
                <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="reg_luarnegri" value="Ya">
  <label class="form-check-label">Ya</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="reg_luarnegri" value="Tidak">
  <label class="form-check-label">Tidak</label>
</div>
                </div>
              </div>
              <p><b>Jika Ya, urutkan berdasarkan tanggal kunjungan</b></p>
              <button class="btn btn-sm btn-primary" id="tambah2">Tambah Riwayat Perjalanan</button>
              <div class="field_wrapper2">
           
            </div>  <!-- wrapper -->
         
            <div class="form-group row mt-4">
                <label class="col-md-4" >Dalam 14 hari sebelum sakit, apakah pasien kontak dengan orang yang sakit?</label>
                <div class="col-md-6">
                <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="reg_kontakdgnsakit" value="Ya">
  <label class="form-check-label">Ya</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="reg_kontakdgnsakit" value="Tidak">
  <label class="form-check-label">Tidak</label>
</div>
                </div>
              </div>
              <p><b>Jika Ya, Tambahkan beberapa kontak terakhir dengan orang sakit</b></p>
              <button class="btn btn-sm btn-primary" id="tambah3">Tambah Kontak Sakit</button>
              <div class="field_wrapper3">
        
             
            </div>  <!-- Wrapper -->
           
            <div class="form-group row mt-4">
                <label class="col-md-4" >Apakah orang tersebut tersangka/terinfeksi Covid-19?</label>
                <div class="col-md-6">
                <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="reg_kontakterinfeksi " value="Ya">
  <label class="form-check-label">Ya</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="reg_kontakterinfeksi " value="Tidak">
  <label class="form-check-label">Tidak</label>
</div>
                </div>
              </div>
              <div class="form-group row mt-4">
                <label class="col-md-4" >Apakah ada anggota keluarga pasien yang sakitnya sama?</label>
                <div class="col-md-6">
                <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="reg_keluargapasiensakitsama" value="Ya">
  <label class="form-check-label">Ya</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="reg_keluargapasiensakitsama" value="Tidak">
  <label class="form-check-label">Tidak</label>
</div>
                </div>
              </div>
         
        </div>
        <div id="sw-default-step-6">
            
            <div class="form-group row mt-4">
                <label class="col-md-2" >Penyakit Kardiovaskuler/Hipertensi</label>
                <div class="col-md-6">
                <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="reg_komorbidhipertensi" value="Ya">
  <label class="form-check-label">Ya</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="reg_komorbidhipertensi" value="Tidak">
  <label class="form-check-label">Tidak</label>
</div>
                </div>
              </div>
              <div class="form-group row mt-4">
                <label class="col-md-2" >Diabetes Mellitus</label>
                <div class="col-md-6">
                <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="reg_komorbiddm" value="Ya">
  <label class="form-check-label">Ya</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="reg_komorbiddm" value="Tidak">
  <label class="form-check-label">Tidak</label>
</div>
                </div>
              </div>
              <div class="form-group row mt-4">
                <label class="col-md-2" >Liver</label>
                <div class="col-md-6">
                <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="reg_komorbidliver" value="Ya">
  <label class="form-check-label">Ya</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="reg_komorbidliver" value="Tidak">
  <label class="form-check-label">Tidak</label>
</div>
                </div>
              </div>
              <div class="form-group row mt-4">
                <label class="col-md-2" >Kronik neurologi / neuromuskula</label>
                <div class="col-md-6">
                <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="reg_komorbidneurologi" value="Ya">
  <label class="form-check-label">Ya</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="reg_komorbidneurologi" value="Tidak">
  <label class="form-check-label">Tidak</label>
</div>
                </div>
              </div>
              <div class="form-group row mt-4">
                <label class="col-md-2" >Imunodefisiensi / HIV</label>
                <div class="col-md-6">
                <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="reg_komorbidhiv" value="Ya">
  <label class="form-check-label">Ya</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="reg_komorbidhiv" value="Tidak">
  <label class="form-check-label">Tidak</label>
</div>
                </div>
              </div>
              <div class="form-group row mt-4">
                <label class="col-md-2" >Penyakit paru kronik</label>
                <div class="col-md-6">
                <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="reg_komorbidparu" value="Ya">
  <label class="form-check-label">Ya</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="reg_komorbidparu" value="Tidak">
  <label class="form-check-label">Tidak</label>
</div>
                </div>
              </div>
              <div class="form-group row mt-4">
                <label class="col-md-2" >Penyakit ginjal</label>
                <div class="col-md-6">
                <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="reg_komorbidginjal" value="Ya">
  <label class="form-check-label">Ya</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="reg_komorbidginjal" value="Tidak">
  <label class="form-check-label">Tidak</label>
</div>
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
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>

                    </div>

         

                </div>
            </div> <!-- content -->

@section('js')

<script src="{{asset('assets/libs/smartwizard/jquery.smartWizard.min.js')}}"></script>
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
var max_fields = 10; //maximum input boxes allowed
var wrapper = $(".field_wrapper"); //Fields wrapper
var add_button = $("#tambah"); //Add button ID
var x = 1; //initlal text box count
$(add_button).click(function(e){ //on add input button click
e.preventDefault();
if(x < max_fields){ //max input box allowed
x++; //text box increment
$(wrapper).append('<div class="tambahan"><div class="form-group row mt-4"><label class="col-md-2" >Tanggal Dirawat</label><div class="input-group col-md-3"><input class="multisteps-form__input form-control" type="number" min="1" max="31" name="tanggalrawat[]"/><div class="input-group-append"><span class="input-group-text">Tanggal</span></div></div><div class="input-group col-md-3"><input class="multisteps-form__input form-control" type="number" min="1" max="12" name="bulanrawat[]"/><div class="input-group-append"><span class="input-group-text">Bulan</span></div></div><div class="input-group col-md-3"><input class="multisteps-form__input form-control" type="number" min="1900" max="2020" name="tahunrawat[]"/><div class="input-group-append"><span class="input-group-text">Tahun</span></div></div></div><div class="form-group row mt-4"><label class="col-md-2" >Rumah Sakit / Fasyankes</label><div class="col-md-6"><input class="multisteps-form__input form-control" type="text" name="tempatrawat[]" placeholder="Nama RS/Fasyankes"/></div></div><div style="cursor:pointer;" class="remove_field btn btn-danger btn-sm">Remove</div></div>');
}
});
$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
e.preventDefault(); $(this).parent('div').remove(); x--;
})
//////////////////////////////
var wrapper2 = $(".field_wrapper2"); //Fields wrapper
var add_button2 = $("#tambah2"); //Add button ID
var x2 = 1; //initlal text box count
$(add_button2).click(function(e){ //on add input button click
e.preventDefault();
if(x2 < max_fields){ //max input box allowed
x2++; //text box increment
$(wrapper2).append('<div class="tambahan2"><div class="form-group row mt-4"><label class="col-md-2">Tanggal Kunjungan</label><div class="input-group col-md-1"><input class="multisteps-form__input form-control" type="text" name="tanggalkeluarnegri[]"/><div class="input-group-append"><span class="input-group-text">Tanggal</span></div></div><div class="input-group col-md-1"><input class="multisteps-form__input form-control" type="text" name="bulankeluarnegri[]"/><div class="input-group-append"><span class="input-group-text">Bulan</span></div></div><div class="input-group col-md-1"><input class="multisteps-form__input form-control" type="text" name="tahunkeluarnegri[]"/><div class="input-group-append"><span class="input-group-text">Tahun</span></div></div></div><div class="form-group row mt-4"><label class="col-md-2" >Lokasi Kunjungan</label><div class="input-group col-md-3"><div class="input-group-preppend"><span class="input-group-text">Kota</span></div><input class="multisteps-form__input form-control" type="text" name="kota[]"/></div><div class="input-group col-md-3"><div class="input-group-preppend"><span class="input-group-text">Negara</span></div><input class="multisteps-form__input form-control" type="text" name="negara[]"/></div></div><div style="cursor:pointer;" class="remove_field2 btn btn-danger btn-sm">Remove</div></div></div>'); //add input box
}
});
$(wrapper2).on("click",".remove_field2", function(e){ //user click on remove text
e.preventDefault(); $(this).parent('div').remove(); x2--;
})
/////////////////////////
var wrapper3 = $(".field_wrapper3"); //Fields wrapper
var add_button3 = $("#tambah3"); //Add button ID
var x3 = 1; //initlal text box count
$(add_button3).click(function(e){ //on add input button click
e.preventDefault();
if(x3 < max_fields){ //max input box allowed
x3++; //text box increment
$(wrapper3).append('<div class="tambahan3"><div class="form-group row mt-4"><div class="input-group col-md-3"><div class="input-group-preppend"><span class="input-group-text">Nama</span></div><input class="multisteps-form__input form-control" type="text"  name="namakontak[]"/></div><div class="input-group col-md-3"><div class="input-group-preppend"><span class="input-group-text">Alamat</span></div><input class="multisteps-form__input form-control" type="text"  name="alamatkontak[]"/></div><div class="input-group col-md-3"><div class="input-group-preppend"><span class="input-group-text">Hubungan</span></div><input class="multisteps-form__input form-control" type="text" name="hubungankontak[]"/></div><div class="input-group col-md-3"><div class="input-group-preppend"><span class="input-group-text">Tanggal</span></div><input class="multisteps-form__input form-control" type="text"  name="tanggalkontak[]" placeholder="DD/MM/YYYY"/></div></div><div style="cursor:pointer;" class="remove_field3 btn btn-danger btn-sm">Remove</div></div>'); //add input box
}
});
$(wrapper3).on("click",".remove_field3", function(e){ //user click on remove text
e.preventDefault(); $(this).parent('div').remove(); x3--;
})
 });
</script>
<script src="{{asset('assets/libs/flatpickr/flatpickr.min.js')}}"></script>
<script>
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