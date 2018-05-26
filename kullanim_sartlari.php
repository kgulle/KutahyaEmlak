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
                	
                    
                	<div id="content" class="col-lg-8 col-md-6 col-sm-6 col-xs-12 clearfix">
                    	<div class="property_wrapper boxes clearfix">
							
                         
                            
							<div class="title clearfix">
                            	
                            	<h3>SİTE KULLANIM ŞARTLARI
                                
                                </h3>
							</div><!-- end title -->

                            <div class="property_desc clearfix">

                                
                                
                     <p><b>

Lütfen sitemizi kullanmadan evvel bu ‘site kullanım şartları’nı dikkatlice okuyunuz. </p></b>

<p><b>Bu online emlak arama sitesini kullanan ve online emlak arama yapan müşterilerimiz aşağıdaki şartları kabul etmiş varsayılmaktadır:</p></b>

<p><b>Sitemizdeki web sayfaları ve ona bağlı tüm sayfalar (‘site’) ……………………… adresindeki ……………………………….firmasının (Firma) malıdır ve onun tarafından işletilir. Sizler (‘Kullanıcı’) sitede sunulan tüm hizmetleri kullanırken aşağıdaki şartlara tabi olduğunuzu, sitedeki hizmetten yararlanmakla ve kullanmaya devam etmekle; Bağlı olduğunuz yasalara göre sözleşme imzalama hakkına, yetkisine ve hukuki ehliyetine sahip ve 18 yaşın üzerinde olduğunuzu, bu sözleşmeyi okuduğunuzu, anladığınızı ve sözleşmede yazan şartlarla bağlı olduğunuzu kabul etmiş sayılırsınız. </p></b>




<p><b>İşbu sözleşme taraflara sözleşme konusu site ile ilgili hak ve yükümlülükler yükler ve taraflar işbu sözleşmeyi kabul ettiklerinde bahsi geçen hak ve yükümlülükleri eksiksiz, doğru, zamanında, işbu sözleşmede talep edilen şartlar dâhilinde yerine getireceklerini beyan ederler.</p></b>




<p><b>1. SORUMLULUKLAR</p></b>

<p><b>a.Firma, fiyatlar ve sunulan ürün ve hizmetler üzerinde değişiklik yapma hakkını her zaman saklı tutar. </p></b>

<p><b>b.Firma, üyenin sözleşme konusu hizmetlerden, teknik arızalar dışında yararlandırılacağını kabul ve taahhüt eder.</p></b>

<p><b>c.Kullanıcı, sitenin kullanımında tersine mühendislik yapmayacağını ya da bunların kaynak kodunu bulmak veya elde etmek amacına yönelik herhangi bir başka işlemde bulunmayacağını aksi halde ve 3. Kişiler nezdinde doğacak zararlardan sorumlu olacağını, hakkında hukuki ve cezai işlem yapılacağını peşinen kabul eder. </p></b>

<p><b>d.Kullanıcı, site içindeki faaliyetlerinde, sitenin herhangi bir bölümünde veya iletişimlerinde genel ahlaka ve adaba aykırı, kanuna aykırı, 3. Kişilerin haklarını zedeleyen, yanıltıcı, saldırgan, müstehcen, pornografik, kişilik haklarını zedeleyen, telif haklarına aykırı, yasa dışı faaliyetleri teşvik eden içerikler üretmeyeceğini, paylaşmayacağını kabul eder. Aksi halde oluşacak zarardan tamamen kendisi sorumludur ve bu durumda ‘Site’ yetkilileri, bu tür hesapları askıya alabilir, sona erdirebilir, yasal süreç başlatma hakkını saklı tutar. Bu sebeple yargı mercilerinden etkinlik veya kullanıcı hesapları ile ilgili bilgi talepleri gelirse paylaşma hakkını saklı tutar.</p></b>

