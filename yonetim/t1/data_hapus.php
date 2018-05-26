<!--VERLY DELETED DATA -->
<?php
include_once "koneksi.php";
$idhapus=$_GET['idhapus'];//memanggil ID siswa
$verlihapus=$verlipdo->prepare("DELETE FROM tb_siswa  WHERE id_siswa='$idhapus'"); //Menghapus data Siswa
$verlihapus->execute();
?>
<script language="JavaScript">alert('Data Berhasil Di Hapus !');
document.location=('index.php')</script>
