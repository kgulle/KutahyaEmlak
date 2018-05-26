<?php include"session.php";
include"baglanti.php"; ?>
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
				<span class="logo-lg"><b>KUTAHYA</b>EMLAK</span> </a> 
				
				<!-- Header Navbar -->
				<nav class="navbar navbar-static-top" role="navigation"> 
				
				
				<?php include "inc_ust.php"; ?>
				
				
			<div class="content-wrapper"> 
				<!-- Content Header (Page header) -->
				<section class="content-header">
					<h1> İlan Ekle </h1>
				</section>
				
				<!-- Main content -->
				<section class="content"> <!-- Your Page Content Here -->
					<div class="row"> 
						<!-- left column --> 
						<!--/.col (left) --> 
						<!-- right column -->
						<div class="col-md-7"> 
							<!-- Horizontal Form --> 
							<!-- /.box --> 
							<!-- general form elements disabled -->
							<div class="box box-warning"> <!-- /.box-header -->
								<div class="box-body">
									<form action="ilan_islem.php?islem=ekle" enctype="multipart/form-data" method="post">
										<!-- text input -->
										
										
										
										<div class="form-group">
											<label>İlçe </label>
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
										
										<div class="form-group">
											<label>Emlak Tip</label>
											<select class="form-control" name="emlak_tip_id" required>
												
												<?php 
													$sorgu=$veritabani->prepare("select * from emlak_tip order by emlak_tip_ad");
													$sorgu->execute();
													while($sonuc=$sorgu->fetch()){
														$emlak_tip_id=$sonuc['emlak_tip_id'];
														$emlak_tip_ad=$sonuc['emlak_tip_ad'];
													?>
													<option value="<?php echo $emlak_tip_id;  ?>"> <?php echo $emlak_tip_ad; ?></option>
												<?php } ?>
												
												
											</select>
										</div>
										
										
										<div class="form-group">
											<div class="radio">
												<label>
													<input type="radio" name="esyali" id="optionsRadios1" value="1" checked>
													Eşyalı
												</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="esyali" id="optionsRadios2" value="0">
												Eşyasız                        </label>
											</div>
										</div>
										<hr>
										
										<div class="form-group">
											<div class="radio">
												<label>
													<input type="radio" name="kiralik_satilik" id="optionsRadios3" value="0" checked>
													kiralik
												</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="kiralik_satilik" id="optionsRadios4" value="1">
													satilik
												</label>
											</div>
										</div>
										
										<hr>
										
										<div class="form-group">
											<div class="radio">
												<label>
													<input type="radio" name="aktif" id="optionsRadios5" value="1" checked>
													Yayında
												</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="aktif" id="optionsRadios6" value="0">
												Yayında Değil                        </label>
											</div>
										</div>
										
										
										
										<div class="form-group">
											<label>İlan Başlığı</label>
											<input type="text" class="form-control" name="ilan_baslik" placeholder="İlan Başlığı Giriniz ..." required>
										</div>
										
										<!-- textarea -->
										<div class="form-group">
											<label>İlan Açıklama</label>
											<textarea class="form-control" rows="5" name="ilan_aciklama" placeholder="Açıklama ..." required></textarea>
										</div>
										
										<div class="form-group">
											<label>Fiyat</label>
											<input type="number" class="form-control" name="fiyat" placeholder="Fiyat Giriniz ..." required>
										</div>
										
										<div class="form-group">
											<label>m²</label>
											<input type="number" class="form-control" name="metre_kare" placeholder="Metre Kare Giriniz ..." required>
										</div>
										
										
										
										
										
											<div class="form-group">
											<label>Oda Sayısı</label>
											<select class="form-control" name="oda_tip_id">
												
												<?php 
													$sorgu=$veritabani->prepare("select * from oda_sayisi_tip order by oda_ad");
													$sorgu->execute();
													while($sonuc=$sorgu->fetch()){
														$oda_tip_id=$sonuc['oda_tip_id'];
														$oda_ad=$sonuc['oda_ad'];
													?>
													<option value="<?php echo $oda_tip_id;  ?>"> <?php echo $oda_ad; ?></option>
												<?php } ?>
												
												
											</select>
										</div>
										
										
										
										
										
										
										
										<div class="form-group">
											<label>Bina Yaşı</label>
											<input type="number" name="bina_yas" class="form-control" placeholder="Bina Yaşı ..." required>
										</div>
										
										<div class="form-group">
											<label>Bulunduğu Kat</label>
											<input type="number" name="bulundugu_kat" class="form-control" placeholder="Kaçıncı katta ..." required>
										</div>
										
										<div class="form-group">
											<label>Kat Sayısı</label>
											<input type="number" name="kat_sayisi" class="form-control" placeholder="bina kaç katlı ..." required>
										</div>
										
										
										
										<div class="form-group">
											<label>Isıtma</label>
											<select class="form-control" name="isitma_tip_id">
												
												<?php 
													$sorgu=$veritabani->prepare("select * from isitma_tip order by isitma_ad");
													$sorgu->execute();
													while($sonuc=$sorgu->fetch()){
														$isitma_id=$sonuc['isitma_id'];
														$isitma_ad=$sonuc['isitma_ad'];
													?>
													<option value="<?php echo $isitma_id;  ?>"> <?php echo $isitma_ad; ?></option>
												<?php } ?>
												
												
											</select>
										</div>
										
										
										<div class="form-group">
											<label>İlan Resim<u>lerini</u> Seçiniz </label>
											
											<input multiple="multiple" type="file" name="image[]" required />
										</div>
										
										
										
										
										<div class="box-footer">
											<button type="submit" class="btn btn-primary">Kaydet</button>
										</div>
									</form>
								</div>
								<!-- /.box-body --> 
							</div>
							<!-- /.box --> 
						</div>
						<!--/.col (right) --> 
					</div>
					<div class="box-body">  </div>
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
			
			<!-- Control Sidebar --> <!-- /.control-sidebar --> 
			<!-- Add the sidebar's background. This div must be placed
			immediately after the control sidebar -->
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
		
		<!-- Optionally, you can add Slimscroll and FastClick plugins.
			Both of these plugins are recommended to enhance the
			user experience. Slimscroll is required when using the
		fixed layout. -->
	</body>
</html>
