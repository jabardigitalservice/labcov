<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <title>X</title>
</head>
<body>
    <center>  
  <table width="100%" style="width:100%" border="0">
    <tr>
      <td width="20%" align="center"><img src="https://upload.wikimedia.org/wikipedia/commons/0/07/West_Java_coa.png" width="100" height="120"></td>
      <td><center>
        <h3>PEMERINTAH DAERAH PROVINSI JAWA BARAT<br> DINAS KESEHATAN</h3>
        <h2 style="margin-top: -10px;">LABORATORIUM KESEHATAN</h2>
        <h5 style="margin-top: -10px;"></h5>Jalan Sederhana No. 3-5 Bandung, Telp. 022-2033517, Fax. 022-2033717 <br> e-mail : balailabkesjabar@yahoo.com</h5>
      </center>
   </td>
    </tr>
  </table>
    </center>
    <center>  
        <table width="100%" style="width:100%" border="0">
          <tr>
            <td width="30%">
          <hr style="border: solid 3px #000;">  
          </td>
              </tr>
            </table>
              </center>
<center>
  <table width="100%" style="width:100%">
      <tr>
        <td>&nbsp;</td>
        <td><center><h4>HASIL PEMERIKSAANTES PRO AKTIF COVID-19<br>
            No.______/Lap.COV/III/2020</h4></center></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
</center>
    <table width="100%" style="border: solid 1px #000; width:100%;   border-collapse: collapse;">
        <tr>
          <td><b>Nama Pasien</b></td>
          <td>:<u> {{$namapasien}}</u></td>
        </tr>
        <tr>
            <td width="50%"><b>Jenis Kelamin</b></td>
            <td width="50%">:<u> {{$jk}}</u></td>
          </tr>
          <tr>
            <td width="50%"><b>Tanggal Lahir / Umur</b></td>
            <td width="50%">: <u>{{$ttl}}</u></td>
          </tr>
          <tr>
            <td width="50%"><b>Nomor Registrasi Lab</b></td>
            <td width="50%">: <u>{{$noreg}}</u></td>
          </tr>
      </table>
      <br><br>
      <table width="100%" style="border: solid 1px #000; width:100%;   border-collapse: collapse;">
        <tr>
          <td width="50%"><b>Bahan Pemeriksa</b></td>
          <td width="50%">: <u>{{$bp}}</u></td>
        </tr>
        <tr>
            <td width="50%"><b>Tanggal Terima Sampel</b></td>
            <td width="50%">: <u>{{$tanggal}}</u></td>
          </tr>
          <tr>
            <td width="50%"><b>Metode</b></td>
            <td width="50%">: <u>{{$metode}}</u></td>
          </tr>
          <tr>
            <td width="50%"><b>Nomor Sampel</b></td>
            <td width="50%">: <u>{{$kodesampel}}</u></td>
          </tr>
      </table>
      <br>
      <p>Hasil Pemeriksaan : <b>{{$kesimpulanpemeriksaan}}</b></p>
      <br>
      <table width="100%" style="border: solid 1px #000; width:100%;">
        <tr>
          <td style="background-color: #cccccc;" align="center"><b>Pemeriksaan</b></td>
          <td style="background-color: #cccccc;"  align="center"><b>Tanggal</b></td>
          <td style="background-color: #cccccc;"  align="center"><b>Hasil Deteksi</b></td>
        </tr>
        <tr>
            <td align="center">{{$targetgen}}</td>
            <td align="center">{{$tanggal}}</td>
            <td align="center">CT Value <u>{{$hasdet}}</u></td>
          </tr>
      </table>
      <br><br><br>
      <table width="100%" style="width:100%" >
        <tr>
          <td  width="50%"></td> 
          <td  width="50%" align="center">Bandung, 28  September 2020<br><br><br><br><br><br><br><br>
        <u>{{$nama}}</u><br>{{$nip}}</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
</body>
</html>