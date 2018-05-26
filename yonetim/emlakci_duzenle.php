<?php include"session.php";
	include"baglanti.php"; ?>
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
				<section class="content-header">
					<h1> Emlakçı Düzenle
					</h1>
				</section>
				<!-- Main content -->
				
				
				<?php 
				
				$emlakci_id=$_GET['emlakci_id'];
				$sorgu=$veritabani->prepare("select * from emlakcilar where emlakci_id=$emlakci_id");
				$sorgu->execute();
				$sonuc=$sorgu->fetch();
			?>
				
				<section class="content"> <!-- Your Page Content Here -->
					<div class="row"> 
						<div class="col-md-6">
							<!-- general form elements -->
							<div class="box box-primary">
								<!-- form start -->
								<form action="emlakci_islem.php?islem=duzenle&emlakci_id=<?php echo $emlakci_id;?>" method="post" enctype="multipart/form-data">
									<div class="box-body">
										
										<div class="form-group">
											<label>Emlakci adı:</label>
											<input type="text"  name="ad" value="<?php echo $sonuc['ad'];?>" class="form-control" placeholder="Enter ...">
										</div>
										<div class="form-group">
											<label for="exampleInputEmail1">E-Posta Adresi</label>
											<input type="email" name="eposta" value="<?php echo $sonuc['eposta'];?>"  class="form-control" id="exampleInputEmail1" placeholder="Enter email">
										</div>
										
										<div class="form-group">
											<label>Yetki</label>
											<select required class="form-control" name="seviye">
											<?php if($sonuc['seviye']==1) echo "<option value='1'>Yönetici</option>"; elseif($sonuc['seviye']==0) echo "<option value='0'>Emlakcı</option>"; else echo "<option value=''>Seçim Yapınız</option>"; ?>
												<option value="1">Yönetici</option>
												<option value="0">Emlakcı</option>
											</select>
										</div>

										<div class="form-group">
											<label>Adres:</label>
											<textarea class="form-control" name="adres" rows="3" placeholder="Enter ..."><?php echo $sonuc['adres'];?> </textarea>
										</div>
										
											<div class="form-group">
													<label>Telefon:</label>
											<input type="number" class="form-control" name="telefon" value="<?php echo $sonuc['telefon'];?>" placeholder="telefon Giriniz ..." required>
												</div>
										
										<div class="form-group">
											<label>Hakkında:</label>
											<textarea class="form-control" name="hakkinda" value="<?php echo $sonuc['hakkinda'];?>" rows="3" placeholder="Enter ..."><?php echo $sonuc['hakkinda'];?></textarea>
										</div>
										<div class="form-group">
											<label for="exampleInputFile">Logo Seç</label>
											<input type="file" name="logo_url" id="exampleInputFile">
											<p class="help-block">Logonun kare olması daha iyi sonuç verir..</p>
										</div>
									</div><!-- /.box-body -->
									<div class="box-footer">
										<button type="submit" class="btn btn-primary">Düzenle</button>
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
						
						
						
						
						
	<script type="text/javascript">
    function sifrelerEsitmi() {
        var sifre = document.getElementById("sifre").value;
        var sifre2 = document.getElementById("sifre2").value;
        if (sifre != sifre2) {
            alert("Şifreler Aynı olmalı!!!");
            return false;
        }
        return true;
    }
</script>
						
						
						<div class="col-md-3">
							<!-- general form elements -->
							<div class="box box-info">
								<!-- form start -->
								<form action="emlakci_islem.php?islem=sifreduzenle&emlakci_id=<?php echo $emlakci_id;?>" method="post">
									<div class="box-body">
										
										<div class="form-group">
											<label for="exampleInputPassword1">Eski Şifre</label>
											<input type="password" value="" name="esifre" class="form-control" id="exampleInputPassword1" placeholder="Eski Şifre..." required>
										</div>
										
										<div class="form-group">
											<label for="exampleInputPassword1">Yeni Şifre</label>
											<input id="sifre" type="password" value="" name="sifre" class="form-control" id="exampleInputPassword1" placeholder="Yeni Şifre..." required>
										</div>
										
										<div class="form-group">
											<label for="exampleInputPassword1">Yeni Şifre </label>
											<input id="sifre2" type="password" value="" name="sifre2" class="form-control" id="exampleInputPassword1" placeholder="Yeni Şifre..." required>
										</div>
										
										
									</div><!-- /.box-body -->
									<div class="box-footer">
										<button onclick="return sifrelerEsitmi()" type="submit" class="btn btn-primary">Değiştir</button>
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
