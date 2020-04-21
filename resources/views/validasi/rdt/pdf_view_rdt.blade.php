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
        <td><center><h4>HASIL PEMERIKSAAN TES RAPID DIAGNOSTIC TEST COVID-19<br>
            No.{{$nosurat}}/Lap.COV/{{$bulansurat}}/2020</h4></center></td>
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
          <td>: {{$namapasien}}</td>
        </tr>
        <tr>
            <td width="50%"><b>Jenis Kelamin</b></td>
            <td width="50%">: {{$jk}}</td>
          </tr>
          <tr>
            <td width="50%"><b>Tanggal Lahir / Umur</b></td>
            <td width="50%">: {{$ttl}}</td>
          </tr>
          <tr>
            <td width="50%"><b>Nomor Registrasi Lab</b></td>
            <td width="50%">: {{$noreg}}</td>
          </tr>
      </table>
      <br><br>
      <table width="100%" style="border: solid 1px #000; width:100%;   border-collapse: collapse;">
        <tr>
          <td width="50%"><b>Bahan Pemeriksa</b></td>
          <td width="50%">: {{$bp}}</td>
        </tr>
        <tr>
            <td width="50%"><b>Tanggal RDT</b></td>
            <td width="50%">: {{$tanggal}}</td>
          </tr>
          <tr>
            <td width="50%"><b>Jenis</b></td>
            <td width="50%">: {{$jenistes}}</td>
          </tr>
        
      </table>
      <br>
      <p<b>Hasil Pemeriksaan : {{$kesimpulanpemeriksaan}}</b></p>
      <br>
      
      <p<b>Keterangan Lain : {{$keteranganlain}}</b></p>
      <br>
  
      <br><br><br>
      <table width="100%" style="width:100%" >
        <tr>
          <td  width="40%"></td> 
          <td  width="60%" align="center">Bandung, {{$tanggalsurat}}<br>
          PENANGGUNG JAWAB,<br><br><br><br><br><br><br><br>
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