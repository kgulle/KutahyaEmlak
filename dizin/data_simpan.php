<?php
include"koneksi.php";
$ver_nama =$_POST['ver_nama'];
$ver_alamat=$_POST['ver_alamat'];
$sql_simpan=$verlipdo->prepare("insert into  tb_siswa(id_siswa,nama_siswa,alamat_siswa)
values ('','$ver_nama','$ver_alamat')");
$sql_simpan->execute();
?>
<br/>
<script language="JavaScript">alert('Data Berhasil Di Simpan !');
document.location=('index.php')</script>
