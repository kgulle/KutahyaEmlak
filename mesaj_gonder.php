<?php 
	include"yonetim/baglanti.php"; 
	
	$ilan_id=$_GET['ilan_id'];
	$islem=$_GET['islem'];
	$gonderen_ad =$_POST['gonderen_ad'];
	$gonderen_mail =$_POST['gonderen_mail'];
	$gonderen_tel =$_POST['gonderen_tel'];
	$konu =$_POST['konu'];
	$mesaj =$_POST['mesaj'];
	
	if($islem=="iletisim") {
		$sorgu=$veritabani->prepare("insert into iletisim (gonderen_ad,gonderen_mail,gonderen_tel,konu,mesaj,okundu,silindi)
				values ('$gonderen_ad','$gonderen_mail','$gonderen_tel','$konu','$mesaj',0,0)");
			$sorgu->execute();
			echo "<script language='JavaScript'>alert('Mesajınız Alınmıştır...');
				document.location=('iletisim.php')</script>";	
				
	} elseif($islem=="ilanmesaj") {
	$sorgu=$veritabani->prepare("insert into  mesajlar (gonderen_ad,gonderen_mail,gonderen_tel,konu,mesaj,ilan_id,okundu,silindi)
				values ('$gonderen_ad','$gonderen_mail','$gonderen_tel','$konu','$mesaj',$ilan_id,0,0)");
			$sorgu->execute();
			echo "<script language='JavaScript'>alert('Mesajınız Alınmıştır.');
				document.location=('ilan_ayrinti.php?ilan_id=$ilan_id')</script>";			
		
		
	}  else  echo "<script language='JavaScript'>document.location=('index.php')</script>";
?>

