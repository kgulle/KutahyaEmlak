<?php
	include"baglanti.php";
	
	$emlakci_id=$_GET['emlakci_id'];
	$islem = $_GET['islem'];
	$ad =$_POST['ad'];
	$adres =$_POST['adres'];
	$hakkinda =$_POST['hakkinda'];
	$logo_url =$_FILES["logo_url"]["tmp_name"];
	$eposta =$_POST['eposta'];
	$sifre =$_POST['sifre'];
	$esifre =$_POST['esifre'];
	$seviye =$_POST['seviye'];
	$telefon =$_POST['telefon'];
	$sifre=md5($sifre);
	$esifre=md5($esifre);
	
	if($seviye=="") $seviye=0;
	
	
	if($islem=="ekle"){ 
		
		
		require 'class.upload.php';
		$image = new Upload( $_FILES[ 'logo_url' ] );
		if ( $image->uploaded ) {
			
			$image->image_convert = 'jpg';
			$image->image_resize = true;
			$image->image_ratio_crop = true;
			$image->image_x = 261;
			$image->image_y = 261;
			$image->file_name_body_pre = 'logo_';
			$image->allowed = array ( 'image/*' );
			$image->Process( 'resimler/logolar' );
			
			if ( $image->processed ){
				$hedefdosya=$image->file_dst_path . $image->file_dst_name;
				//$sifre=md5($sifre);
				$sorgu=$veritabani->prepare("insert into  emlakcilar (ad,adres,hakkinda,logo_url,eposta,sifre,seviye,telefon)
				values ('$ad','$adres','$hakkinda','$hedefdosya','$eposta','$sifre','$seviye','$telefon')");
				$sorgu->execute();
				
				echo "<script language='JavaScript'>alert('Ekleme Başarılı! !'); document.location=('emlakci_listele.php')</script>";
				
				echo "<script language='JavaScript'>alert('Ekleme Başarılı! !');
				document.location=('emlakci_listele.php')</script>";	
				} else {
				print 'Bir sorun oluştu: '.$image->error;
			}
		}
		
		} elseif($islem=="sil"){
		
		$sorgu1=$veritabani->prepare("SELECT logo_url from emlakcilar WHERE emlakci_id=$emlakci_id"); // sorgumuz
		$sorgu1->execute();
		$logo_url = $sorgu1->fetchColumn(); 
		unlink($logo_url); //resmi sunucudan siliyoruz
		
		$sorgu=$veritabani->prepare("DELETE FROM emlakcilar WHERE emlakci_id='$emlakci_id'"); // sorgumuz
		$sorgu->execute(); 
		
		echo "<script language='JavaScript'>alert('Emlkaci Silindi !');
		document.location=('emlakci_listele.php')</script>";	
		
	} 
	
	elseif($islem=="duzenle"){
		
		
		require 'class.upload.php';
		$image = new Upload( $_FILES[ 'logo_url' ] );
		if ( $image->uploaded ) {
			
			$image->image_convert = 'jpg';
			$image->image_resize = true;
			$image->image_ratio_crop = true;
			$image->image_x = 261;
			$image->image_y = 261;
			$image->file_name_body_pre = 'logo_';
			$image->allowed = array ( 'image/*' );
			$image->Process( 'resimler/logolar' );
			
			if ( $image->processed ){
				$hedefdosya=$image->file_dst_path . $image->file_dst_name;
				$sorgu=$veritabani->prepare("UPDATE emlakcilar SET
				ad='$ad',
				eposta='$eposta',
				telefon='$telefon',
				seviye=$seviye,
				adres='$adres',
				hakkinda='$hakkinda',	
				logo_url='$hedefdosya'
				WHERE emlakci_id='$emlakci_id'");	
				
				$sorgu->execute();
				if($seviye=="1") 
				echo "<script language='JavaScript'>alert('Düzenleme Başarılı! !'); document.location=('emlakci_listele.php')</script>";
				else echo "<script language='JavaScript'>alert('Düzenleme Başarılı! !'); document.location=('profil.php')</script>";
				
				} else {
				print 'Bir sorun oluştu: '.$image->error;
			}
			} else { // resim secilmeden guncelemek istenirse dosya adini gunceleme
			$sorgu=$veritabani->prepare("UPDATE emlakcilar SET
			ad='$ad',
			eposta='$eposta',
			sifre='$sifre',
			seviye=$seviye,
			telefon='$telefon',
			adres='$adres',
			hakkinda='$hakkinda'
			WHERE emlakci_id='$emlakci_id'");	
			$sorgu->execute();
			echo "<br/><script language='JavaScript'>alert('Veriler Guncellendi !'); document.location=('emlakci_listele.php')</script>";
		}
		} elseif($islem=="sifreduzenle"){
		$sorgu1=$veritabani->prepare("SELECT * from emlakcilar WHERE sifre='$esifre'"); // sorgumuz
		$sorgu1->execute();
		
		if($sorgu1->fetchColumn()) { //sifre dogru ise
			$sorgu=$veritabani->prepare("UPDATE emlakcilar SET sifre='$sifre' WHERE emlakci_id=$emlakci_id");	
			$sorgu->execute();
			if($seviye=="1") 
			echo "<script language='JavaScript'>alert('Ekleme Başarılı! !'); document.location=('emlakci_listele.php')</script>";
			else echo "<script language='JavaScript'>alert('Ekleme Başarılı! !'); document.location=('profil.php')</script>";
			} else { 
			if($seviye=="1") 
			echo "<script language='JavaScript'>alert('Şifre düzenleme Başarılı! !'); document.location=('emlakci_listele.php')</script>";
			else echo "<script language='JavaScript'>alert('Şifre düzenleme Başarılı! !'); document.location=('profil.php')</script>";
		} 
	} 
	else echo "<br/><script language='JavaScript'> document.location=('index.php')</script>";
?>	



