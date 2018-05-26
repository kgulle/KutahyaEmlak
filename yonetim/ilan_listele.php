<?php
	include"baglanti.php";
include"session.php";?>

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
					<h1>
						İlanlarım
					</h1>
					
				</section>
				
				<!-- Main content -->
				<section class="content">
					<div class="row">
						<div class="col-xs-12">
							<div class="box">
								
								<div class="box-body">
									<table id="example2" class="table table-bordered table-hover">
										<thead>
											<tr>
												<th>İlanId </th>
												<th>Emlakcı</th>
												<th>İlan Başlık</th>
												<th>İlçe </th>
												<th>Mahalle</th>
												<th>ilan Tarih</th>
												<th>Emlak Tipi</th>
												<th>Manşet</th>
												<th>Popüler</th>
												<th>Durum</th>
												<th>İşlem</th>
											</tr>
										</thead>
										<tbody>
											
											
											
											<?php 
												$emlakci_id=$_SESSION['emlakci_id'];
												$seviye= $_SESSION['seviye'];
												
												if($seviye==1) { 
												
												
												$sorgu=$veritabani->prepare("SELECT ilanlar.ilan_id, ilceler.ilce_ad, mahalle.mahalle_ad, 
													emlak_tip.emlak_tip_ad, emlakcilar.ad, isitma_tip.isitma_ad, oda_sayisi_tip.oda_ad, 
													ilanlar.kiralik_satilik, ilanlar.ilan_baslik, ilanlar.ilan_tarih, ilanlar.aktif, ilanlar.manset,ilanlar.populer
													FROM ilanlar
													INNER JOIN ilceler ON ilceler.ilce_id = ilanlar.ilce_id
													INNER JOIN mahalle ON mahalle.mahalle_id = ilanlar.mahalle_id
													INNER JOIN emlak_tip ON emlak_tip.emlak_tip_id = ilanlar.emlak_tip_id
													INNER JOIN emlakcilar ON emlakcilar.emlakci_id = ilanlar.emlakci_id
													INNER JOIN isitma_tip ON isitma_tip.isitma_id = ilanlar.isitma_tip_id
													INNER JOIN oda_sayisi_tip ON oda_sayisi_tip.oda_tip_id = ilanlar.oda_tip_id");
													
													} else {
													
												$sorgu=$veritabani->prepare("SELECT ilanlar.ilan_id, ilceler.ilce_ad, mahalle.mahalle_ad, 
													emlak_tip.emlak_tip_ad, emlakcilar.ad, isitma_tip.isitma_ad, oda_sayisi_tip.oda_ad, 
													ilanlar.kiralik_satilik, ilanlar.ilan_baslik, ilanlar.ilan_tarih, ilanlar.aktif, ilanlar.manset,ilanlar.populer
													FROM ilanlar
													INNER JOIN ilceler ON ilceler.ilce_id = ilanlar.ilce_id
													INNER JOIN mahalle ON mahalle.mahalle_id = ilanlar.mahalle_id
													INNER JOIN emlak_tip ON emlak_tip.emlak_tip_id = ilanlar.emlak_tip_id
													INNER JOIN emlakcilar ON emlakcilar.emlakci_id = ilanlar.emlakci_id
													INNER JOIN isitma_tip ON isitma_tip.isitma_id = ilanlar.isitma_tip_id
													INNER JOIN oda_sayisi_tip ON oda_sayisi_tip.oda_tip_id = ilanlar.oda_tip_id WHERE ilanlar.emlakci_id=$emlakci_id");
												}
												
												$sorgu->execute();
												//
												while($sonuc=$sorgu->fetch())
												{
													$ilan_id=$sonuc['ilan_id'];
													$populer=$sonuc['populer'];
													$manset=$sonuc['manset'];
													?>
												<tr>
													<td><?php echo $ilan_id;?></td>
													<td><?php echo $sonuc['ad'];?></td>
													<td><?php echo $sonuc['ilan_baslik'];?></td>
													<td><?php echo $sonuc['ilce_ad'];?></td>
													<td><?php echo $sonuc['mahalle_ad'];?></td>
													<td><?php echo $sonuc['ilan_tarih'];?></td>
													<td><?php echo $sonuc['emlak_tip_ad'];?></td>
													<td><?php
													if($sonuc['manset']==1)
													echo "<a title='Manşet Yapma ' href='ilan_islem.php?islem=mansetyapma&ilan_id=$ilan_id'><span class='fa fa-fw fa-play-circle'></span></a></td><td>";
													else echo "<a title='Manşet Yapma' href='ilan_islem.php?islem=mansetyap&ilan_id=$ilan_id'><span class='fa fa-fw fa-stop'></span></a></td><td>";
												
													if($sonuc['populer']==1)
													echo "<a title='Populer Yapma'  href='ilan_islem.php?islem=populeryapma&ilan_id=$ilan_id'><span class='fa fa-fw fa-star'></span></a></td><td>";
													else echo "<a title='Populer Yap' href='ilan_islem.php?islem=populeryap&ilan_id=$ilan_id'><span class='fa fa-fw fa-star-o'></span></a></td><td>";
													
													 if($sonuc['aktif']==1) 
														echo "<a title='Pasif Yap' href='ilan_islem.php?islem=pasifyap&ilan_id=$ilan_id'><span class='label label-success'>Aktif</span></a>"; 
														else echo "<a title='Aktif Yap' href='ilan_islem.php?islem=aktifyap&ilan_id=$ilan_id'><span class='label label-danger'>Pasif</span></a>"; 
														
														?>
													</td>
													<td><a href="ilan_duzenle.php?islem=duzenle&ilan_id=<?php echo $sonuc['ilan_id'];?>"><span class="glyphicon glyphicon-pencil"></span></a>    -
													<a href="ilan_islem.php?islem=sil&ilan_id=<?php echo $sonuc['ilan_id'];?>"> <span class="glyphicon glyphicon-remove"></span></a>
													</td>
													</tr>
												
											<?php } ?>
											
											
										</tbody>
	
									</table>
								</div><!-- /.box-body -->
							</div>
						</div><!-- /.col -->
					</div><!-- /.row -->
				</section><!-- /.content -->
			</div>
			
			
			
		
		
		<!-- /.content-wrapper -->
		
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
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
	$(function () {
		$("#example1").DataTable();
		$('#example2').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": true,
			"autoWidth": false
		});
	});
</script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
	Both of these plugins are recommended to enhance the
	user experience. Slimscroll is required when using the
fixed layout. -->
</body>
</html>
