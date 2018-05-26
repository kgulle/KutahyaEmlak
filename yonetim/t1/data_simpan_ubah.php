<?php
include"koneksi.php";
$idubah=$_POST['idubah'];
$ver_nama =$_POST['ver_nama'];
$ver_alamat=$_POST['ver_alamat'];
$sql_simpan=$verlipdo->prepare("UPDATE tb_siswa SET
  			    nama_siswa='$ver_nama',
				alamat_siswa='$ver_alamat'
				WHERE id_siswa='$idubah'");	

$sql_simpan->execute();
?>
<br/>
<script language="JavaScript">alert('Data Berhasil Di Ubah !');
document.location=('index.php')</script>
