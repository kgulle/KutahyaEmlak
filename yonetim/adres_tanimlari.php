<?php 
	include"session.php";
	include"baglanti.php"; 
?>
<!DOCTYPE html>

<html>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			mahalleleri_al(); //defaulta gelsin diye
			//selectbox değişince çalıştır
			$("#ilce").change(function(){
				mahalleleri_al();
			});
		});
		
		function mahalleleri_al(){
			//markanın alinmasi
			ilce=$("#ilce").val();
			//seçilem markanin gondermesi
			$.ajax({
				type:'POST',
				url:'mahalle_yukle.php',
				data:'ilce='+ilce,
				success: function(msg){
					//dönen modelleri gösterme
					$('#mahalle').html(msg);
				}
			});
		}
	</script>
	
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
							<div class="row"> 
								
								<div class="col-md-4"> 
									<div class="box box-warning"> <!-- /.box-header -->
										<section class="content-header">
											<h1> Mahalle Ekle </h1>
										</section>
										<div class="box-body">
											<form action="adres_islem.php?islem=mahalleekle" method="post">
												<!-- text input -->
												
												<div class="form-group">
													<label>İlçe: </label>
													<select id="ilcee" class="form-control" name="ilce_id" required>
														
														<?php 
															$sorgu=$veritabani->prepare("select * from ilceler order by ilce_ad");
															$sorgu->execute();
															while($sonuc=$sorgu->fetch()){
																$ilce_id=$sonuc['ilce_id'];
																$ilce_ad=$sonuc['ilce_ad'];
															?>
															<option value="<?php echo $ilce_id;  ?>"> <?php echo $ilce_ad; ?></option>
														<?php } ?>
														
													</select>
												</div>
												
												<div class="form-group">
													<label>Mahalle Adı:</label>
													<input type="text" class="form-control" name="mahalle_ad" placeholder="Mahalle adı Giriniz ..." required>
												</div>
												<div class="box-footer">
													<button type="submit" class="btn btn-primary">Mahalle Ekle</button>
												</div>
												
											</form>
										</div>
										<!-- /.box-body --> 
									</div>
									<!-- /.box --> 
								</div>
								
								<div class="col-md-4"> 
									<div class="box box-warning"> <!-- /.box-header -->
										<section class="content-header">
											<h1> Mahalle Sil </h1>
										</section>
										<div class="box-body">
											<form action="adres_islem.php?islem=mahallesil" method="post">
												<div class="form-group">
													<label>İlçe:  </label>
													<select id="ilce" class="form-control" name="ilce_id" required>
														
														<?php 
															$sorgu=$veritabani->prepare("select * from ilceler order by ilce_ad");
															$sorgu->execute();
															while($sonuc=$sorgu->fetch()){
																$ilce_id=$sonuc['ilce_id'];
																$ilce_ad=$sonuc['ilce_ad'];
															?>
															<option value="<?php echo $ilce_id;  ?>"> <?php echo $ilce_ad; ?></option>
														<?php } ?>
														
													</select>
												</div>
												<div id="mahalle" class="form-group"></div>
												
												
												<div class="box-footer">
													<button type="submit" class="btn btn-primary">Mahalle Sil</button>
												</div>									
											</form>
										</div>
										<!-- /.box-body --> 
									</div>
									<!-- /.box --> 
								</div>
								
							</div>
							<div class="row">
								<div class="col-md-4"> 
									<div class="box box-warning"> <!-- /.box-header -->
										<section class="content-header">
											<h1> İlçe Ekle </h1>
										</section>
										<div class="box-body">
											<form action="adres_islem.php?islem=ilceekle" method="post">
												<div class="form-group">
													<label>İlçe Adı:</label>
													<input type="text" class="form-control" name="ilce_ad" placeholder="İlçe adı Giriniz ..." required>
												</div>
												<div class="box-footer">
													<button type="submit" class="btn btn-primary">İlçe Ekle</button>
												</div>									
											</form>
										</div>
										<!-- /.box-body --> 
									</div>
									<!-- /.box --> 
								</div>
								
								<div class="col-md-4"> 
									<div class="box box-warning"> <!-- /.box-header -->
										<section class="content-header">
											<h1> İlçe Sil </h1>
										</section>
										<div class="box-body">
											<form action="adres_islem.php?islem=ilcesil" method="post">
												<div class="form-group">
													<label>İlçe: </label>
													<select id="ilce" class="form-control" name="ilce_id" required>
														
														<?php 
															$sorgu=$veritabani->prepare("select * from ilceler order by ilce_ad");
															$sorgu->execute();
															while($sonuc=$sorgu->fetch()){
																$ilce_id=$sonuc['ilce_id'];
																$ilce_ad=$sonuc['ilce_ad'];
															?>
															<option value="<?php echo $ilce_id;  ?>"> <?php echo $ilce_ad; ?></option>
														<?php } ?>
														
													</select>
												</div>
												
												
												<div class="box-footer">
													<button type="submit" class="btn btn-primary">İlçe Sil</button>
												</div>									
											</form>
										</div>
										<!-- /.box-body --> 
									</div>
									<!-- /.box --> 
								</div>	
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
				