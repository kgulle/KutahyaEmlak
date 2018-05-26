<?php include"session.php";
	include"baglanti.php";
	
	$ilce_id=$_POST['ilce_id'];
	$ilce_ad = $_POST['ilce_ad'];
	$mahalle_id=$_POST['mahalle_id'];
	$mahalle_ad = $_POST['mahalle_ad'];
	$islem = $_GET['islem'];
	
	
	if($islem=="ilceekle") {
		$sorgu=$veritabani->prepare("insert into ilceler (ilce_ad)
		values ('$ilce_ad')");
		$sorgu->execute();
		echo "<script language='JavaScript'>alert('İlçe ekleme başarılı! !');
		document.location=('adres_tanimlari.php')</script>";
		
	}
	elseif($islem=="ilcesil") {
		$sorgu=$veritabani->prepare("DELETE FROM ilceler WHERE ilce_id='$ilce_id'"); // sorgumuz
		$sorgu->execute(); 
		
		echo "<script language='JavaScript'>alert('İlçe Silindi !');
		document.location=('adres_tanimlari.php')</script>";
		
		} elseif($islem=="mahalleekle") {
		$sorgu=$veritabani->prepare("insert into  mahalle (mahalle_ad,ilce_id)
		values ('$mahalle_ad',$ilce_id)");
		$sorgu->execute();
		echo "<script language='JavaScript'>alert('Mahalle ekleme başarılı! !');
		document.location=('adres_tanimlari.php')</script>";
		
		}elseif($islem=="mahallesil") {
		$sorgu=$veritabani->prepare("DELETE FROM mahalle WHERE mahalle_id='$mahalle_id'"); // sorgumuz
		$sorgu->execute(); 
		
		echo "<script language='JavaScript'>alert('Mahalle Silindi !');
		document.location=('adres_tanimlari.php')</script>";
		
	}else echo "<script language='JavaScript'>
		document.location=('adres_tanimlari.php')</script>";
?>

