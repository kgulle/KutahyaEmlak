<?php
	include"baglanti.php";
	include"session.php";
	$emlakci_id=$_SESSION['emlakci_id'];
	$goster=$_GET['goster'];
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
	WHERE emlakcilar.emlakci_id=$emlakci_id and mesajlar.silindi=0 and emlakcilar.emlakci_id=$emlakci_id ORDER BY mesajlar.tarih");
	$sorgu->execute();
	$gelen_mesaj_sayisi = $sorgu->rowCount();
	
	//cop kutusu sql
	$sorgu2=$veritabani->prepare("
	SELECT 
	mesajlar.gonderen_ad,ilanlar.ilan_baslik,mesajlar.gonderen_mail,mesajlar.konu,mesajlar.tarih,mesajlar.mesaj_id,mesajlar.okundu
	FROM mesajlar
	INNER JOIN ilanlar ON mesajlar.ilan_id = ilanlar.ilan_id
	INNER JOIN emlakcilar ON ilanlar.emlakci_id = emlakcilar.emlakci_id
	WHERE mesajlar.silindi=1 and emlakcilar.emlakci_id=$emlakci_id ORDER BY mesajlar.tarih");
	$sorgu2->execute();
	$silinen_mesaj_sayisi = $sorgu2->rowCount();
	
	//okunmamis sql
	$sorgu4=$veritabani->prepare("
	SELECT 
	mesajlar.gonderen_ad,ilanlar.ilan_baslik,mesajlar.gonderen_mail,mesajlar.konu,mesajlar.tarih,mesajlar.mesaj_id,mesajlar.okundu
	FROM mesajlar
	INNER JOIN ilanlar ON mesajlar.ilan_id = ilanlar.ilan_id
	INNER JOIN emlakcilar ON ilanlar.emlakci_id = emlakcilar.emlakci_id
	WHERE (mesajlar.okundu=0 and mesajlar.silindi=0 and emlakcilar.emlakci_id=$emlakci_id) ORDER BY mesajlar.tarih");
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
										<div class="box-header with-border">
											<h3 class="box-title"> <?php if ($goster=="copkutusu") echo " Çöp Kutusu"; elseif($goster=="okunmamis") echo "Okunmamiş Mesajlar"; else echo "Gelen Kutusu"; ?></h3>
											<div class="box-tools pull-right">
												<div class="has-feedback">
												</div>
											</div><!-- /.box-tools -->
										</div><!-- /.box-header -->
										<div class="box-body no-padding">
											<div class="table-responsive mailbox-messages">
												<table class="table table-hover table-striped">
													<tbody>
														
														<?php 
															if ($goster=="copkutusu") {
																while($sonuc=$sorgu2->fetch()){
																	$gonderen_ad=$sonuc['gonderen_ad'];
																	$ilan_baslik=$sonuc['ilan_baslik'];
																	$gonderen_mail=$sonuc['gonderen_mail'];
																	$konu=$sonuc['konu'];
																	$tarih=$sonuc['tarih'];
																	$mesaj=$sonuc['mesaj'];
																	$mesaj_id=$sonuc['mesaj_id'];
																	$okundu=$sonuc['okundu'];
																	echo "<tr>
																	<td class='mailbox-star'><a href='mesaj_oku.php?islem=kalicisil&mesaj_id=$mesaj_id'><i class='fa fa-trash-o'></i></a></td>
																	<td class='mailbox-name'><a href='mesaj_oku.php?mesaj_id=$mesaj_id'>"; 
																	if($okundu==0) echo "<b> $gonderen_ad </b>"; else echo "$gonderen_ad";
																	echo "</a></td>
																	<td class='mailbox-subject'>"; 
																	if($okundu==0) echo "<b> $ilan_baslik </b>"; else echo "$ilan_baslik";
																	echo"</td>
																	<td class='mailbox-attachment'>"; 
																	if($okundu==0) echo "<b> $gonderen_mail - $konu </b>"; else echo "$gonderen_mail - $konu"; 
																	echo"</td> 
																	<td class='mailbox-date'>";
																	if($okundu==0) echo "<b> $tarih </b>"; else echo "$tarih";
																	echo"</td></tr>";														
																}
															}
															
															elseif($goster=="okunmamis") {
																while($sonuc=$sorgu4->fetch()){
																	$gonderen_ad=$sonuc['gonderen_ad'];
																	$ilan_baslik=$sonuc['ilan_baslik'];
																	$gonderen_mail=$sonuc['gonderen_mail'];
																	$konu=$sonuc['konu'];
																	$tarih=$sonuc['tarih'];
																	$mesaj=$sonuc['mesaj'];
																	$mesaj_id=$sonuc['mesaj_id'];
																	$okundu=$sonuc['okundu'];
																	echo "<tr>
																	<td class='mailbox-star'><a href='mesaj_oku.php?islem=sil&mesaj_id=$mesaj_id'><i class='fa fa-trash-o'></i></a></td>
																	<td class='mailbox-name'><a href='mesaj_oku.php?mesaj_id=$mesaj_id'>"; 
																	if($okundu==0) echo "<b> $gonderen_ad </b>"; else echo "$gonderen_ad";
																	echo "</a></td>
																	<td class='mailbox-subject'>"; 
																	if($okundu==0) echo "<b> $ilan_baslik </b>"; else echo "$ilan_baslik";
																	echo"</td>
																	<td class='mailbox-attachment'>"; 
																	if($okundu==0) echo "<b> $gonderen_mail - $konu </b>"; else echo "$gonderen_mail - $konu"; 
																	echo"</td> 
																	<td class='mailbox-date'>";
																	if($okundu==0) echo "<b> $tarih </b>"; else echo "$tarih";
																	echo"</td></tr>";														
																}
																
																} else {
																while($sonuc=$sorgu->fetch()){
																	$gonderen_ad=$sonuc['gonderen_ad'];
																	$ilan_baslik=$sonuc['ilan_baslik'];
																	$gonderen_mail=$sonuc['gonderen_mail'];
																	$konu=$sonuc['konu'];
																	$tarih=$sonuc['tarih'];
																	$mesaj=$sonuc['mesaj'];
																	$mesaj_id=$sonuc['mesaj_id'];
																	$okundu=$sonuc['okundu'];
																	echo "<tr>
																	<td class='mailbox-star'><a href='mesaj_oku.php?islem=sil&mesaj_id=$mesaj_id'><i class='fa fa-trash-o'></i></a></td>
																	<td class='mailbox-name'><a href='mesaj_oku.php?mesaj_id=$mesaj_id'>"; 
																	if($okundu==0) echo "<b> $gonderen_ad </b>"; else echo "$gonderen_ad";
																	echo "</a></td>
																	<td class='mailbox-subject'>"; 
																	if($okundu==0) echo "<b> $ilan_baslik </b>"; else echo "$ilan_baslik";
																	echo"</td>
																	<td class='mailbox-attachment'>"; 
																	if($okundu==0) echo "<b> $gonderen_mail - $konu </b>"; else echo "$gonderen_mail - $konu"; 
																	echo"</td> 
																	<td class='mailbox-date'>";
																	if($okundu==0) echo "<b> $tarih </b>"; else echo "$tarih";
																	echo"</td></tr>";														
																}
																
															}
															
														?>
														
														
														
													</tr>
												</tbody>
											</table><!-- /.table -->
										</div><!-- /.mail-box-messages -->
									</div><!-- /.box-body -->
									<div class="box-footer no-padding"></div>
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
		