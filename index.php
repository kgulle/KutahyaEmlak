<?php 
	
	include"yonetim/baglanti.php"; 
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		
		<title>KÜTAHYA EMLAK REHBERİ</title>
		
		<!-- Bootstrap core CSS -->
		<link href="assets/css/bootstrap.css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<!-- Style CSS -->
		<link href="style.css" rel="stylesheet">
		
		<!-- Google Fonts -->
		<link href='http://fonts.googleapis.com/css?family=Lato:400,300,400italic,700,700italic,900' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800,300italic,400italic' rel='stylesheet' type='text/css'>
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
		
		<!-- Favicons -->
		<link rel="shortcut icon" href="assets/ico/favicon.ico" type="image/x-icon">
		<link rel="apple-touch-icon" href="assets/ico/apple-touch-icon.png" />
		<link rel="apple-touch-icon" sizes="57x57" href="assets/ico/apple-touch-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="72x72" href="assets/ico/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="114x114" href="assets/ico/apple-touch-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="144x144" href="assets/ico/apple-touch-icon-144x144.png">
		
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
				//ilcenin alinmasi
				ilce=$("#ilce").val();
				//seçilem ilcenin gondermesi
				$.ajax({
					type:'POST',
					url:'mahalle_yukle.php',
					data:'ilce='+ilce,
					success: function(msg){
						//dönen mahalleyi gösterme
						$('#mahalle').html(msg);
					}
				});
			}
		</script>
		
	</head>
	<body>
        
	</form>
</div><!--/ login-popup-->
</div><!--/ toolbar-wrapp-->


