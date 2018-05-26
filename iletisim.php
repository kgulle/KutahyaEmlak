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
														<div class="box_type"><?php echo $fiyat; ?> TL </div>
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

		<section class="clearfix dm-shadow">
        	<div class="map">
				<div id="map"></div>
			</div><!-- end map -->
        </section><!-- clearfix -->
        
        <section class="generalwrapper dm-shadow clearfix">
        	<div class="container">
				<div class="row">
                	<div id="left_sidebar" class="col-lg-2 col-md-2 col-sm-2 col-xs-12 first clearfix">
              			
                        
              			<div class="widget clearfix">
                        	<div class="title"><h3>Site Linkleri</h3><hr></div>
                            <ul class="list">
                            
                            	<li><a title="" href="iletisim.php">İletişim</a></li>
                            	<li><a title="" href="hakkimizda.php">Hakkında</a></li>
                            	<li><a title="" href="kullanim_sartlari.php">Kullanım Şartları</a></li>
                            	<li><a title="" href="telif_haklari.php">Telif Hakları</a></li>
                            	
                            </ul>
                        </div>
                    </div><!-- #left_sidebar -->
                    
                	<div id="content" class="col-lg-6 col-md-6 col-sm-6 col-xs-12 clearfix">
					<div class="title"><h3><b>Site Yöneticisine Mesaj Gönder.</b></h3><hr></div>
                    	<div class="modal-body clearfix">
                        							
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<div class="ImageWrapper boxes_img">
                            		<img src="demos/01_about.jpg" class="img-responsive" alt="">
									<div class="ImageOverlayH"></div>
										
								</div>
                                <div class="servicetitle"><h3>İletişim Bilgileri</h3></div>
                                <ul>
                                    <li><i class="fa fa-external-link"></i> www.kutahyaemlakcim.com</li>
                                    <li><i class="fa fa-envelope"></i> bilgi@kutahyaemlakcim.com</li>
                            		<li><i class="fa fa-phone-square"></i> +90 531 8949197</li>
                            		
                                </ul>
                            </div>
                            
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<form action="mesaj_gonder.php?islem=iletisim" id="agent_form" method="post">
                                        <input name="gonderen_ad" type="text" class="form-control" placeholder="Adınız">     
                                        <input name="gonderen_mail" type="text" class="form-control" placeholder="Email">     
                                        <input name="gonderen_tel" type="text" class="form-control" placeholder="Tel">     
                                        <input name="konu" type="text" class="form-control" placeholder="Konu">     
                                        <textarea name="mesaj" class="form-control" rows="5" placeholder="Mesajınız..."></textarea>
                                        <button class="btn btn-primary">Gönder</button>   
									</form><!-- end search form -->
                            </div>
                        </div>
                    </div><!-- end content -->
                    
                    <div id="right_sidebar" class="col-lg-4 col-md-4 col-sm-4 col-xs-12 last clearfix">
                    	<div class="widget clearfix">
                        	
                        </div><!-- end widget -->

                    	<div class="widget clearfix">
                        	<div class="agents_widget">
                            	<div class="title"><h3><i class="fa fa-users"></i> EMLAKÇILAR</h3></div>
								<?php 
							$sorgu=$veritabani->prepare("select*from emlakcilar ORDER BY RAND() LIMIT 3");
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
                     	-
					</div><!-- end sidebar -->
                    
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end generalwrapper -->

  
        
        
        
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
	<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
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

 <script type="text/javascript">
 
    var locations = [
	['<div class="infobox agents_widget"><div class="agent clearfix"><div class="image"><img class="img-thumbnail img-responsive" src="demos/01_home.jpg" alt=""></div><div class="agent_desc"><h3 class="title"><a href="ilan-ayrinti.html">OUR USA OFFICE</a></h3><span>NEW YORK CITY 2045 / 65</span><br>+90 555 666 77 88</p></div></div></div>', -33.950198, 151.259302, 1]
    ];

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 15,
	    scrollwheel: false,
    	navigationControl: true,
		mapTypeControl: false,
		scaleControl: false,
		draggable: true,
		styles: [ { "stylers": [ { "hue": "#19B8DF" }, { "gamma": 1 } ] } ],
		center: new google.maps.LatLng(39.419956 , 29.985731 ),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
  
		marker = new google.maps.Marker({ 
		position: new google.maps.LatLng(locations[i][1], locations[i][2]), 
		map: map ,
		icon: 'images/marker.png'
		});


      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
  </script>
  
</body>
</html>