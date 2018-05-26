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
					<h1> İlan Düzenle </h1>
				</section>
				
				<!-- Main content -->
				<section class="content"> <!-- Your Page Content Here -->
					<div class="row"> 
						<!-- left column --> 
						<!--/.col (left) --> 
						<!-- right column -->
						<div class="col-md-6"> 
							<!-- Horizontal Form --> 
							<!-- /.box --> 
							<!-- general form elements disabled -->
							<div class="box box-warning"> <!-- /.box-header -->
								<div class="box-body">
									
									
									
									<?php 													
										$ilan_id=$_GET['ilan_id'];
										$ilan_sorgu=$veritabani->prepare("select * from ilanlar where ilan_id=$ilan_id");
										$ilan_sorgu->execute();
										while($sonuc=$ilan_sorgu->fetch()){
											$secili_ilce_id=$sonuc['ilce_id'];
											$secili_mahalle_id=$sonuc['mahalle_id'];
											$secili_esyali=$sonuc['esyali'];
											$secili_kiralik_satilik=$sonuc['kiralik_satilik'];
											$secili_aktif=$sonuc['aktif'];
											$secili_ilan_baslik=$sonuc['ilan_baslik'];
											$secili_ilan_aciklama=$sonuc['ilan_aciklama'];
											$secili_fiyat=$sonuc['fiyat'];
											$secili_metre_kare=$sonuc['metre_kare'];
											$secili_oda_tip_id=$sonuc['oda_tip_id'];
											$secili_bina_yas=$sonuc['bina_yas'];
											$secili_bulundugu_kat=$sonuc['bulundugu_kat'];
											$secili_kat_sayisi=$sonuc['kat_sayisi'];
											$secili_isitma_tip_id=$sonuc['isitma_tip_id'];
										}																										
									?>
									
									
									
									<form action="ilan_islem.php?islem=duzenle&ilan_id=<?php echo $ilan_id; ?>" enctype="multipart/form-data" method="post">
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
														if($secili_ilce_id==$ilce_id) echo "<option value='$ilce_id' selected='selected'>$ilce_ad </option>"; 
														else echo "<option value='$ilce_id'>$ilce_ad </option>";
													} ?>
													
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
														if($secili_emlak_tip_id==$emlak_tip_id) echo "<option value='$emlak_tip_id' selected='selected'>$emlak_tip_ad </option>"; 
														else echo "<option value='$emlak_tip_id'>$emlak_tip_ad </option>";
													} ?>
													
													
											</select>
										</div>
										
										
										<div class="form-group">
											<div class="radio">
												<label>
													<input type="radio" name="esyali" id="optionsRadios1" value="1" <?php if($secili_esyali==1) echo "checked"; ?>>
													Eşyalı
												</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="esyali" id="optionsRadios2" value="0" <?php if($secili_esyali==0) echo "checked"; ?>>
												Eşyasız                        </label>
											</div>
										</div>
										<hr>
										
										<div class="form-group">
											<div class="radio">
												<label>
													<input type="radio" name="kiralik_satilik" id="optionsRadios3" value="0" <?php if($secili_kiralik_satilik==0) echo "checked"; ?>>
													kiralik
												</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="kiralik_satilik" id="optionsRadios4" value="1" <?php if($secili_kiralik_satilik==1) echo "checked"; ?>>
													satilik
												</label>
											</div>
										</div>
										
										<hr>
										
										<div class="form-group">
											<div class="radio">
												<label>
													<input type="radio" name="aktif" id="optionsRadios5" value="1" <?php if($secili_aktif==1) echo "checked"; ?>>
													Yayında
												</label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="aktif" id="optionsRadios6" value="0" <?php if($secili_aktif==0) echo "checked"; ?>>
												Yayında Değil                        </label>
											</div>
										</div>
										
										
										
										<div class="form-group">
											<label>İlan Başlığı</label>
											<input type="text" class="form-control" name="ilan_baslik" placeholder="İlan Başlığı Giriniz ..." value="<?php echo $secili_ilan_baslik; ?>" required>
										</div>
										
										<!-- textarea -->
										<div class="form-group">
											<label>İlan Açıklama</label>
											<textarea class="form-control" rows="5" name="ilan_aciklama" placeholder="Açıklama ..." required><?php echo $secili_ilan_aciklama; ?></textarea>
										</div>
										
										<div class="form-group">
											<label>Fiyat</label>
											<input type="number" class="form-control" name="fiyat" placeholder="Fiyat Giriniz ..." value="<?php echo $secili_fiyat; ?>" required>
										</div>
										
										<div class="form-group">
											<label>m²</label>
											<input type="number" class="form-control" name="metre_kare" placeholder="Metre Kare Giriniz ..." value="<?php echo $secili_metre_kare; ?>" required>
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
														if($secili_oda_tip_id==$oda_tip_id) echo "<option value='$oda_tip_id' selected='selected'>$oda_ad </option>"; 
														else echo "<option value='$oda_tip_id'>$oda_ad </option>";
													} ?>
													
											</select>
										</div>
										
										
										
										
										
										
										
										<div class="form-group">
											<label>Bina Yaşı</label>
											<input type="number" name="bina_yas" class="form-control" placeholder="Bina Yaşı ..." value="<?php echo $secili_bina_yas; ?>" required>
										</div>
										
										<div class="form-group">
											<label>Bulunduğu Kat</label>
											<input type="number" name="bulundugu_kat" class="form-control" placeholder="Kaçıncı katta ..." value="<?php echo $secili_bulundugu_kat; ?>" required>
										</div>
										
										<div class="form-group">
											<label>Kat Sayısı</label>
											<input type="number" name="kat_sayisi" class="form-control" placeholder="bina kaç katlı ..." value="<?php echo $secili_kat_sayisi; ?>" required>
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
														if($secili_isitma_tip_id==$isitma_id) echo "<option value='$isitma_id' selected='selected'>$isitma_ad </option>"; 
														else echo "<option value='$isitma_id'>$isitma_ad </option>";
													} ?>
													
											</select>
										</div>
										
										
										
										
										
										<div class="box-footer">
											<button type="submit" class="btn btn-info pull-right">Düzenle</button>
										</div>
										
									</form>
								</div>
								<!-- /.box-body --> 
							</div>
							<!-- /.box --> 
						</div>
						<!--/.col (right) --> 
						
						
						
						<div class="col-md-6"> <!-- /sag panel-->
							<!-- Horizontal Form  galery -->
							<div class="box box-info">
								<div class="box-header with-border">
									<h3 class="box-title">İlan Resimleri</h3>
								</div><!-- /.box-header -->
								<!-- form start -->
								
									<div class="box-body">
										
										<style type="text/css">
											ana {
											margin: 0;
											padding: 0;
											background: #EEE;
											font: 10px/13px 'Lucida Sans',sans-serif;
											}
											.wrap {
											overflow: hidden;
											margin: 10px;
											}
											.kutu {
											float: left;
											position: relative;
											width: 20%;
											padding-bottom: 20%;
											}
											.kutuInner {
											position: absolute;
											left: 10px;
											right: 10px;
											top: 10px;
											bottom: 10px;
											overflow: hidden;
											}
											.kutuInner img {
											width: 100%;
											}
											.kutuInner .titleKutu {
											position: absolute;
											bottom: 0;
											left: 0;
											right: 0;
											margin-bottom: -50px;
											background: #000;
											background: rgba(0, 0, 0, 0.5);
											color: #FFF;
											padding: 10px;
											text-align: center;
											-webkit-transition: all 0.3s ease-out;
											-moz-transition: all 0.3s ease-out;
											-o-transition: all 0.3s ease-out;
											transition: all 0.3s ease-out;
											}
											body.no-touch .kutuInner:hover .titleKutu, body.touch .kutuInner.touchFocus .titleKutu {
											margin-bottom: 0;
											}
											@media only screen and (max-width : 480px) {
											/* Smartphone view: 1 tile */
											.kutu {
											width: 100%;
											padding-bottom: 100%;
											}
											}
											@media only screen and (max-width : 650px) and (min-width : 481px) {
											/* Tablet view: 2 tiles */
											.kutu {
											width: 50%;
											padding-bottom: 50%;
											}
											}
											@media only screen and (max-width : 1050px) and (min-width : 651px) {
											/* Small desktop / ipad view: 3 tiles */
											.kutu {
											width: 33.3%;
											padding-bottom: 33.3%;
											}
											}
											@media only screen and (max-width : 1290px) and (min-width : 1051px) {
											/* Medium desktop: 4 tiles */
											.kutu {
											width: 25%;
											padding-bottom: 25%;
											}
											}
										</style>
										<!-- Enable media queries for old IE -->
										<!--[if lt IE 9]>
											<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
										<![endif]-->
										
										
										<div class="wrap">
											<!-- Define all of the tiles: -->
											
											<?php 
												$sorgu=$veritabani->prepare("select * from ilan_resim where ilan_id=$ilan_id order by resim_id");
												$sorgu->execute();
												while($sonuc=$sorgu->fetch()){
													$resim_id=$sonuc['resim_id'];
												?>
												<div class="kutu">
													<div class="kutuInner">
														<img src="<?php echo "../".$sonuc['resim_url']; ?>" /><br>
													<center><a href="ilan_islem.php?islem=resimsil&resim_id=<?php echo $sonuc['resim_id'];?>&ilan_id=<?php echo $ilan_id; ?>"> <span class="glyphicon glyphicon-remove"></span></a></center>
												</div>
											</div>
										<?php } ?>
										
										
									</div>
									<!-- /#wrap -->
									<!-- Add some JavaScript to enable toggling the descriptions when an image is tapped on a touchscreen device -->
									<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.js"></script>
									<script type="text/javascript">
										$(function(){
											// See if this is a touch device
											if ('ontouchstart' in window)
											{
												// Set the correct body class
												$('body').removeClass('no-touch').addClass('touch');
												
												// Add the touch toggle to show text
												$('div.kutuInner img').click(function(){
													$(this).closest('.kutuInner').toggleClass('touchFocus');
												});
											}
										});
									</script>
									
									
									
									<form class="form-horizontal" action="ilan_islem.php?islem=resimekle&ilan_id=<?php echo $ilan_id; ?>" enctype="multipart/form-data" method="post">

									<div class="box-footer">
											<label>İlan Resim<u>lerini</u> Seçiniz </label>
										
										<input multiple="multiple" type="file" name="image[]" required />
										</div>
									
									
								</div><!-- /.box-body -->
								<div class="box-footer">
									<button type="submit" class="btn btn-info pull-right">Ekle</button>
								</div><!-- /.box-footer -->
							</form>
						</div><!-- /.box -->
					</div> <!-- /.sag panel -->			
					
					
					
					
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