<div class="topbar clearfix">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="callus">
					<p>
						
					</p>
				</div><!-- end callus-->
			</div><!-- end col-lg-6 -->
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="marketing">
					<ul class="topmenu pull-right">
						<li><a href="yonetim"><i class="fa fa-lock"></i> Giriş </a></li>
					</ul><!-- topmenu -->
				</div><!-- end marketing -->
			</div><!-- end col-lg-6 -->
		</div><!-- end row -->
	</div><!-- end container -->
	</div><!-- end topbar -->        <header class="header1">
	<div class="container">
		<div class="row header-row">
			<div class="col-lg-4 col-md-6 col-sm-12">
				<div class="logo-wrapper clearfix">
					<div class="logo">
						<a href="index.php" title="Home">
							<img src="images/logo.png" alt="Estate">
						</a>
					</div><!-- /.site-name -->
				</div><!-- /.logo-wrapper -->
			</div>
			<div class="col-lg-3 col-md-6 col-sm-12">
			</div>      
			<div class="col-lg-5 col-md-5 col-sm-12  pull-right">
				
			</div>     
		</div><!-- end row -->
		<nav class="navbar navbar-default fhmm" role="navigation">
			<div class="menudrop container">
				<div class="navbar-header">
					<button type="button" data-toggle="collapse" data-target="#defaultmenu" class="navbar-toggle"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
				</div><!-- end navbar-header -->
				<div id="defaultmenu" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<!-- Mega Menu -->
						<li class="dropdown fhmm-fw active"><a href="index.php"><i class="fa fa-home"></i> ANASAYFA</a></li><!-- mega menu -->
						<li class="dropdown fhmm-fw"><a href="#" data-toggle="dropdown" class="dropdown-toggle">POPÜLER İLANLAR <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li class="fhmm-content fullwidth">
									<div class="row">
										
										<?php
											//menu populer ilanlar
											$sorgu=$veritabani->prepare("SELECT ilanlar.ilan_id,ilanlar.fiyat, ilceler.ilce_ad, mahalle.mahalle_ad, 
											emlak_tip.emlak_tip_ad, emlakcilar.ad, isitma_tip.isitma_ad, oda_sayisi_tip.oda_ad, 
											ilanlar.kiralik_satilik, ilanlar.ilan_baslik,ilanlar.ilan_aciklama, ilanlar.ilan_tarih, ilanlar.aktif, ilanlar.manset,ilanlar.populer,ilanlar.metre_kare
											FROM ilanlar
											INNER JOIN ilceler ON ilceler.ilce_id = ilanlar.ilce_id
											INNER JOIN mahalle ON mahalle.mahalle_id = ilanlar.mahalle_id
											INNER JOIN emlak_tip ON emlak_tip.emlak_tip_id = ilanlar.emlak_tip_id
											INNER JOIN emlakcilar ON emlakcilar.emlakci_id = ilanlar.emlakci_id
											INNER JOIN isitma_tip ON isitma_tip.isitma_id = ilanlar.isitma_tip_id
											INNER JOIN oda_sayisi_tip ON oda_sayisi_tip.oda_tip_id = ilanlar.oda_tip_id 
											WHERE ilanlar.populer=1 and ilanlar.aktif=1 ORDER BY RAND() LIMIT 4"); 
											
											$sorgu->execute();
											//
											while($sonuc=$sorgu->fetch())
											{
												$ilan_id=$sonuc['ilan_id'];
												$ilan_baslik=$sonuc['ilan_baslik'];
												$ilan_aciklama =substr($sonuc['ilan_aciklama'], 0, 70); 
												$emlak_tip_ad =$sonuc['emlak_tip_ad'];
												$fiyat=$sonuc['fiyat'];
												$kiralik_satilik =$sonuc['kiralik_satilik'];
												$mahalle_ad =$sonuc['mahalle_ad'];
												$ilce_ad=$sonuc['ilce_ad'];
												$metre_kare=$sonuc['metre_kare'];
												$oda_ad=$sonuc['oda_ad'];
												
												$sorgu2=$veritabani->prepare("select resim_url from ilan_resim where ilan_id=$ilan_id");
												$sorgu2->execute();
												$sonuc2=$sorgu2->fetch();
												$resim_url= $sonuc2['resim_url'];
												
											?>
											<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
												<div class="boxes first">
													<div class="ImageWrapper boxes_img">
														<img class="img-responsive" src="<?php echo $resim_url; ?>" alt="">
														<div class="ImageOverlayH"></div>
														<div class="Buttons StyleSc">
															<span class="WhiteSquare"><a class="fancybox" href="<?php echo $resim_url; ?>"><i class="fa fa-search"></i></a>
															</span>
															<span class="WhiteSquare"><a href="ilan_ayrinti.php?ilan_id=<?php echo $ilan_id; ?>"><i class="fa fa-link"></i></a>
															</span>
														</div>
														<div class="box_type">₺<?php echo $fiyat; ?>  </div>
														<div class="status_type"><?php if($kiralik_satilik==1) echo "Satılık"; else echo "Kiralık"; ?></div>
													</div>
													<h2 class="title"><a href="ilan_ayrinti.php?ilan_id=<?php echo $ilan_id; ?>"> <?php echo mb_substr($ilan_baslik,0,40,'UTF-8'); ?>
														</a> <small class="small_title"><?php echo $ilce_ad; echo "/".$mahalle_ad ?></small></h2>
													
													<div class="boxed_mini_details1 clearfix">
														<span class="garage first"><strong>Garaj</strong><i class="icon-garage"></i> 0</span>
														<span class="bedrooms"><strong>Oda</strong><i class="icon-bed"></i> <?php echo $oda_ad; ?></span>
														<span class="status"><strong>Banyo</strong><i class="icon-bath"></i> 1</span>
														<span class="sqft last"><strong>Alanı</strong><i class="icon-sqft"></i> <?php echo $metre_kare; ?>m² </span>
													</div>
												</div><!-- end boxes -->
											</div>
										<?php  } ?>		
										
									</div><!-- end row -->
								</li><!-- end grid demo -->
							</ul><!-- end drop down menu -->
						</li><!-- end list elements -->
						<!-- standard drop down -->
						
						<li><a href="emlakcilar.php">EMLAKÇILAR</a></li>
						
						<li><a href="iletisim.php">İLETİŞİM</a></li>
						<li><a href="hakkimizda.php">HAKKIMIZDA</a></li>
					</ul><!-- end nav navbar-nav -->
				</div><!-- end #navbar-collapse-1 -->
			</div><!-- end dm_container -->
		</nav><!-- end navbar navbar-default fhmm -->
	</div><!-- end container -->
</header><!-- end header -->

<section id="one-parallax" class="parallax" style="background-image: url('demos/01_parallax.jpg');" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
	<div class="mapandslider">
		<div class="overlay1 dm-shadow">
			<div class="container">
				<div class="row">
                	<div class="col-lg-8 col-md-8 col-sm-12">
                        <div id="property-slider" class="clearfix">
                            <div class="flexslider">
                                <ul class="slides">
									<?php
										$sorgu=$veritabani->prepare("SELECT ilanlar.ilan_id,ilanlar.fiyat, ilceler.ilce_ad, mahalle.mahalle_ad, 
										emlak_tip.emlak_tip_ad, emlakcilar.ad, isitma_tip.isitma_ad, oda_sayisi_tip.oda_ad, 
										ilanlar.kiralik_satilik, ilanlar.ilan_baslik,ilanlar.ilan_aciklama, ilanlar.ilan_tarih, ilanlar.aktif, ilanlar.manset,ilanlar.populer
										FROM ilanlar
										INNER JOIN ilceler ON ilceler.ilce_id = ilanlar.ilce_id
										INNER JOIN mahalle ON mahalle.mahalle_id = ilanlar.mahalle_id
										INNER JOIN emlak_tip ON emlak_tip.emlak_tip_id = ilanlar.emlak_tip_id
										INNER JOIN emlakcilar ON emlakcilar.emlakci_id = ilanlar.emlakci_id
										INNER JOIN isitma_tip ON isitma_tip.isitma_id = ilanlar.isitma_tip_id
										INNER JOIN oda_sayisi_tip ON oda_sayisi_tip.oda_tip_id = ilanlar.oda_tip_id 
										WHERE ilanlar.manset=1 and ilanlar.aktif=1"); 
										
										$sorgu->execute();
										//
										while($sonuc=$sorgu->fetch())
										{
											$ilan_id=$sonuc['ilan_id'];
											$ilan_baslik=$sonuc['ilan_baslik'];
											$ilan_aciklama =substr($sonuc['ilan_aciklama'], 0, 70); 
											$emlak_tip_ad =$sonuc['emlak_tip_ad'];
											$fiyat=$sonuc['fiyat'];
											$kiralik_satilik =$sonuc['kiralik_satilik'];
											
											$sorgu2=$veritabani->prepare("select resim_url from ilan_resim where ilan_id=$ilan_id");
											$sorgu2->execute();
											$sonuc2=$sorgu2->fetch();
											$resim_url= $sonuc2['resim_url'];
											
										?>
										<li>
											<div class="desc">
												<div class="ps-desc">
													<h3><a href="#"><?php echo $ilan_baslik;  ?></a></h3>
													<p><?php echo mb_substr($ilan_baslik,0,80,'UTF-8'); ?> <a href="ilan_ayrinti.php?ilan_id=<?php echo $ilan_id; ?>">İlana Git</a></p>
													<span class="type"><?php echo $emlak_tip_ad; ?> </span>
													<span class="price">₺<?php echo $fiyat; ?></span>
													<a href="#" class="status"><?php if($kiralik_satilik==1) echo "Satılık"; else echo "Kiralık"; ?></a>
												</div>
											</div>
											<a href="#"><img src="<?php echo $resim_url; ?>" alt=""></a>
										</li>
									<?php } ?>
									
								</ul><!-- end slides -->
							</div><!-- end flexslider -->
						</div><!-- end property-slider -->
					</div><!-- end col-lg-8 -->
                    
					<div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="searchmodule clearfix" data-effect="slide-right">
							<form id="advanced_search" action="arama_sonucu.php" class="clearfix" name="advanced_search" method="post">
								
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<label for="country">İlçe</label>
                                    <select id="ilce" class="show-menu-arrow selectpicker" name="ilce_id">
									<option value="x"> Fark Etmez</option>
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
								
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="mahalle">
									
								</div> 
								<div class="clearfix"></div>
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
									<label for="status">Durum</label>
									<select id="status" name="kiralik_satilik" class="show-menu-arrow selectpicker">
									<option value="x"> Fark Etmez</option>
										<option value="0">Kiralık</option>
										<option value="1">Satılık</option>
									</select>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
									<label for="type">Emlak Tip</label>
									<select id="type" name="emlak_tip_id"  class="show-menu-arrow selectpicker">
									<option value="x"> Fark Etmez</option>
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
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
									<label for="bedrooms"> Oda Sayısı</label>
									<select id="bedrooms" name="oda_tip_id" class="show-menu-arrow selectpicker">
									<option value="x"> Fark Etmez</option>
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
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
									<label for="baths">Isınma Şekli</label>
									<select id="baths" name="isitma_tip_id" class="show-menu-arrow selectpicker">
									<option value="x"> Fark Etmez</option>
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
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
									<label for="min_price">Minimum Fiyat</label>
									<select id="min_price" name="minfiyat" class="show-menu-arrow selectpicker">
									<option value="x"> Fark Etmez</option>
										<option value="0">₺0 </option>
										<option value="250">₺250</option>
										<option value="500">₺500</option>
										<option value="1000">₺1000</option>
										<option value="10000">₺10000</option>
										<option value="50000">₺50000</option>
										<option value="100000">₺100000</option>
										<option value="150000">₺150000</option>
										<option value="250000">₺250000</option>
										<option value="500000+">₺500000+</option>
									</select>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
									<label for="max_price">Maksimum Fiyat</label>
									<select id="max_price" name="maxfiyat" class="show-menu-arrow selectpicker">
									<option value="x"> Fark Etmez</option>
										<option value="250">₺250</option>
										<option value="500">₺500</option>
										<option value="1000">₺1000</option>
										<option value="10000">₺10000</option>
										<option value="50000">₺50000</option>
										<option value="100000">₺100000</option>
										<option value="150000">₺150000</option>
										<option value="250000">₺250000</option>
										<option value="500000+">₺500000</option>
										<option value="100000+">₺1000000</option>
									</select>
								</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
							<br><br><br><br>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						 <button class="btn btn-inverse btn-block"><i class="fa fa-search"></i>ARAMA</button>   

						</div>
					</form>
				</div><!-- end search module -->
			</div><!-- end col-lg-4 --> 
		</div><!-- end row -->
	</div><!-- end dm_container -->
</div>
</div>
</section><!-- end mapandslider -->


<!-- end generalwrapper -->

<section id="three-parallax" class="parallax" style="background-image: url('demos/02_parallax.jpg');" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
	<div class="threewrapper">
		<div class="overlay1 dm-shadow">
			<div class="container">
				<div class="row">
					<div class="text-center clearfix">
						<h4 class="big_title">POPÜLER İLANLAR </h4>
					</div>
					
					
					<?php
						$sorgu=$veritabani->prepare("SELECT ilanlar.ilan_id,ilanlar.fiyat, ilceler.ilce_ad, mahalle.mahalle_ad, 
						emlak_tip.emlak_tip_ad, emlakcilar.ad, isitma_tip.isitma_ad, oda_sayisi_tip.oda_ad, 
						ilanlar.kiralik_satilik, ilanlar.ilan_baslik,ilanlar.ilan_aciklama, ilanlar.ilan_tarih, ilanlar.aktif, ilanlar.manset,ilanlar.populer,ilanlar.metre_kare
						FROM ilanlar
						INNER JOIN ilceler ON ilceler.ilce_id = ilanlar.ilce_id
						INNER JOIN mahalle ON mahalle.mahalle_id = ilanlar.mahalle_id
						INNER JOIN emlak_tip ON emlak_tip.emlak_tip_id = ilanlar.emlak_tip_id
						INNER JOIN emlakcilar ON emlakcilar.emlakci_id = ilanlar.emlakci_id
						INNER JOIN isitma_tip ON isitma_tip.isitma_id = ilanlar.isitma_tip_id
						INNER JOIN oda_sayisi_tip ON oda_sayisi_tip.oda_tip_id = ilanlar.oda_tip_id 
						WHERE ilanlar.populer=1 and ilanlar.aktif=1  LIMIT 8"); 
						
						$sorgu->execute();
						//
						$say=0;
						while($sonuc=$sorgu->fetch())
						{
							$say=$say+1;
							
							$ilan_id=$sonuc['ilan_id'];
							$ilan_baslik=$sonuc['ilan_baslik'];
							$ilan_aciklama =substr($sonuc['ilan_aciklama'], 0, 70); 
							$emlak_tip_ad =$sonuc['emlak_tip_ad'];
							$fiyat=$sonuc['fiyat'];
							$kiralik_satilik =$sonuc['kiralik_satilik'];
							$mahalle_ad =$sonuc['mahalle_ad'];
							$ilce_ad=$sonuc['ilce_ad'];
							$metre_kare=$sonuc['metre_kare'];
							$oda_ad=$sonuc['oda_ad'];
							
							$sorgu2=$veritabani->prepare("select resim_url from ilan_resim where ilan_id=$ilan_id");
							$sorgu2->execute();
							$sonuc2=$sorgu2->fetch();
							$resim_url= $sonuc2['resim_url'];
							
							$mod=$say%4;
							//echo $mod;
							
						?>
						
						<!-- populer başlangıçkısmı boxes -->
						

						
						
						
						
						
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="boxes<?php if($mod==1) echo " first"; elseif($mod==0) echo " last"; ?>" data-effect="slide-bottom">
                                        <div class="ImageWrapper boxes_img">
                                            <img class="img-responsive" src="<?php echo $resim_url ?>" alt="">
                                            <div class="ImageOverlayH"></div>
                                            <div class="Buttons StyleSc">
                                                <span class="WhiteSquare"><a class="fancybox" href="<?php echo $resim_url; ?>"><i class="fa fa-search"></i></a>
                                                </span>
                                                <span class="WhiteSquare"><a href="ilan_ayrinti.php?ilan_id=<?php echo $ilan_id; ?>"><i class="fa fa-link"></i></a>
                                                </span>
                                            </div>
                                            <div class="box_type">₺<?php echo $fiyat?></div>
                                            <div class="status_type"><?php if($kiralik_satilik==1) echo "Satılık"; else echo "Kiralık"; ?></div>
                                        </div>
                                        <h2 class="title"><a href="ilan_ayrinti.php?ilan_id=<?php echo $ilan_id; ?>"> <?php echo mb_substr($ilan_baslik,0,30,'UTF-8'); ?></a> 
											<small class="small_title"><?php echo mb_substr($ilan_aciklama,0,30,'UTF-8'); ?></small></h2>
                                       
                                        <div class="boxed_mini_details1 clearfix">
									<span class="garage first"><strong>Garaj</strong><i class="icon-garage"></i> 2</span>
									<span class="bedrooms"><strong>Oda</strong><i class="icon-bed"></i> <?php echo $oda_ad; ?></span>
									<span class="status"><strong>Banyo</strong><i class="icon-bath"></i> 3</span>
									<span class="sqft last"><strong>Alanı</strong><i class="icon-sqft"></i> <?php echo $metre_kare; ?>m²</span>
                                        </div>
                                    </div><!-- end boxes -->
                                </div>
								
								
								

					<?php } ?>
					<!-- populer başlangıçkısmı boxes -->
					
					
					
				</div><!-- end row -->
			</div><!-- end container -->
		</div><!-- end overlay1 -->
	</div><!-- end threewrapper -->
</section><!-- end parallax -->

<section class="generalwrapper dm-shadow clearfix">
	<div class="container">
		<div class="row">
			
			
			<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 clearfix">
				<div id="tabbed_widget" class="tabbable clearfix" data-effect="slide-bottom"> 
					<ul class="nav nav-tabs">
						
						<?php 
							$sorgu1=$veritabani->prepare("SELECT * from emlak_tip "); 
							$sorgu1->execute();
							$say=0;
							while($sonuc1=$sorgu1->fetch())
							{
								$emlak_tip_id=$sonuc1['emlak_tip_id'];
								$emlak_tip_ad=$sonuc1['emlak_tip_ad'];
								$say++;
								if($say==1) echo "<li class='active'><a href='#tab$emlak_tip_id' data-toggle='tab'>$emlak_tip_ad</a></li>"; 
								else echo "<li><a href='#tab$emlak_tip_id' data-toggle='tab'>$emlak_tip_ad</a></li>";
							}
						?>
						
					</ul>
					<div class="tab-content tabbed_widget clearfix">
						
						<?php
							
							$sorgu1=$veritabani->prepare("SELECT * from emlak_tip "); 
							$sorgu1->execute();
							//
							while($sonuc1=$sorgu1->fetch())
							{
								$emlak_tip_id=$sonuc1['emlak_tip_id'];
								$emlak_tip_ad=$sonuc1['emlak_tip_ad'];
								
								echo "<div class='tab-pane active' id='tab$emlak_tip_id'>";
								
								
								$sorgu2=$veritabani->prepare("SELECT ilanlar.ilan_id,ilanlar.fiyat, ilceler.ilce_ad, mahalle.mahalle_ad, 
								emlak_tip.emlak_tip_ad, emlakcilar.ad, isitma_tip.isitma_ad, oda_sayisi_tip.oda_ad,ilanlar.metre_kare, 
								ilanlar.kiralik_satilik, ilanlar.ilan_baslik,ilanlar.ilan_aciklama, ilanlar.ilan_tarih, ilanlar.aktif, ilanlar.manset,ilanlar.populer
								FROM ilanlar
								INNER JOIN ilceler ON ilceler.ilce_id = ilanlar.ilce_id
								INNER JOIN mahalle ON mahalle.mahalle_id = ilanlar.mahalle_id
								INNER JOIN emlak_tip ON emlak_tip.emlak_tip_id = ilanlar.emlak_tip_id
								INNER JOIN emlakcilar ON emlakcilar.emlakci_id = ilanlar.emlakci_id
								INNER JOIN isitma_tip ON isitma_tip.isitma_id = ilanlar.isitma_tip_id
								INNER JOIN oda_sayisi_tip ON oda_sayisi_tip.oda_tip_id = ilanlar.oda_tip_id 
				
								WHERE ilanlar.aktif=1 and emlak_tip.emlak_tip_id=$emlak_tip_id  LIMIT 12"); 
								$sorgu2->execute();
								
								while($sonuc2=$sorgu2->fetch())
								{
									$ilan_id=$sonuc2['ilan_id'];
									$ilan_baslik=$sonuc2['ilan_baslik'];
									$ilan_aciklama =substr($sonuc2['ilan_aciklama'], 0, 70); 
									$emlak_tip_ad =$sonuc2['emlak_tip_ad'];
									$fiyat=$sonuc2['fiyat'];
									$kiralik_satilik =$sonuc2['kiralik_satilik'];
									$mahalle_ad =$sonuc2['mahalle_ad'];
									$ilce_ad=$sonuc2['ilce_ad'];
									$metre_kare=$sonuc2['metre_kare'];
									$oda_ad=$sonuc2['oda_ad'];
									
									$sorgu3=$veritabani->prepare("select resim_url from ilan_resim where ilan_id=$ilan_id");
									$sorgu3->execute();
									$sonuc3=$sorgu3->fetch();
									$resim_url= $sonuc3['resim_url'];
									
								?>
								<div class="col-lg-4 col-md-4 col-sm-4">
									<div class="boxes">
										<div class="boxes_img ImageWrapper">
											<a href="ilan_ayrinti.php?ilan_id=<?php echo $ilan_id; ?>">
												<img class="img-responsive" src="<?php echo $resim_url; ?>" alt="<?php echo $ilan_baslik; ?>">
												<div class="PStyleNe"></div>
											</a>
											<div class="box_type">₺<?php echo $fiyat; ?>  </div>
										</div>
										<h2 class="title"><a href="ilan_ayrinti.php?ilan_id=<?php echo $ilan_id; ?>"> <?php echo mb_substr($ilan_baslik,0,20,'UTF-8'); ?></a></h2>
										<div class="boxed_mini_details clearfix">
											<span class="area first"><strong>Garaj</strong><i class="icon-garage"></i> 0</span>
											<span class="sqft last"><strong>Alanı</strong><i class="icon-sqft"></i> <?php echo $metre_kare; ?>m²</span>
											<span class="bedrooms last"><strong>Oda</strong><i class="icon-bed"></i> <?php echo $oda_ad; ?></span>
										</div>
									</div><!-- end boxes -->
								</div>															
								<?php } 
								echo "</div>"; 
							}
						?>
						
					</div><!-- tab-content -->
				</div> <!-- widget -->  
			</div><!-- end col-lg-7 -->
			
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 last clearfix">
				<div class="widget clearfix">
					<div class="agents_widget">
						<div class="title"><h3><i class="fa fa-users"></i> EMLAKÇILAR</h3></div>
						<?php 
							$sorgu=$veritabani->prepare("select*from emlakcilar ORDER BY RAND() LIMIT 7");
							$sorgu->execute();
							//
							while($sonuc=$sorgu->fetch()){
								$emlakci_id=$sonuc['emlakci_id'];
								$ad=$sonuc['ad'];
								$eposta=$sonuc['eposta'];
								$logo_url=$sonuc['logo_url'];
								$seviye=$sonuc['seviye'];
								$telefon=$sonuc['telefon'];
							?>
							
							<div class="agent boxes clearfix" data-effect="slide-right">
								<div class="image">
									<img class="img-circle img-responsive img-thumbnail" src="<?php echo "yonetim/".$logo_url; ?>" alt="">
								</div><!-- image -->
								<div class="agent_desc">
									<h3 class="title"><a href="emlakci_hakkinda.php?emlakci_id=<?php echo $emlakci_id; ?>"><?php echo $ad; ?></a></h3>
									<p><span><i class="fa fa-envelope"></i><?php echo " ".$eposta; ?></span></p>
									<p><span><i class="fa fa-phone-square"></i> <?php echo $telefon; ?></span></p>
								</div><!-- agento desc -->
							</div>
						<?php } ?>
	
					</div><!-- end of agents_widget -->
				</div><!-- end of widget -->
				<div class="widget text-center clearfix"> </div><!-- end of widget -->  
			</div><!-- end col-lg-4 --> 
		</div><!-- end row -->
	</div><!-- end dm_container -->  
</section><!-- end generalwrapper -->		<!-- end parallax -->
<!-- end secondwrapper -->
<!-- footer1 -->

<section class="copyright">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-sm-6 col-md-6">
				<p><small>GENÇ YAZILIMCILAR . Copyright 2016 </small></p>
			</div>
			
			<div class="col-lg-6 col-sm-6 col-md-6">
                        <div class="social clearfix pull-right">
                            <span><a data-placement="top" data-toggle="tooltip" data-original-title="Twitter" title="" href="#"><i class="fa fa-twitter"></i></a></span>
                            <span><a data-placement="top" data-toggle="tooltip" data-original-title="Facebook" title="" href="https://www.facebook.com/kutahyaemkalcim/"><i class="fa fa-facebook"></i></a></span>
                            <span><a data-placement="top" data-toggle="tooltip" data-original-title="Google Plus" title="" href="#"><i class="fa fa-google-plus"></i></a></span>
                            <span><a data-placement="top" data-toggle="tooltip" data-original-title="Linkedin" title="" href="#"><i class="fa fa-linkedin"></i></a></span>
                            <span><a data-placement="top" data-toggle="tooltip" data-original-title="Github" title="" href="#"><i class="fa fa-github"></i></a></span>
                            <span><a data-placement="top" data-toggle="tooltip" data-original-title="Pinterest" title="" href="#"><i class="fa fa-pinterest"></i></a></span>
                            <span><a data-placement="top" data-toggle="tooltip" data-original-title="RSS" title="" href="#"><i class="fa fa-rss"></i></a></span>
                        </div><!-- end social -->
                    </div>
		</div><!-- end row -->
	</div><!-- end container -->
</section><!-- end copyright -->


<!-- Bootstrap core and JavaScript's
================================================== -->
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.parallax.js"></script>
<script src="js/jquery.fitvids.js"></script>    
<script src="js/jquery.unveilEffects.js"></script>	
<script src="js/retina-1.1.0.js"></script>
<script src="js/fhmm.js"></script>
<script src="js/bootstrap-select.js"></script>
<script src="fancyBox/jquery.fancybox.pack.js"></script>
<script src="js/application.js"></script>

<!-- FlexSlider JavaScript
================================================== -->
<script src="js/jquery.flexslider.js"></script>
<script>
	$(window).load(function() {
		$('#carousel').flexslider({
			animation: "slide",
			controlNav: true,
			directionNav: false,
			animationLoop: true,
			slideshow: true,
			itemWidth: 114,
			itemMargin: 0,
			asNavFor: '#slider'
		});
		
		$('#slider').flexslider({
			animation: "fade",
			controlNav: false,
			animationLoop: false,
			slideshow: true,
			sync: "#carousel"
		});
		
		$('#property-slider .flexslider').flexslider({
			animation: "fade",
			slideshowSpeed: 6000,
			animationSpeed:	1300,
			directionNav: true,
			controlNav: false,
			keyboardNav: true
		});
	});
</script>

</body>
</html>								