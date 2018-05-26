<?php include"session.php";
	include"baglanti.php";
	
	$mesaj_id=$_GET['mesaj_id'];
	$islem=$_GET['islem'];
	$emlakci_id=$_SESSION['emlakci_id'];
	
	if($islem=="sil") {
		$sorgu=$veritabani->prepare("update mesajlar SET silindi=1 WHERE mesaj_id=$mesaj_id");
		$sorgu->execute(); 
		echo "<script language='JavaScript'> document.location=('mesajlar.php')</script>";
		} elseif($islem=="kalicisil") {
		$sorgu=$veritabani->prepare("DELETE FROM mesajlar WHERE mesaj_id=$mesaj_id");
		$sorgu->execute(); 
		echo "<script language='JavaScript'> document.location=('mesajlar.php?goster=copkutusu')</script>";
	}
	
	$seviye=$_SESSION['seviye'];
	
	
	//gelen sql
	if($seviye==1) {
		$sorgu=$veritabani->prepare("
		SELECT 
		mesajlar.gonderen_ad,ilanlar.ilan_baslik,mesajlar.gonderen_mail,mesajlar.konu,mesajlar.tarih,mesajlar.mesaj_id,mesajlar.okundu
		FROM mesajlar
		INNER JOIN ilanlar ON mesajlar.ilan_id = ilanlar.ilan_id
		INNER JOIN emlakcilar ON ilanlar.emlakci_id = emlakcilar.emlakci_id
		WHERE mesajlar.silindi=0 ORDER BY mesajlar.tarih");
		$sorgu->execute();
		$gelen_mesaj_sayisi = $sorgu->rowCount();
		
		//cop kutusu sql
		$sorgu2=$veritabani->prepare("
		SELECT 
		mesajlar.gonderen_ad,ilanlar.ilan_baslik,mesajlar.gonderen_mail,mesajlar.konu,mesajlar.tarih,mesajlar.mesaj_id,mesajlar.okundu
		FROM mesajlar
		INNER JOIN ilanlar ON mesajlar.ilan_id = ilanlar.ilan_id
		INNER JOIN emlakcilar ON ilanlar.emlakci_id = emlakcilar.emlakci_id
		WHERE mesajlar.silindi=1 ORDER BY mesajlar.tarih");
		$sorgu2->execute();
		$silinen_mesaj_sayisi = $sorgu2->rowCount();
		
		//okunmamis sql
		$sorgu4=$veritabani->prepare("
		SELECT 
		mesajlar.gonderen_ad,ilanlar.ilan_baslik,mesajlar.gonderen_mail,mesajlar.konu,mesajlar.tarih,mesajlar.mesaj_id,mesajlar.okundu
		FROM mesajlar
		INNER JOIN ilanlar ON mesajlar.ilan_id = ilanlar.ilan_id
		INNER JOIN emlakcilar ON ilanlar.emlakci_id = emlakcilar.emlakci_id
		WHERE (mesajlar.okundu=0 and mesajlar.silindi=0) ORDER BY mesajlar.tarih");
		$sorgu4->execute();
		$okunmayan_mesaj_sayisi = $sorgu4->rowCount();
		
		} else {
		$sorgu=$veritabani->prepare("
		SELECT 
		mesajlar.gonderen_ad,ilanlar.ilan_baslik,mesajlar.gonderen_mail,mesajlar.konu,mesajlar.tarih,mesajlar.mesaj_id,mesajlar.okundu
		FROM mesajlar
		INNER JOIN ilanlar ON mesajlar.ilan_id = ilanlar.ilan_id
		INNER JOIN emlakcilar ON ilanlar.emlakci_id = emlakcilar.emlakci_id
		WHERE emlakcilar.emlakci_id=$emlakci_id and mesajlar.silindi=0 ORDER BY mesajlar.tarih");
		$sorgu->execute();
		$gelen_mesaj_sayisi = $sorgu->rowCount();
		
		//cop kutusu sql
		$sorgu2=$veritabani->prepare("
		SELECT 
		mesajlar.gonderen_ad,ilanlar.ilan_baslik,mesajlar.gonderen_mail,mesajlar.konu,mesajlar.tarih,mesajlar.mesaj_id,mesajlar.okundu
		FROM mesajlar
		INNER JOIN ilanlar ON mesajlar.ilan_id = ilanlar.ilan_id
		INNER JOIN emlakcilar ON ilanlar.emlakci_id = emlakcilar.emlakci_id
		WHERE mesajlar.silindi=1 ORDER BY mesajlar.tarih");
		$sorgu2->execute();
		$silinen_mesaj_sayisi = $sorgu2->rowCount();
		
		//okunmamis sql
		$sorgu4=$veritabani->prepare("
		SELECT 
		mesajlar.gonderen_ad,ilanlar.ilan_baslik,mesajlar.gonderen_mail,mesajlar.konu,mesajlar.tarih,mesajlar.mesaj_id,mesajlar.okundu
		FROM mesajlar
		INNER JOIN ilanlar ON mesajlar.ilan_id = ilanlar.ilan_id
		INNER JOIN emlakcilar ON ilanlar.emlakci_id = emlakcilar.emlakci_id
		WHERE (mesajlar.okundu=0 and mesajlar.silindi=0) ORDER BY mesajlar.tarih");
		$sorgu4->execute();
		$okunmayan_mesaj_sayisi = $sorgu4->rowCount();
	}
	
	
?>
<!DOCTYPE html>

<html>
	
	<body class="hold-transition skin-blue sidebar-mini">
		<div class="wrapper">
			
			<!-- Main Header -->
			<header class="main-header">
				
				<!-- Logo -->
				<a href="index.php" class="logo">
					<!-- mini logo for sidebar mini 50x50 pixels -->
					<span class="logo-mini"><b>A</b>LT</span>
					<!-- logo for regular state and mobile devices -->
					<span class="logo-lg"><b>KUTAHYA</b>EMLAK</span>
				</a>
				
				<!-- Header Navbar -->
				<nav class="navbar navbar-static-top" role="navigation">
					
					<?php include "inc_ust.php"; ?>
					
					<div class="content-wrapper">
						<!-- Content Header (Page header) -->
						<section class="content">
							<div class="row">
								<div class="col-md-3">
									<div class="box box-solid">
										<div class="box-header with-border">
											<h3 class="box-title">Klasörler</h3>
											<div class="box-tools">
												<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
											</div>
										</div>
										<div class="box-body no-padding">
											<ul class="nav nav-pills nav-stacked">
												<li <?php if ($goster) ; else echo "class='active'"; ?>><a href="mesajlar.php"><i class="fa fa-inbox"></i> Gelen <span class="label label-primary pull-right"><?php echo $gelen_mesaj_sayisi; ?> </span></a></li>
												<li <?php if ($goster=="okunmamis") echo "class='active'"; ?>><a href="mesajlar.php?goster=okunmamis"><i class="fa fa-inbox"></i> Okunmamış <span class="label label-primary pull-right"><?php echo $okunmayan_mesaj_sayisi ; ?></span></a></li>
												<li <?php if ($goster=="copkutusu") echo "class='active'"; ?>><a  href="mesajlar.php?goster=copkutusu"><i class="fa fa-trash-o"></i> Çöp Kutusu <span class="label label-primary pull-right"><?php echo $silinen_mesaj_sayisi; ?></span></a></li>
											</ul>
										</div><!-- /.box-body -->
									</div><!-- /. box -->
									<div class="box box-solid">
										<!-- /.box-body -->
									</div><!-- /.box -->
								</div><!-- /.col -->
								<div class="col-md-9">
									<div class="box box-primary">
										<!-- /.box-header -->
										
										<?php 
											
											$mesaj_id=$_GET['mesaj_id'];
											if($mesaj_id) {
												$sorgu=$veritabani->prepare("select * from mesajlar where mesaj_id=$mesaj_id");
												$sorgu->execute();
												$sonuc=$sorgu->fetch();
												
												$sorgu2=$veritabani->prepare("update mesajlar SET okundu=1 where mesaj_id=$mesaj_id");
												$sorgu2->execute();
												
											?>
											<form action="?islem=sil&mesaj_id=<?php echo $mesaj_id; ?>" method="post">
												<div class="box-body no-padding">
													<div class="mailbox-read-info">
														<h3><?php echo $sonuc['konu'];?></h3>
														<h5>Kimden: <?php echo $sonuc['gonderen_mail'];?> <span class="mailbox-read-time pull-right"><?php echo $sonuc['tarih'];?></span></h5>
													</div><!-- /.mailbox-read-info -->
													<div class="box-footer">
														<div class="pull-right">
															
														</div>
														<button  name="silindi" class="btn btn-default"><i class="fa fa-trash-o"></i> Sil</button>
													</div><!-- /.mailbox-controls -->
													<div class="mailbox-read-message">
														<p>Gönderen Ad: <?php echo $sonuc['gonderen_ad'];?></p>
														<p>Gönderen Telefon: <?php echo $sonuc['gonderen_tel'];?></p><br>
														<p> <?php echo $sonuc['mesaj'];?></p>
														
														<br><br><p> İlgili İlana <a href="../ilan_ayrinti.php?ilan_id=<?php echo $sonuc['ilan_id'];?>"> Git </a></p>
													<?php } ?>	
												</div><!-- /.mailbox-read-message -->
											</div><!-- /.box-body -->
											
											<!-- /.box-footer -->
											<div class="box-footer">
												<div class="pull-right">
													
												</div>
												<button name="silindi" class="btn btn-default"><i class="fa fa-trash-o"></i> Sil</button>
											</div><!-- /.box-footer -->
										</form>
									</div><!-- /. box -->
								</div><!-- /.col -->
							</div><!-- /.row -->
						</section>
						
						<!-- Main content -->
						
					</div><!-- /.content-wrapper -->
					
					<!-- Main Footer -->
					<footer class="main-footer">
						<!-- To the right -->
						<div class="pull-right hidden-xs">
							
							<?php include "inc_alt.php"; ?>
							
						</footer>
						
						<!-- Control Sidebar -->      <!-- /.control-sidebar -->
						<!-- Add the sidebar's background. This div must be placed
						immediately after the control sidebar -->
						<div class="control-sidebar-bg"></div>
					</div><!-- ./wrapper -->
					
					<!-- REQUIRED JS SCRIPTS -->
					
					<!-- jQuery 2.1.4 -->
					<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
					<!-- Bootstrap 3.3.5 -->
					<script src="bootstrap/js/bootstrap.min.js"></script>
					<!-- AdminLTE App -->
					<script src="dist/js/app.min.js"></script>
					
					<!-- Optionally, you can add Slimscroll and FastClick plugins.
						Both of these plugins are recommended to enhance the
						user experience. Slimscroll is required when using the
					fixed layout. -->
				</body>
			</html>
				