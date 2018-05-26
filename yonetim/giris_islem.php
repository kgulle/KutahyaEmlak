<?php
	include "baglanti.php";

	session_start();
	$eposta = $_POST['eposta'];
	$sifre = $_POST['sifre'];
	$sifre=md5($sifre);
	$islem = $_GET['islem'];
	if($islem=="giris"){
		$vt_sorgu=$veritabani->prepare("select * from emlakcilar where eposta=:eposta and sifre=:sifre");
		$vt_sorgu->bindParam(':eposta', $eposta);
		$vt_sorgu->bindParam(':sifre', $sifre);
		$vt_sorgu->execute();
		$sonuc = $vt_sorgu->rowCount();
		if($sonuc== 1){
			$sonuc=$vt_sorgu->fetch();
			$_SESSION['eposta'] = $sonuc['eposta'];
			$_SESSION['sifre'] = md5($sonuc['sifre']); 
			$_SESSION['seviye'] = $sonuc['seviye'];
			$_SESSION['emlakci_id'] = $sonuc['emlakci_id'];
			$_SESSION['logo_url'] = $sonuc['logo_url'];
			$_SESSION['ad'] = $sonuc['ad'];
			
			//Verly HTACCESS
			$homepage="index.php";
			//Verly HTACCESS END
			if(($sonuc['seviye']=="0") or ($sonuc['seviye']=="1")){
				header("location:index.php");
				}
			}else{
			echo "<script language='JavaScript'>alert('Giriş Başarısız !!!');
				document.location=('giris.php')</script>";
		}
		}else if($islem=="cikis"){
		unset($_SESSION['eposta']);
		unset($_SESSION['seviye']);
		unset($_SESSION['sifre']);
		unset($_SESSION['emlakci_id']);
		unset($_SESSION['logo_url']);
		unset($_SESSION['ad']);
		
		header("location:giris.php");
	}
?>

