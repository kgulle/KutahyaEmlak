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
						Emlakcılar
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
												<th>Emlakcı Id </th>
												<th>Emlakcı Ad</th>
												<th>E-Posta</th>
												<th>Seviye</th>
												<th>İşlem</th>
											</tr>
										</thead>
										<tbody>
									
											
											
											<?php 
												$sorgu=$veritabani->prepare("select*from emlakcilar order by ad");
												$sorgu->execute();
												 //
												while($sonuc=$sorgu->fetch()){
													$emlakci_id=$sonuc['emlakci_id'];
													$ad=$sonuc['ad'];
													$eposta=$sonuc['eposta'];
													$seviye=$sonuc['seviye'];
												
												?>
												<tr>
											<td><?php echo $sonuc['emlakci_id'];?></td>
											<td><?php echo $sonuc['ad'];?></td>
											<td><?php echo $sonuc['eposta'];?></td>
											<td><?php if ($sonuc['seviye']=="1") echo "Admin"; else echo "Kullanici"; ?></td>
											<td><a href="emlakci_duzenle.php?islem=duzenle&emlakci_id=<?php echo $sonuc['emlakci_id'];?>" <span class="glyphicon glyphicon-pencil"></span></a>    - <a href="emlakci_islem.php?islem=sil&emlakci_id=<?php echo $sonuc['emlakci_id'];?>" <span class="glyphicon glyphicon-remove"></span></a></td>
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
						