<p><b>e.Sitenin üyelerinin birbirleri veya üçüncü şahıslarla olan ilişkileri kendi sorumluluğundadır. </p></b>




<p><b>2.  Fikri Mülkiyet Hakları
</p></b>



<p><b>2.1. İşbu Site’de yer alan ünvan, işletme adı, marka, patent, logo, tasarım, bilgi ve yöntem gibi tescilli veya tescilsiz tüm fikri mülkiyet hakları site işleteni ve sahibi firmaya veya belirtilen ilgilisine ait olup, ulusal ve uluslararası hukukun koruması altındadır. İşbu Site’nin ziyaret edilmesi veya bu Site’deki hizmetlerden yararlanılması söz konusu fikri mülkiyet hakları konusunda hiçbir hak vermez.</p></b>

<p><b>2.2. Site’de yer alan bilgiler hiçbir şekilde çoğaltılamaz, yayınlanamaz, kopyalanamaz, sunulamaz ve/veya aktarılamaz. Site’nin bütünü veya bir kısmı diğer bir internet sitesinde izinsiz olarak kullanılamaz. </p></b>




<p><b>3. Gizli Bilgi</p></b>

<p><b>3.1. Firma, site üzerinden kullanıcıların ilettiği kişisel bilgileri 3. Kişilere açıklamayacaktır. Bu kişisel bilgiler; kişi adı-soyadı, adresi, telefon numarası, cep telefonu, e-posta adresi gibi Kullanıcı’yı tanımlamaya yönelik her türlü diğer bilgiyi içermekte olup, kısaca ‘Gizli Bilgiler’ olarak anılacaktır.</p></b>




<p><b>3.2. Kullanıcı, sadece tanıtım, reklam, kampanya, promosyon, duyuru vb. pazarlama faaliyetleri kapsamında kullanılması ile sınırlı olmak üzere, Site’nin sahibi olan firmanın kendisine ait iletişim, portföy durumu ve demografik bilgilerini iştirakleri ya da bağlı bulunduğu grup şirketleri ile paylaşmasına muvafakat ettiğini kabul ve beyan eder. Bu kişisel bilgiler firma bünyesinde müşteri profili belirlemek, müşteri profiline uygun promosyon ve kampanyalar sunmak ve istatistiksel çalışmalar yapmak amacıyla kullanılabilecektir.</p></b>




<p><b>3.3. Gizli Bilgiler, ancak resmi makamlarca usulü dairesinde bu bilgilerin talep edilmesi halinde ve yürürlükteki emredici mevzuat hükümleri gereğince resmi makamlara açıklama yapılmasının zorunlu olduğu durumlarda resmi makamlara açıklanabilecektir.</p></b>




<p><b>4. Garanti Vermeme: İŞBU SÖZLEŞME MADDESİ UYGULANABİLİR KANUNUN İZİN VERDİĞİ AZAMİ ÖLÇÜDE GEÇERLİ OLACAKTIR. FİRMA TARAFINDAN SUNULAN HİZMETLER "OLDUĞU GİBİ” VE "MÜMKÜN OLDUĞU” TEMELDE SUNULMAKTA VE PAZARLANABİLİRLİK, BELİRLİ BİR AMACA UYGUNLUK VEYA İHLAL ETMEME KONUSUNDA TÜM ZIMNİ GARANTİLER DE DÂHİL OLMAK ÜZERE HİZMETLER VEYA UYGULAMA İLE İLGİLİ OLARAK (BUNLARDA YER ALAN TÜM BİLGİLER DÂHİL) SARİH VEYA ZIMNİ, KANUNİ VEYA BAŞKA BİR NİTELİKTE HİÇBİR GARANTİDE BULUNMAMAKTADIR. </p></b>




<p><b>5. Kayıt ve Güvenlik </p></b>

