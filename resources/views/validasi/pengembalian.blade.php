@extends('layouts.web')
@section('title','- Pengembalian Hasil Pemeriksaan')
@section('content')

            <div class="content">
                <div class="container-fluid">
                    <div class="row page-title align-items-center">
                         <div class="col-sm-4 col-xl-6">
                            <h4 class="mb-1 mt-0">Pengembalian Hasil Pemeriksaan</h4>
                        </div>
                        <div class="col-sm-8 col-xl-6">
                           <a href="{{url('validasi')}}" class="btn btn-md btn-primary float-right"><i class="uil-arrow-left"></i> Kembali</a>
                        </div>
                    </div>
                    <!-- content -->
  <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-body">  
                <h4 class="header-title mt-0 mb-1"></h4>
<form method="POST" action="{{url('validasi/kembalikan')}}">
    @csrf
<h5>Kembalikan Sampel ke Pemeriksaan</h5>
<p>Silahkan isi kotak isian dibagian bawah halaman ini dengan keterangan dan alasan yang jelas untuk mengembalikan sampel ke Lab Pemeriksaan, setelah status sampel dikembalikan ke Pemeriksaan, tidak bisa dikembalikan oleh Lab Pemeriksa</p>
<hr>


<div class="row">
                                              <div class="col-md-6">
                                            <table class="table">
          <tbody>
            <tr>
              <td width="40%"><b>Nomor Registrasi</b></td>
              <td width="60%">@if(is_null($pemreturn->reg_nik))
              <span class="badge badge-danger">Identitas Pasien belum dimasukan Register</span>
              @else
              {{$pemreturn->pem_noreg}}
              @endif</td>
            </tr>
            <tr>
                <td width="40%"><b>Nomor Induk Kependudukan</b></td>
                <td width="60%">@if(is_null($pemreturn->reg_nik))
              <span class="badge badge-danger">Identitas Pasien belum dimasukan Register</span>
              @else
              {{$pemreturn->reg_nik}}
              @endif</td>
              </tr>
              <tr>
                <td width="40%"><b>Sampel yang Diperiksa</b></td>
                <td width="60%"><span class="badge badge-primary">{{$pemreturn->sam_barcodenomor_sampel}}</span>
                </td>
              </tr>
              <tr>
                <td width="40%"><b>Jenis Sampel</b></td>
                <td width="60%">@if($pemreturn->sam_jenis_sampel == 1)
                  Usap Nasofaring & Orofaring
                  @elseif($pemreturn->sam_jenis_sampel == 2)
                  Sputum
                  @elseif($pemreturn->sam_jenis_sampel == 3)
                  Bronchoalveolar Lavage
                   @elseif($pemreturn->sam_jenis_sampel == 4)
                   Tracheal Aspirate
                   @elseif($pemreturn->sam_jenis_sampel == 5)
                   Nasal Wash
                   @elseif($pemreturn->sam_jenis_sampel == 6)
                   Jaringan Biopsi/Otopsi
                   @elseif($pemreturn->sam_jenis_sampel == 7)
                   Serum Akut (kurang dari 7 hari demam) 
                   @elseif($pemreturn->sam_jenis_sampel == 8)
                   Serum konvalesen (2-3 minggu demam)
                   @elseif($pemreturn->sam_jenis_sampel == 9)
                   Whole Blood
                   @elseif($pemreturn->sam_jenis_sampel == 10)
                   Plasma
                   @elseif($pemreturn->sam_jenis_sampel == 11)
                   Fingerprick 
                   @elseif($pemreturn->sam_jenis_sampel == 12)
                   Jenis Sampel Lainnya : {{$pemreturn->sam_namadiluarjenis}}
                   @else
                   Jenis Sampel Lainnya : {{$pemreturn->sam_namadiluarjenis}}
                  @endif
                 </td>
              </tr>
              <tr>
                <td width="40%"><b>Tanggal Penerimaan sampel</b></td>
                <td width="60%">{{$pemreturn->pem_tanggal_penerimaan_sampel}} pada {{$pemreturn->pem_jam_penerimaan_sampel}}</td>
              </tr>
              <tr>
                <td width="40%"><b>Petugas Penerima Sampel RNA</b></td>
                <td width="60%">{{$pemreturn->pem_petugas_penerima_sampel_rna}}</td>
              </tr>
              <tr>
                <td width="40%"><b>Lab Penerima</b></td>
                <td width="60%">
                @if(!is_null($pemreturn->pem_lab_penerima_sampel))
                {{$pemreturn->pem_lab_penerima_sampel}}
                @else
                {{$pemreturn->pem_lab_penerima_sampel_lainnya}}
                @endif</td>
</tr>
          </tbody>
        </table>
</div>
<div class="col-md-6">
<tr>
<table class="table">
          <tbody>
            <tr>
          <td width="40%"><b>Operator Realtime PCR</b></td>
                <td width="60%">{{$pemreturn->pem_operator_real_time_pcr}}</td>
              </tr>
              <tr>
                <td width="40%"><b>Tanggal Mulai Pemeriksaan</b></td>
                <td width="60%">{{$pemreturn->pem_tanggal_mulai_pemeriksaan }}</td>
              </tr>
              <tr>
                <td width="40%"><b>Jam Mulai Pemeriksaan</b></td>
                <td width="60%">{{$pemreturn->pem_jam_mulai_pcr }}</td>
              </tr>
              <tr>
                <td width="40%"><b>Jam Selesai Pemeriksaan</b></td>
                <td width="60%">{{$pemreturn->pem_jam_selesai_pcr }}</td>
              </tr>
              <tr>
                <td width="40%"><b>Metode Pemeriksaan</b></td>
                <td width="60%">{{$pemreturn->pem_metode_pemeriksaan}}</td>
              </tr>
              <tr>
                <td width="40%"><b>Nama Kit Pemeriksaan</b></td>
                <td width="60%">{{$pemreturn->pem_nama_kit_pemeriksaan}}</td>
              </tr>
              <tr>
                <td width="40%"><b>Target Gen</b></td>
                <td width="60%">{{$pemreturn->pem_target_gen}}</td>
              </tr>
              <tr>
                <td width="40%"><b>Hasil Deteksi</b></td>
                <td width="60%">CT Value {{$pemreturn->pem_hasil_deteksi }}</td>
              </tr>
              <tr>
                <td width="40%"><b>Sampel yang Diperiksa</b></td>
                <td width="60%">  @if($pemreturn->pem_kesimpulan_pemeriksaan == "Positif")
       <span class="badge badge-danger">Positif</span>
       @else
       <span class="badge badge-success">Negatif</span>
       @endif
                </td>
              </tr>
          </tbody>
        </table>
            
</div>
</div>

<table class="table">
          <tbody>
            <tr>
                <td width="40%"><b>Catatan</b></td>
                <td width="60%">{{$pemreturn->pem_catatan}}</td>
              </tr>  
          </tbody>
        </table>
<hr>
<div class="form-group row">
      <label class="col-md-2 col-form-label">Catatan Pengembalian <span style="color:red;"> *</span></label>
      <div class="col-md-10">
<textarea class="form-control" rows="5" name="note_isi" required> Isi kondisi, alasan, dll</textarea>
      </div>
  </div>
  <input type="hidden" name="note_item_id" value="{{$pemreturn->pem_id}}" >
  <input type="hidden" name="note_item_type" value="22">
  <input type="hidden" name="note_userid" value="{{Auth::user()->id}}">
  <input type="hidden" name="pemid" value="{{$pemreturn->pem_id}}">


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
          
@endsection