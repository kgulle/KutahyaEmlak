<?php
	include"baglanti.php";
	include"session.php";
	
	$islem = $_GET['islem'];
	$ilan_id = $_GET['ilan_id'];
	$resim_id = $_GET['resim_id'];
	$ilce_id =$_POST['ilce_id'];
	$mahalle_id =$_POST['mahalle_id'];
	$emlak_tip_id =$_POST['emlak_tip_id'];
	$esyali =$_POST['esyali'];
	$kiralik_satilik =$_POST['kiralik_satilik'];
	$aktif =$_POST['aktif'];
	$ilan_baslik =$_POST['ilan_baslik'];
	$ilan_aciklama =$_POST['ilan_aciklama'];
	$fiyat =$_POST['fiyat'];
	$metre_kare =$_POST['metre_kare'];
	$oda_tip_id =$_POST['oda_tip_id'];
	$bina_yas =$_POST['bina_yas'];
	$bulundugu_kat =$_POST['bulundugu_kat'];
	$kat_sayisi =$_POST['kat_sayisi'];
	$isitma_tip_id =$_POST['isitma_tip_id'];
	$emlakci_id=$_SESSION['emlakci_id'];
	
	if($islem=="ekle"){ 
		$sorgu=$veritabani->prepare("insert into ilanlar 
		(emlakci_id,ilce_id,mahalle_id,emlak_tip_id,oda_tip_id,esyali,kiralik_satilik,aktif,ilan_baslik,ilan_aciklama,fiyat, metre_kare,bina_yas,bulundugu_kat,kat_sayisi,isitma_tip_id)
		values ($emlakci_id,$ilce_id,$mahalle_id,$emlak_tip_id,$oda_tip_id,'$esyali','$kiralik_satilik','$aktif',
		'$ilan_baslik','$ilan_aciklama',$fiyat,$metre_kare,$bina_yas,$bulundugu_kat,$kat_sayisi,$isitma_tip_id)");
		$sorgu->execute();
		
		$ilan_id= $veritabani->lastInsertId();
		
		require 'class.upload.php';
		
		$esim_sayisi = count($_FILES['image']['name']);		
		for($i=0; $i<$esim_sayisi; $i++) {
			$image = new Upload( $_FILES['image']['tmp_name'][$i] );
			if ( $image->uploaded ) {
				$image->image_text_font = 10;
				$image->image_text_color = '#000000';
				$image->image_text_position = 'BR';
				$image->image_text = 'kutahyaemlakcim.com #ilanNO:'.$ilan_id;
				
				$image->image_watermark_position = 'BL';
				$image->image_watermark = 'logo.png';
				
				$image->image_convert = 'jpg';				
				$image->image_resize = true;				
				$image->image_ratio_crop = true;				
				$image->image_x = 948;				
				$image->image_y = 632;				
				$image->file_name_body_pre = 'ilan_'.$ilan_id._;				
				$image->allowed = array ('image/*');				
				$image->Process('../resimler/ilanlar');
				
				if ( $image->processed ){					
					$hedefdosya=ltrim($image->file_dst_path . $image->file_dst_name,"../");					
					$sorgu=$veritabani->prepare("insert into ilan_resim (ilan_id,resim_url)					
					values ($ilan_id,'$hedefdosya')");					
					$sorgu->execute();				
					
					} else {					
					print 'Bir sorun oluştu: '.$image->error;					
				}
			}
			
			echo "<br/><script language='JavaScript'>alert('İlan eklendi !'); document.location=('ilan_listele.php')</script>";
		}
	} 
	elseif($islem=="sil"){ 
		
		$sorgu1=$veritabani->prepare("SELECT resim_url from ilan_resim WHERE ilan_id=$ilan_id"); // sorgumuz
		$sorgu1->execute();
		while($sonuc=$sorgu1->fetch()){
			$resim_yol="../".$sonuc['resim_url'];
			unlink($resim_yol); //resmi sunucudan siliyoruz
		}
		$sorgu=$veritabani->prepare("DELETE FROM ilanlar WHERE ilan_id=$ilan_id"); // sorgumuz
		$sorgu->execute(); 
		
		echo "<script language='JavaScript'> document.location=('ilan_listele.php')</script>";
		
		
	} 
	elseif($islem=="resimekle"){ 
		require 'class.upload.php';
		$esim_sayisi = count($_FILES['image']['name']);		
		for($i=0; $i<$esim_sayisi; $i++) {
			$image = new Upload( $_FILES['image']['tmp_name'][$i] );
			if ( $image->uploaded ) {
				$image->image_ratio_fill = true;
				$image->image_ratio_crop = true;				
				
				$image->image_text_padding = 5;
				
				$image->image_text_color = '#000000';
				$image->image_text_position = 'BR';
				
				$image->image_text = 'KutahyaEmlakcim.com #ilanNO:'.$ilan_id;
				
				$image->image_watermark_position = 'BL';
				$image->image_watermark = 'logo.png';
				
				$image->image_convert = 'jpg';				
				$image->image_resize = true;				
				$image->image_x = 948;				
				$image->image_y = 632;				
				$image->file_name_body_pre = 'ilan_'.$ilan_id._;				
				$image->allowed = array ('image/*');				
				$image->Process('../resimler/ilanlar');
				
				if ( $image->processed ){					
					$hedefdosya=ltrim($image->file_dst_path . $image->file_dst_name,"../");					
					$sorgu=$veritabani->prepare("insert into ilan_resim (ilan_id,resim_url)					
					values ($ilan_id,'$hedefdosya')");					
					$sorgu->execute();				
					} else {					
					print 'Bir sorun oluştu: '.$image->error;					
				}
			}
			echo "<br/><script language='JavaScript'> document.location=('ilan_duzenle.php?islem=duzenle&ilan_id=$ilan_id')</script>";
		}
	} 
	elseif($islem=="resimsil"){ 
		$sorgu1=$veritabani->prepare("SELECT resim_url from ilan_resim WHERE resim_id='$resim_id'"); // sorgumuz
		$sorgu1->execute();
		while($sonuc=$sorgu1->fetch()){
			$resim_yol="../".$sonuc['resim_url'];
			unlink($resim_yol); //resmi sunucudan siliyoruz
		}
		$sorgu=$veritabani->prepare("DELETE FROM ilan_resim WHERE resim_id=$resim_id"); // sorgumuz
		$sorgu->execute(); 
		echo "<script language='JavaScript'> document.location=('ilan_duzenle.php?islem=duzenle&ilan_id=$ilan_id')</script>";
	}
	elseif($islem=="duzenle"){ 
		$sorgu=$veritabani->prepare("UPDATE ilanlar SET 
		ilce_id=$ilce_id,
		mahalle_id=$mahalle_id,
		emlak_tip_id=$emlak_tip_id,
		oda_tip_id=$oda_tip_id,
		esyali=$esyali,
		kiralik_satilik=$kiralik_satilik,
		aktif=$aktif,
		ilan_baslik='$ilan_baslik',
		ilan_aciklama='$ilan_aciklama',
		fiyat=$fiyat,
		metre_kare=$metre_kare,
		bina_yas=$bina_yas,
		bulundugu_kat=$bulundugu_kat,
		kat_sayisi=$kat_sayisi,
		isitma_tip_id=$isitma_tip_id
		WHERE ilan_id=$ilan_id");
		$sorgu->execute();
		echo " <script language='JavaScript'> alert('Düzenleme Basarili !'); document.location=('ilan_listele.php')</script>";
	}
	elseif($islem=="aktifyap"){ 
	$sorgu=$veritabani->prepare("UPDATE ilanlar SET 
		aktif=1 WHERE ilan_id=$ilan_id");
		$sorgu->execute();
		echo " <script language='JavaScript'> document.location=('ilan_listele.php')</script>";
	}
	elseif($islem=="pasifyap"){ 
	$sorgu=$veritabani->prepare("UPDATE ilanlar SET 
		aktif=0 WHERE ilan_id=$ilan_id");
		$sorgu->execute();
		echo " <script language='JavaScript'> document.location=('ilan_listele.php')</script>";
	}
	
		elseif($islem=="populeryap"){ 
	$sorgu=$veritabani->prepare("UPDATE ilanlar SET 
		populer=1 WHERE ilan_id=$ilan_id");
		$sorgu->execute();
		echo " <script language='JavaScript'> document.location=('ilan_listele.php')</script>";
	}
		elseif($islem=="populeryapma"){ 
	$sorgu=$veritabani->prepare("UPDATE ilanlar SET 
		populer=0 WHERE ilan_id=$ilan_id");
		$sorgu->execute();
		echo " <script language='JavaScript'> document.location=('ilan_listele.php')</script>";
	}
		elseif($islem=="mansetyap"){ 
	$sorgu=$veritabani->prepare("UPDATE ilanlar SET 
		manset=1 WHERE ilan_id=$ilan_id");
		$sorgu->execute();
		echo " <script language='JavaScript'> document.location=('ilan_listele.php')</script>";
	}
		elseif($islem=="mansetyapma"){ 
	$sorgu=$veritabani->prepare("UPDATE ilanlar SET 
		manset=0 WHERE ilan_id=$ilan_id");
		$sorgu->execute();
		echo " <script language='JavaScript'> document.location=('ilan_listele.php')</script>";
	}
	
	
	
	else echo " <script language='JavaScript'> document.location=('ilan_listele.php')</script>";
?>		








