<?php
	include"baglanti.php";
	include"session.php";
	$emlakci_id=$_SESSION['emlakci_id'];
	$seviye=$_SESSION['seviye'];
	
	
	if($seviye=="0") {
	$sorgu3=$veritabani->prepare("
	SELECT 
	mesajlar.gonderen_ad,ilanlar.ilan_baslik,mesajlar.gonderen_mail,mesajlar.konu,mesajlar.tarih,mesajlar.mesaj_id,mesajlar.okundu
	FROM mesajlar
	INNER JOIN ilanlar ON mesajlar.ilan_id = ilanlar.ilan_id
	INNER JOIN emlakcilar ON ilanlar.emlakci_id = emlakcilar.emlakci_id
	WHERE emlakcilar.emlakci_id =$emlakci_id and mesajlar.okundu=0 ORDER BY mesajlar.tarih");
	$sorgu3->execute();
	$okunmayan_mesaj_sayisi = $sorgu3->rowCount();	
	} else {
	$sorgu3=$veritabani->prepare("
	SELECT 
	mesajlar.gonderen_ad,ilanlar.ilan_baslik,mesajlar.gonderen_mail,mesajlar.konu,mesajlar.tarih,mesajlar.mesaj_id,mesajlar.okundu
	FROM mesajlar
	INNER JOIN ilanlar ON mesajlar.ilan_id = ilanlar.ilan_id
	INNER JOIN emlakcilar ON ilanlar.emlakci_id = emlakcilar.emlakci_id
	WHERE mesajlar.okundu=0 ORDER BY mesajlar.tarih");
	$sorgu3->execute();
	$okunmayan_mesaj_sayisi = $sorgu3->rowCount();
	
	}
	
?>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Kütahya Emlak Rehberi</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">
	
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
	<span class="sr-only">Menu</span>
</a>
<!-- Navbar Right Menu -->
<div class="navbar-custom-menu">
	<ul class="nav navbar-nav">
		<!-- Messages: style can be found in dropdown.less-->
		
		
		<li class="dropdown messages-menu">
			<!-- Menu toggle button -->
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<i class="fa fa-envelope-o"></i>
				<span class="label label-success"><?php echo $okunmayan_mesaj_sayisi; ?></span>
			</a>
			<ul class="dropdown-menu">
				<li class="header"><?php echo $okunmayan_mesaj_sayisi; ?> Yeni Mesaj var</li>
				
				<li class="footer"><a href="mesajlar.php">Mesajlara git</a></li>
			</ul>
		</li>
		
		<?php 
			if($seviye=="1") {
			$sorgu4=$veritabani->prepare("SELECT * FROM iletisim WHERE okundu=0 ");
			$sorgu4->execute();
			$iletisimesajsayisi = $sorgu4->rowCount();	
			
		?>
		
		
		
		<li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<i class="fa fa-bell-o"></i>
				<span class="label label-warning"><?php echo $iletisimesajsayisi; ?></span>
			</a>
            <ul class="dropdown-menu">
				<li class="header"><?php echo $iletisimesajsayisi; ?> Yeni İletişim Mesajı var</li>
				
				<li class="footer"><a href="iletisim.php">İletişim Kutusuna Git...</a></li>
			</ul>
		</li>
		<?php } ?>
		
		
		<!-- User Account: style can be found in dropdown.less -->
		<li class="dropdown user user-menu">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<img src="<?php echo $_SESSION['logo_url'];?>" class="user-image" alt="User Image">
				<span class="hidden-xs"><?php echo $_SESSION['ad'];?></span>
			</a>
			<ul class="dropdown-menu">
				<!-- User image -->
				<li class="user-header">
                    <img src="<?php echo $_SESSION['logo_url'];?>" class="img-circle" alt="User Image">
                    <p>
						<?php echo $_SESSION['ad'];?>
						<small><?php echo $_SESSION['eposta'];?></small>
					</p>
				</li>
				<!-- Menu Body -->
				
				<!-- Menu Footer-->
				<li class="user-footer">
                    <div class="pull"><center>
					<a href="giris_islem.php?islem=cikis" class="btn btn-default btn-flat">Çıkış Yap</a></center>
                    </div>
				</li>
			</ul>
		</li>
		<!-- Control Sidebar Toggle Button -->
		
		
		
		
	</ul>
</div>


</nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
<!-- Sidebar user panel (optional) -->
<div class="user-panel">
<div class="pull-left image">
<img src="<?php echo $_SESSION['logo_url'];?>" class="img-circle" alt="User Image">
</div>
<div class="pull-left info">
<p><?php echo $_SESSION['ad'];?> </p>
<a href="#"><i class="fa fa-circle text-success"></i> Çevrim içi</a>

<!-- Status -->
</div>
</div>
<!-- Sidebar Menu -->
<ul class="sidebar-menu">
<li class="header"></li>
<!-- Optionally, you can add icons to the links -->
<li class="active"><a href="index.php"><i class="fa fa-link"></i> <span>Anasayfa</span></a></li>

<?php 
if($_SESSION['seviye']==1) 
echo "<li><a href='emlakci_ekle.php'><i class='fa fa-link'></i> <span>Emlakcı Ekle</span></a></li>
<li><a href='emlakci_listele.php'><i class='fa fa-link'></i> <span>Emlakcılar</span></a></li>";
else echo "<li><a href='profil.php'><i class='fa fa-link'></i> <span>Profilim </span></a></li>";

?>
<li><a href="ilan_ekle.php"><i class="fa fa-link"></i> <span>İlan Ekle</span></a></li>
<li><a href="ilan_listele.php"><i class="fa fa-link"></i> <span>İlanlarım</span></a></li>

<li class="treeview">
<a href="#"><i class="fa fa-link"></i> <span>Mesaj Kutusu</span> <i class="fa fa-angle-left pull-right"></i></a>
<ul class="treeview-menu">
<li><a href="mesajlar.php">Gelenler</a></li>
<li><a href="mesajlar.php?goster=okunmamis">Okunmamış</a></li>
<li><a href="mesajlar.php?goster=copkutusu">Çöp Kutusu</a></li>
</ul>
</li>
<?php 
$seviye= $_SESSION['seviye'];
if($seviye==1) { ?>
<li class="treeview">
<a href="#"><i class="fa fa-link"></i> <span>İletişim Kutusu</span> <i class="fa fa-angle-left pull-right"></i></a>
<ul class="treeview-menu">
<li><a href="iletisim.php">Gelenler</a></li>
<li><a href="iletisim.php?goster=okunmamis">Okunmamış</a></li>
<li><a href="iletisim.php?goster=copkutusu">Çöp Kutusu</a></li>
</ul>
</li>
<li><a href='adres_tanimlari.php'><i class='fa fa-link'></i> <span>Adres Tanımları</span></a></li>

<?php } ?>
</ul><!-- /.sidebar-menu -->
</section>
<!-- /.sidebar -->
</aside>			