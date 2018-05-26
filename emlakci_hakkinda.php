<?php include"yonetim/baglanti.php"; 
	
	$emlakci_id=$_GET['emlakci_id'];
	// if (empty($emlakci_id)) echo "<script language='JavaScript'>document.location=('index.php')</script>";

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

</head>

<div class="topbar clearfix">
        	<div class="container">
            	<div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="callus">
                            
                        </div><!-- end callus-->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="marketing">
                           
                            <ul class="topmenu pull-right">
                                <li><a href="yonetim"><i class="fa fa-lock"></i> Giriş</a></li>
                            </ul><!-- topmenu -->
                        </div><!-- end marketing -->
                    </div><!-- end col-lg-6 -->
            	</div><!-- end row -->
			</div><!-- end container -->
		</div><!-- end topbar -->       
		
		<header class="header1">
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
												$ilan_aciklama =substr($sonuc['ilan_aciklama'], 0, 35); 
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
														<div class="box_type">₺<?php echo $fiyat; ?></div>
														<div class="status_type"><?php if($kiralik_satilik==1) echo "Satılık"; else echo "Kiralık"; ?></div>
													</div>
													<h2 class="title"><a href="ilan_ayrinti.php?ilan_id=<?php echo $ilan_id; ?>"> <?php echo $ilan_baslik; ?></a> <small class="small_title"><?php echo $ilce_ad; echo "/".$mahalle_ad ?></small></h2>
													
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

        <section class="post-wrapper-top dm-shadow clearfix">
            <div class="container">
                <div class="post-wrapper-top-shadow">
                    <span class="s1"></span>
                </div>
                
            </div>
        </section><!-- end post-wrapper-top -->
    
        <section class="generalwrapper dm-shadow clearfix">
        	<div class="container">
				<div class="row">
   
                    
                	<div id="content" class="col-lg-8 col-md-7 col-sm-7 col-xs-12 clearfix">
							<div class="agent_boxes boxes clearfix">
                        	<div class="agent_details clearfix">
							
							
											<?php 
				
				$sorgu=$veritabani->prepare("select * from emlakcilar where emlakci_id=$emlakci_id");
				$sorgu->execute();
				$sonuc=$sorgu->fetch();
				
				
				$sorgu5=$veritabani->prepare("select*from ilanlar where emlakci_id=$emlakci_id");
				$sorgu5->execute();
				//emlakci sayisi buluyoruz
				$ilan_sayisi = $sorgu5->rowCount();
			?>
							
							
							
                            	<div class="col-lg-7 col-md-7 col-sm-12">
                                	<div class="agents_widget">
                                		<h3 class="big_title"><?php echo $sonuc['ad'];?><small>Toplam İlan: <?php echo $ilan_sayisi;?></small></h3>
                                        <div class="agencies_widget row"> 
                                            <div class="col-lg-5 clearfix">
                                                <img class="img-thumbnail img-responsive" src="yonetim/<?php echo $sonuc['logo_url'];?>" alt="<?php echo $sonuc['ad'];?>">
                                            </div><!-- end col-lg-5 -->
                                            <div class="col-lg-7 clearfix">
                                                <div class="agencies_meta clearfix">
                                                    <span><i class="fa fa-envelope"></i> <a href="mailto:<?php echo $sonuc['eposta'];?>"><?php echo $sonuc['eposta'];?></a></span>
                                                    
                                                    <span><i class="fa fa-phone-square"></i> <?php echo $sonuc['telefon'];?></span>
                                         
                                                </div><!-- end agencies_meta -->
                                                
                                            </div><!-- end col-lg-7 -->
                                            
                                            <div class="clearfix"></div>
                                            
                                            <hr>
                                            
                                            <div class="col-lg-12">
                                            	 <p><?php echo $hakkinda; ?></p>
												 
                                            </div>
                                        </div><!-- end agencies_widget -->
                                    </div><!-- agents_widget -->
                                </div><!-- end col-lg-7 -->
								

                                
                  				<div class="col-lg-5 col-md-5 col-sm-12">
                               <img class="img-responsive" src="images/emlakci-iletisim.jpg" alt="">
                                    
                                </div><!-- end col-lg-6 -->
                            </div><!-- end agent_details -->
                        </div><!-- end agent_boxes -->
                        
						<div class="property_wrapper boxes clearfix">
							<h3 class="big_title">SON İLANLARI</h3>
                     		<div class="row">
							
							

							<?php 
						$sorgu=$veritabani->prepare("SELECT ilanlar.ilan_id,ilanlar.fiyat, ilceler.ilce_ad, mahalle.mahalle_ad, 
						emlak_tip.emlak_tip_ad, emlakcilar.ad, isitma_tip.isitma_ad, oda_sayisi_tip.oda_ad, emlakcilar.logo_url,ilanlar.esyali,
						ilanlar.kiralik_satilik, ilanlar.ilan_baslik,ilanlar.ilan_aciklama, ilanlar.ilan_tarih, ilanlar.aktif, ilanlar.manset,ilanlar.populer,ilanlar.metre_kare
						FROM ilanlar
						INNER JOIN ilceler ON ilceler.ilce_id = ilanlar.ilce_id
						INNER JOIN mahalle ON mahalle.mahalle_id = ilanlar.mahalle_id
						INNER JOIN emlak_tip ON emlak_tip.emlak_tip_id = ilanlar.emlak_tip_id
						INNER JOIN emlakcilar ON emlakcilar.emlakci_id = ilanlar.emlakci_id
						INNER JOIN isitma_tip ON isitma_tip.isitma_id = ilanlar.isitma_tip_id
						INNER JOIN oda_sayisi_tip ON oda_sayisi_tip.oda_tip_id = ilanlar.oda_tip_id 
						WHERE (ilanlar.emlakci_id=$emlakci_id and ilanlar.aktif=1) order by ilan_tarih desc"); 
						
						$sorgu->execute();
						//
						while($sonuc=$sorgu->fetch())
						{
							
							
							$ilan_id=$sonuc['ilan_id'];
							$ilan_baslik=$sonuc['ilan_baslik'];
							$ilan_aciklama =substr($sonuc['ilan_aciklama'], 0, 35); 
							$emlak_tip_ad =$sonuc['emlak_tip_ad'];
							$fiyat=$sonuc['fiyat'];
							$kiralik_satilik =$sonuc['kiralik_satilik'];
							$mahalle_ad =$sonuc['mahalle_ad'];
							$ilce_ad=$sonuc['ilce_ad'];
							$metre_kare=$sonuc['metre_kare'];
							$oda_ad=$sonuc['oda_ad'];
							$logo_url=$sonuc['logo_url'];
							$ad=$sonuc['ad'];
							$esyali=$sonuc['esyali'];
							
							$sorgu2=$veritabani->prepare("select resim_url from ilan_resim where ilan_id=$ilan_id");
							$sorgu2->execute();
							$sonuc2=$sorgu2->fetch();
							$resim_url= $sonuc2['resim_url'];
							
							
							
						?>
							
							
							
							
							
								<div class="col-lg-4 col-md-6 col-sm-12">                                    
								<div class="boxes">
                                        <div class="boxes_img ImageWrapper">
											<a href="ilan_ayrinti.php?ilan_id=<?php echo $ilan_id ?>">
												<img class="img-responsive" src="<?php echo $resim_url ?>" alt="">
												<div class="PStyleNe"></div>
											</a>
                                            <div class="box_type">₺<?php echo $fiyat ?></div>
                                        </div>
                                        <h2 class="title"><a href="ilan_ayrinti.php?ilan_id=<?php echo $ilan_id ?>"> <?php echo $ilan_baslik ?></a></h2>
                                        <div class="boxed_mini_details clearfix">
                                            <span class="area first"><strong>Garaj</strong><i class="icon-garage"></i> Yok</span>
                                            <span class="status"><strong>Banyo</strong><i class="icon-bath"></i> 1</span>
                                            <span class="bedrooms last"><strong>Oda</strong><i class="icon-bed"></i> <?php echo $oda_ad; ?></span>
                                        </div>
                                    </div><!-- end boxes -->
                                </div>
						<?php } ?>
								
                
                            </div><!-- end row -->
						</div>                        
                    </div><!-- end content -->
                    
                    <div id="right_sidebar" class="col-lg-4 col-md-4 col-sm-4 col-xs-12 last clearfix">
  
                    	<div class="widget clearfix">
                        	<div class="agents_widget">
                            	<div class="title"><h3><i class="fa fa-users"></i> EMLAKÇILAR</h3></div>
								<?php 
							$sorgu=$veritabani->prepare("select*from emlakcilar ORDER BY RAND() LIMIT 6");
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
                     	
					</div><!-- end sidebar -->
                    
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end generalwrapper -->

        <section class="copyright">
        	<div class="container">
            	<div class="row">
                	<div class="col-lg-6 col-sm-6 col-md-6">
                        <p><small>Genç Yazılımcılar. Copyright 2016</small></p>
                    </div>
                	<div class="col-lg-6 col-sm-6 col-md-6">
                        <div class="social clearfix pull-right">
                            <span><a data-placement="top" data-toggle="tooltip" data-original-title="Twitter" title="" href="#"><i class="fa fa-twitter"></i></a></span>
                            <span><a data-placement="top" data-toggle="tooltip" data-original-title="Facebook" title="" href="#"><i class="fa fa-facebook"></i></a></span>
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
	<script src="js/bootstrap-fileupload.js"></script>
	<script src="js/application.js"></script>

  </body>
</html>