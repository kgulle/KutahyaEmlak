<?php 
	include"session.php";
	include"baglanti.php"; 
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
					<span class="logo-lg"><b>KUTAHYA</b>EMLAK REHBERİ</span>
				</a>
				<!-- Header Navbar -->
				<nav class="navbar navbar-static-top" role="navigation">
					
					<?php include "inc_ust.php"; ?>
					
					<div class="content-wrapper"> 
						
						<section class="content"> <!-- Your Page Content Here -->
							
							<?php 
								$sorgu5=$veritabani->prepare("select*from emlakcilar order by ad");
								$sorgu5->execute();
								//emlakci sayisi buluyoruz
								$emlakci_sayisi = $sorgu5->rowCount();
								
							?>
							
							<div class="col-md-6">
								<div class="box box-danger">
									<div class="box-header with-border">
										<h3 class="box-title">Emlakcılar</h3>
										<div class="box-tools pull-right">
											<span class="label label-success"> Emlakcı: <?php echo $emlakci_sayisi; ?> </span>
											<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
											<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
										</div>
									</div><!-- /.box-header -->
									<div class="box-body no-padding">
										<ul class="users-list clearfix">
											<?php
												while($sonuc=$sorgu5->fetch()){
													$emlakci_id=$sonuc['emlakci_id'];
													$ad=$sonuc['ad'];
													$logo_url=$sonuc['logo_url'];
													$kayit_tarihi=$sonuc['kayit_tarihi'];
													
													$sorgu6=$veritabani->prepare("select * from ilanlar where emlakci_id=$emlakci_id ");
													$sorgu6->execute();
													//ilan sayisini buluyoruz
													$ilan_sayisi = $sorgu6->rowCount();
													
													echo "<li>
													<img src='$logo_url' alt='$ad'>
													<a class='label label-info' href=''>$ad</a>
													<span class='label label-warning'>İlan: $ilan_sayisi </span>
													</li>";
												} ?>
												
										</ul><!-- /.users-list -->
									</div><!-- /.box-body -->
									<div class="box-footer text-center">
									</div><!-- /.box-footer -->
								</div><!--/.box -->
							</div>		
							
							
							
						</section>
						<!-- /.content --> 
					</div>
					<!-- /.content-wrapper --> 
					
					<!-- Main Footer -->
					<footer class="main-footer"> 
						<!-- To the right -->
						<div class="pull-right hidden-xs">
							<?php include "inc_alt.php"; ?>
						</footer>
						<div class="control-sidebar-bg"></div>
					</div>
					<!-- ./wrapper --> 
					
					<!-- REQUIRED JS SCRIPTS --> 
					
					<!-- jQuery 2.1.4 -->
					<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
					<!-- Bootstrap 3.3.5 -->
					<script src="bootstrap/js/bootstrap.min.js"></script>
					<!-- AdminLTE App -->
					<script src="dist/js/app.min.js"></script>
				</body>
			</html>
				