<p><b>Kullanıcı, doğru, eksiksiz ve güncel kayıt bilgilerini vermek zorundadır. Aksi halde bu Sözleşme ihlal edilmiş sayılacak ve Kullanıcı bilgilendirilmeksizin hesap kapatılabilecektir.</p></b>

<p><b>Kullanıcı, site ve üçüncü taraf sitelerdeki şifre ve hesap güvenliğinden kendisi sorumludur. Aksi halde oluşacak veri kayıplarından ve güvenlik ihlallerinden veya donanım ve cihazların zarar görmesinden Firma sorumlu tutulamaz.</p></b>




<p><b>6. Mücbir Sebep</p></b>




<p><b>Tarafların kontrolünde olmayan; tabii afetler, yangın, patlamalar, iç savaşlar, savaşlar, ayaklanmalar, halk hareketleri, seferberlik ilanı, grev, lokavt ve salgın hastalıklar, altyapı ve internet arızaları, elektrik kesintisi gibi sebeplerden (aşağıda birlikte "Mücbir Sebep” olarak anılacaktır.) dolayı sözleşmeden doğan yükümlülükler taraflarca ifa edilemez hale gelirse, taraflar bundan sorumlu değildir. Bu sürede Taraflar’ın işbu Sözleşme’den doğan hak ve yükümlülükleri askıya alınır. </p></b>




<p><b>7. Sözleşmenin Bütünlüğü ve Uygulanabilirlik</p></b>




<p><b>İşbu sözleşme şartlarından biri, kısmen veya tamamen geçersiz hale gelirse, sözleşmenin geri kalanı geçerliliğini korumaya devam eder.</p></b>




<p><b>8. Sözleşmede Yapılacak Değişiklikler</p></b>




<p><b>Firma, dilediği zaman sitede sunulan hizmetleri ve işbu sözleşme şartlarını kısmen veya tamamen değiştirebilir. Değişiklikler sitede yayınlandığı tarihten itibaren geçerli olacaktır. Değişiklikleri takip etmek Kullanıcı’nın sorumluluğundadır. Kullanıcı, sunulan hizmetlerden yararlanmaya devam etmekle bu değişiklikleri de kabul etmiş sayılır.</p></b>




<p><b>9. Tebligat</p></b>

<p><b>İşbu Sözleşme ile ilgili taraflara gönderilecek olan tüm bildirimler, Firma’nın bilinen e.posta adresi ve kullanıcının üyelik formunda belirttiği e.posta adresi vasıtasıyla yapılacaktır. Kullanıcı, üye olurken belirttiği adresin geçerli tebligat adresi olduğunu, değişmesi durumunda 5 gün içinde yazılı olarak diğer tarafa bildireceğini, aksi halde bu adrese yapılacak tebligatların geçerli sayılacağını kabul eder.</p></b>




<p><b>10. Delil Sözleşmesi</p></b>

<p><b>Taraflar arasında işbu sözleşme ile ilgili işlemler için çıkabilecek her türlü uyuşmazlıklarda Taraflar’ın defter, kayıt ve belgeleri ile ve bilgisayar kayıtları ve faks kayıtları 6100 sayılı Hukuk Muhakemeleri Kanunu uyarınca delil olarak kabul edilecek olup, kullanıcı bu kayıtlara itiraz etmeyeceğini kabul eder.</p></b>




<p><b>11. Uyuşmazlıkların Çözümü</p></b>

<p><b>İşbu Sözleşme’nin uygulanmasından veya yorumlanmasından doğacak her türlü uyuşmazlığın çözümünde İstanbul (Merkez) Adliyesi Mahkemeleri ve İcra Daireleri yetkilidir.   </b></p>
                            </div>
                        </div><!-- end property_wrapper -->
                    </div><!-- end content -->
                    
          
                    
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
            $('#slider').flexslider({
                animation: "fade",
                controlNav: false,
                animationLoop: false,
                slideshow: true,
                sync: "#carousel"
            });
        });
    </script>
  
</body>
</html>