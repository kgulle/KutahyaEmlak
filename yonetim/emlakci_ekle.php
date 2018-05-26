<?php include"session.php";?>
<!DOCTYPE html>
<!--
	This is a starter template page. Use this page to start your new project from
	scratch. This page gets rid of all links and provides the needed markup only.
-->
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
						<section class="content-header">
							<h1> Emlakçı Ekle
							</h1>
						</section>
						<!-- Main content -->
						<section class="content"> <!-- Your Page Content Here -->
							<div class="row"> 
								<div class="col-md-6">
									<!-- general form elements -->
									<div class="box box-primary">
										<!-- form start -->
										<form action="emlakci_islem.php?islem=ekle" method="post" enctype="multipart/form-data">
											<div class="box-body">
												
												<div class="form-group">
													<label>Emlakçı adı:</label>
													<input type="text"  name="ad" class="form-control" placeholder="Enter ..." required>
												</div>
												<div class="form-group">
													<label for="exampleInputEmail1">E-Posta Adresi</label>
													<input type="email" name="eposta" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required>
												</div>
												<div class="form-group">
													<label for="exampleInputPassword1">Şifre</label>
													<input type="password" name="sifre" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
												</div>
												
												<div class="form-group">
													<label>Yetki </label>
													<select required class="form-control" name="seviye" required>
														<option value="">Seçim Yapınız</option>
														<option value="1">Yönetici</option>
														<option value="0">Emlakcı</option>
													</select>
												</div>
												
												
												<div class="form-group">
													<label>Adres:</label>
													<textarea class="form-control" name="adres" rows="3" placeholder="Adres ..." required></textarea>
												</div>
												
												<div class="form-group">
													<label>Telefon:</label>
											<input type="number" class="form-control" name="telefon" placeholder="Telefon Giriniz ..." required>
												</div>
												
												<div class="form-group">
													<label>Hakkında:</label>
													<textarea class="form-control" name="hakkinda" rows="3" placeholder="Hakkında ..." required></textarea>
												</div>
												<div class="form-group">
													<label for="exampleInputFile">Logo Seç</label>
													<input type="file" name="logo_url" id="exampleInputFile" required>
													<p class="help-block">Logonun kare olması daha iyi sonuç verir..</p>
												</div>
											</div><!-- /.box-body -->
											<div class="box-footer">
												<button type="submit" class="btn btn-primary">Kaydet</button>
											</div>
										</form>
									</div><!-- /.box -->
									<!-- Form Element sizes -->
									<div class="box box-success">
										<!-- /.box-body -->
									</div><!-- /.box -->
									<!-- /.box -->
									<!-- Input addon -->
									<!-- /.box -->
								</div>
							</div>
						</section><!-- /.content -->
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
				