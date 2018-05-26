-- MySQL dump 10.13  Distrib 5.6.26, for Linux (x86_64)
--
-- Host: localhost    Database: kutahyae_emlakdb
-- ------------------------------------------------------
-- Server version	5.6.26-cll-lve

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `emlak_tip`
--

DROP TABLE IF EXISTS `emlak_tip`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emlak_tip` (
  `emlak_tip_id` int(11) NOT NULL AUTO_INCREMENT,
  `emlak_tip_ad` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`emlak_tip_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emlak_tip`
--

LOCK TABLES `emlak_tip` WRITE;
/*!40000 ALTER TABLE `emlak_tip` DISABLE KEYS */;
INSERT INTO `emlak_tip` (`emlak_tip_id`, `emlak_tip_ad`) VALUES (4,'Müstakil Ev'),(3,'Villa'),(5,'Yazlık'),(6,'Apart'),(15,'Yalı'),(14,'Konut'),(12,'İşyeri'),(13,'Daire');
/*!40000 ALTER TABLE `emlak_tip` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emlakcilar`
--

DROP TABLE IF EXISTS `emlakcilar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emlakcilar` (
  `emlakci_id` int(11) NOT NULL AUTO_INCREMENT,
  `ad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `adres` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `telefon` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `hakkinda` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `kayit_tarihi` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `logo_url` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `eposta` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `seviye` int(1) NOT NULL,
  PRIMARY KEY (`emlakci_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emlakcilar`
--

LOCK TABLES `emlakcilar` WRITE;
/*!40000 ALTER TABLE `emlakcilar` DISABLE KEYS */;
INSERT INTO `emlakcilar` (`emlakci_id`, `ad`, `adres`, `telefon`, `hakkinda`, `kayit_tarihi`, `logo_url`, `eposta`, `sifre`, `seviye`) VALUES (1,'DAYAN EMLAK','MEYDAN MAHALLESİ ','05318949197','İLANLARIMA GÖZ ATINIZ...','2016-05-14 17:52:29','resimler/logolar/logo_me.jpg','hsn.dyn721@gmail.com','d41d8cd98f00b204e9800998ecf8427e',1),(2,'AYKUT EMLAK','HİLTON ARKASI ','05315662727','İLAMLARIM İÇİN LÜTFEN DETAYLI İLETİŞİME GEÇİNİZ.','2016-05-14 18:30:39','resimler/logolar/logo_untitled.jpg','aykutaltay1122@gmail.com','81dc9bdb52d04dc20036dbd8313ed055',0),(3,'KENAN EMLAK','Fuatpaşa Mahallesi ','5423322504','Bilgisayar mühendil','2016-05-14 18:40:19','resimler/logolar/logo_kg_5.jpg','kenangulle@hotmail.com','81dc9bdb52d04dc20036dbd8313ed055',1),(7,'TUĞÇE EMLAK','TOKİ ','05555555555','İLANLARIMA BAKINIZ...','2016-05-14 20:50:46','resimler/logolar/logo_Ekran_AlYntYsY5.jpg','tugceeturannn@gmail.com','827ccb0eea8a706c4c34a16891f84e7b',0),(9,'RIDVAN EMLAK','Hava er  tugay  ','5423329876','Emlak işi bizden sorular','2016-05-14 22:39:03','resimler/logolar/logo_image.jpg','ridvan@gmail.com','81dc9bdb52d04dc20036dbd8313ed055',0),(10,'FERHAT EMLAK','Zafertepe','5422222222','Bilgisayar Mühendisi','2016-05-13 00:34:36','resimler/logolar/logo_pp_1.jpg','fyeilyurt@gmail.com','81dc9bdb52d04dc20036dbd8313ed055',1);
/*!40000 ALTER TABLE `emlakcilar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ilan_resim`
--

DROP TABLE IF EXISTS `ilan_resim`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ilan_resim` (
  `resim_id` int(11) NOT NULL AUTO_INCREMENT,
  `ilan_id` int(11) NOT NULL,
  `resim_url` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`resim_id`)
) ENGINE=MyISAM AUTO_INCREMENT=119 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ilan_resim`
--

LOCK TABLES `ilan_resim` WRITE;
/*!40000 ALTER TABLE `ilan_resim` DISABLE KEYS */;
INSERT INTO `ilan_resim` (`resim_id`, `ilan_id`, `resim_url`) VALUES (1,1,'resimler/ilanlar/ilan_1_phpcPYddN.jpg'),(2,1,'resimler/ilanlar/ilan_1_phpPDw5j4.jpg'),(3,1,'resimler/ilanlar/ilan_1_php7QASVn.jpg'),(4,1,'resimler/ilanlar/ilan_1_phpzqQvJK.jpg'),(5,1,'resimler/ilanlar/ilan_1_phpeoeLda.jpg'),(6,1,'resimler/ilanlar/ilan_1_phpKUIDFC.jpg'),(9,2,'resimler/ilanlar/ilan_2_phpS1JA25.jpg'),(8,2,'resimler/ilanlar/ilan_2_phpWrDroQ.jpg'),(10,3,'resimler/ilanlar/ilan_3_php5ajtjQ.jpg'),(11,3,'resimler/ilanlar/ilan_3_phpENkQT1.jpg'),(12,3,'resimler/ilanlar/ilan_3_phpgVqEFh.jpg'),(13,3,'resimler/ilanlar/ilan_3_phpOWIhEz.jpg'),(14,3,'resimler/ilanlar/ilan_3_phpn3MaAU.jpg'),(15,3,'resimler/ilanlar/ilan_3_php7j3zQh.jpg'),(16,2,'resimler/ilanlar/ilan_2_phpImRStg.jpg'),(17,4,'resimler/ilanlar/ilan_4_phpcOohG4.jpg'),(18,4,'resimler/ilanlar/ilan_4_php9Bxxdb.jpg'),(19,4,'resimler/ilanlar/ilan_4_php5ZR8Lk.jpg'),(20,4,'resimler/ilanlar/ilan_4_phpwVAldw.jpg'),(21,4,'resimler/ilanlar/ilan_4_php75Fa5L.jpg'),(22,4,'resimler/ilanlar/ilan_4_phpyR9E73.jpg'),(23,4,'resimler/ilanlar/ilan_4_phpxX4Cdo.jpg'),(24,4,'resimler/ilanlar/ilan_4_phpvKD4hL.jpg'),(25,4,'resimler/ilanlar/ilan_4_phpzx1Rlb.jpg'),(26,5,'resimler/ilanlar/ilan_5_phphZp7wM.jpg'),(27,5,'resimler/ilanlar/ilan_5_phpkzYyRs.jpg'),(28,5,'resimler/ilanlar/ilan_5_phpaU6qlb.jpg'),(29,5,'resimler/ilanlar/ilan_5_phpYvFxzV.jpg'),(30,5,'resimler/ilanlar/ilan_5_phpqdaaRH.jpg'),(31,5,'resimler/ilanlar/ilan_5_php7E9Tew.jpg'),(32,6,'resimler/ilanlar/ilan_6_phpibZZY7.jpg'),(33,6,'resimler/ilanlar/ilan_6_phpTWA7qN.jpg'),(34,6,'resimler/ilanlar/ilan_6_phpi8QrXv.jpg'),(35,6,'resimler/ilanlar/ilan_6_php1fLceg.jpg'),(36,6,'resimler/ilanlar/ilan_6_phps4IKI3.jpg'),(37,6,'resimler/ilanlar/ilan_6_phpcudn6T.jpg'),(38,6,'resimler/ilanlar/ilan_6_phpAkSjfN.jpg'),(39,6,'resimler/ilanlar/ilan_6_phpB6Ie2H.jpg'),(40,7,'resimler/ilanlar/ilan_7_phpKgJV7k.jpg'),(41,7,'resimler/ilanlar/ilan_7_phpLsH6OT.jpg'),(42,7,'resimler/ilanlar/ilan_7_php6hRc28.jpg'),(43,7,'resimler/ilanlar/ilan_7_phphWifQT.jpg'),(44,7,'resimler/ilanlar/ilan_7_phpwgrzmh.jpg'),(45,7,'resimler/ilanlar/ilan_7_phprdu3dp.jpg'),(46,7,'resimler/ilanlar/ilan_7_phpm0ByaT.jpg'),(47,7,'resimler/ilanlar/ilan_7_phpb944pR.jpg'),(48,8,'resimler/ilanlar/ilan_8_php1P61Ka.jpg'),(49,9,'resimler/ilanlar/ilan_9_phpSyuGrp.jpg'),(50,9,'resimler/ilanlar/ilan_9_phpNiT2UM.jpg'),(51,9,'resimler/ilanlar/ilan_9_phpqaQnFd.jpg'),(52,9,'resimler/ilanlar/ilan_9_phpwTcBeI.jpg'),(53,9,'resimler/ilanlar/ilan_9_phpIAgKUf.jpg'),(54,9,'resimler/ilanlar/ilan_9_phpZxuwXQ.jpg'),(55,9,'resimler/ilanlar/ilan_9_phpL1Drmx.jpg'),(56,10,'resimler/ilanlar/ilan_10_phpAYftbL.jpg'),(57,11,'resimler/ilanlar/ilan_11_phpKoKhaN.jpg'),(58,11,'resimler/ilanlar/ilan_11_php1V7CuU.jpg'),(59,11,'resimler/ilanlar/ilan_11_phpPSk5r8.jpg'),(60,12,'resimler/ilanlar/ilan_12_phpqWLYWs.jpg'),(61,12,'resimler/ilanlar/ilan_12_phpyabGlQ.jpg'),(62,13,'resimler/ilanlar/ilan_13_phpYTfkRU.jpg'),(63,13,'resimler/ilanlar/ilan_13_phpXMAA6C.jpg'),(64,14,'resimler/ilanlar/ilan_14_phpl5c056.jpg'),(65,14,'resimler/ilanlar/ilan_14_phpkxWqZT.jpg'),(66,14,'resimler/ilanlar/ilan_14_phpdrM6BI.jpg'),(67,15,'resimler/ilanlar/ilan_15_phpXS02Bu.jpg'),(68,15,'resimler/ilanlar/ilan_15_phpbQRkmj.jpg'),(69,15,'resimler/ilanlar/ilan_15_phpWZwiUd.jpg'),(70,16,'resimler/ilanlar/ilan_16_phpT7i6OC.jpg'),(71,16,'resimler/ilanlar/ilan_16_phpfRXplc.jpg'),(72,16,'resimler/ilanlar/ilan_16_phpEzh67O.jpg'),(73,17,'resimler/ilanlar/ilan_17_php6WIFUp.jpg'),(74,17,'resimler/ilanlar/ilan_17_php1Z27Mr.jpg'),(75,18,'resimler/ilanlar/ilan_18_php2QtybT.jpg'),(76,18,'resimler/ilanlar/ilan_18_phpnR9GJJ.jpg'),(77,18,'resimler/ilanlar/ilan_18_phpnFSr0E.jpg'),(78,19,'resimler/ilanlar/ilan_19_phpAnJqwN.jpg'),(79,19,'resimler/ilanlar/ilan_19_php6GLbHy.jpg'),(80,19,'resimler/ilanlar/ilan_19_php2V5Upo.jpg'),(81,19,'resimler/ilanlar/ilan_19_phpORZxke.jpg'),(82,20,'resimler/ilanlar/ilan_20_phpzofh2f.jpg'),(83,20,'resimler/ilanlar/ilan_20_php8e7tmr.jpg'),(84,20,'resimler/ilanlar/ilan_20_phphKjqQN.jpg'),(85,20,'resimler/ilanlar/ilan_20_phpfdhcRa.jpg'),(86,20,'resimler/ilanlar/ilan_20_phpzfUCKC.jpg'),(87,21,'resimler/ilanlar/ilan_21_phpB7iFVn.jpg'),(88,21,'resimler/ilanlar/ilan_21_phpHg2nPo.jpg'),(89,21,'resimler/ilanlar/ilan_21_phpQilOJu.jpg'),(90,21,'resimler/ilanlar/ilan_21_phpcz0TIF.jpg'),(91,21,'resimler/ilanlar/ilan_21_phplhHpLV.jpg'),(92,21,'resimler/ilanlar/ilan_21_phpEf1U1c.jpg'),(93,21,'resimler/ilanlar/ilan_21_php56yGPy.jpg'),(94,21,'resimler/ilanlar/ilan_21_phptUiJsZ.jpg'),(95,21,'resimler/ilanlar/ilan_21_php6mLSSu.jpg'),(96,21,'resimler/ilanlar/ilan_21_phpaRwb84.jpg'),(97,22,'resimler/ilanlar/ilan_22_phpqTm9CZ.jpg'),(98,22,'resimler/ilanlar/ilan_22_php74MHEn.jpg'),(99,22,'resimler/ilanlar/ilan_22_phpLsgpjM.jpg'),(100,22,'resimler/ilanlar/ilan_22_phpuFokOb.jpg'),(101,22,'resimler/ilanlar/ilan_22_phpeMAytC.jpg'),(102,22,'resimler/ilanlar/ilan_22_phpkwqM82.jpg'),(103,22,'resimler/ilanlar/ilan_22_php9E93Nt.jpg'),(104,23,'resimler/ilanlar/ilan_23_phpIWI1T2.jpg'),(105,23,'resimler/ilanlar/ilan_23_phpzFrdcu.jpg'),(106,23,'resimler/ilanlar/ilan_23_phpLPDBbW.jpg'),(107,23,'resimler/ilanlar/ilan_23_phpQ0UhWo.jpg'),(108,23,'resimler/ilanlar/ilan_23_phpGgVoYS.jpg'),(109,23,'resimler/ilanlar/ilan_23_phpbAmz0m.jpg'),(110,23,'resimler/ilanlar/ilan_23_phpN6bJ2Q.jpg'),(111,23,'resimler/ilanlar/ilan_23_phpLHES4k.jpg'),(112,23,'resimler/ilanlar/ilan_23_php1kb56O.jpg'),(113,23,'resimler/ilanlar/ilan_23_php2usfdj.jpg'),(114,23,'resimler/ilanlar/ilan_23_phpzsBsjN.jpg'),(115,23,'resimler/ilanlar/ilan_23_phpsEcQYi.jpg'),(116,23,'resimler/ilanlar/ilan_23_phpjOepFO.jpg'),(117,23,'resimler/ilanlar/ilan_23_phpXMTbnk.jpg'),(118,23,'resimler/ilanlar/ilan_23_phpuQz24P.jpg');
/*!40000 ALTER TABLE `ilan_resim` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ilanfoto`
--

DROP TABLE IF EXISTS `ilanfoto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ilanfoto` (
  `foto_id` int(11) NOT NULL AUTO_INCREMENT,
  `foto_url` int(255) NOT NULL,
  `ilan_id` int(11) NOT NULL,
  PRIMARY KEY (`foto_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ilanfoto`
--

LOCK TABLES `ilanfoto` WRITE;
/*!40000 ALTER TABLE `ilanfoto` DISABLE KEYS */;
/*!40000 ALTER TABLE `ilanfoto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ilanlar`
--

DROP TABLE IF EXISTS `ilanlar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ilanlar` (
  `ilan_id` int(11) NOT NULL AUTO_INCREMENT,
  `emlak_tip_id` int(11) NOT NULL,
  `emlakci_id` int(11) NOT NULL,
  `ilce_id` int(11) NOT NULL,
  `mahalle_id` int(11) NOT NULL,
  `isitma_tip_id` int(11) NOT NULL,
  `oda_tip_id` int(11) NOT NULL,
  `aktif` int(1) NOT NULL,
  `manset` int(4) NOT NULL,
  `populer` int(4) NOT NULL,
  `bulundugu_kat` tinyint(4) NOT NULL,
  `esyali` tinyint(1) NOT NULL,
  `fiyat` bigint(20) NOT NULL,
  `ilan_baslik` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `ilan_aciklama` text COLLATE utf8_turkish_ci NOT NULL,
  `ilan_tarih` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kat_sayisi` tinyint(4) NOT NULL,
  `kiralik_satilik` int(1) NOT NULL,
  `metre_kare` decimal(10,0) NOT NULL,
  `bina_yas` tinyint(4) NOT NULL,
  PRIMARY KEY (`ilan_id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ilanlar`
--

LOCK TABLES `ilanlar` WRITE;
/*!40000 ALTER TABLE `ilanlar` DISABLE KEYS */;
INSERT INTO `ilanlar` (`ilan_id`, `emlak_tip_id`, `emlakci_id`, `ilce_id`, `mahalle_id`, `isitma_tip_id`, `oda_tip_id`, `aktif`, `manset`, `populer`, `bulundugu_kat`, `esyali`, `fiyat`, `ilan_baslik`, `ilan_aciklama`, `ilan_tarih`, `kat_sayisi`, `kiralik_satilik`, `metre_kare`, `bina_yas`) VALUES (1,3,2,7,41,3,6,1,1,1,0,1,1200000,'Havuzlu Villa','M2  110   \r\nOda Sayısı  3 oda 1 salon  \r\nWC Sayısı  2 \r\nIsınma Tipi kalorifer tesisatlı   \r\nBina Yaşı  0 \r\nBina Kat  4 \r\nDaire Kat  3   \r\nFiyat  120000 YTL \r\nEmlak türü  Satılık Konut \r\nAçıklama:\r\n Kütahya merkezde 3 oda 1 salon hazır mutfaklı hilton banyolu yerler laminat parkeli çiftcam pen doğramalı çift balkonlu ön cephe asansörlü kat kalorifer tesisatlı önü açık çarşı pazar içinde konut kredisine uygun hesaplı daire  ','2016-05-14 18:56:19',2,1,700,6),(2,6,1,7,41,1,1,1,1,1,1,1,300,'ERKEK ÖĞRENCİYE KİRALIK HERŞEY DAHİL APART','SEVGİYOLUNDA 2-3 KİŞİLİK APART DAİRE \r\nSU ELEKTRİK DOĞALGAZ SICAK SU İNTERNET SABAH KAHVALTISI AKŞAM YEMEĞİ \r\nHER ODADA TUVALET BANYO MUTFAK LCD TV\r\nKÜTAHYA /MERKEZ\r\n','2016-05-14 19:01:06',5,0,25,1),(3,12,2,7,3,2,3,1,1,1,0,0,70000,'Satılık İş Yeri','Satılık Dükkan \r\nRef No  1299   \r\nSemt  75.yıl Mahallesi\r\nAdres  Kütahya  merkezde hastane gidiş caddesinde köşebaşı dükkan \r\nM2  72   \r\nOda Sayısı  1 \r\nWC Sayısı  1 \r\nIsınma Tipi  sobalı   \r\nBina Yaşı  2 \r\nBina Kat  5 \r\nFiyat  280000 YTL \r\nEmlak türü  Satılık Dükkan \r\nAçıklama:\r\nKütahya merkezde hastane gidiş caddesinde 72 m2 mutfak ve wc`li köşe başı yüksek kira getirisi olabilecek konumda yatırım ve işletme için emsalsiz konumda köşe başı geniş cepheli banka kredisine uygun dükkan ','2016-05-14 19:06:51',7,1,72,15),(4,13,2,7,16,3,2,1,1,1,3,0,120000,'Satılık Daire','Satılık Konut \r\nRef No  1216   \r\nSemt   Cumhuriyet Mahellesi\r\nAdres  Kütahya merkezde cadde üzeri yeni bina arakat kelepir daire \r\nM2  110   \r\nOda Sayısı  3 oda 1 salon  \r\nWC Sayısı  2 \r\nIsınma Tipi kalorifer tesisatlı   \r\nBina Yaşı  0 \r\nBina Kat  4 \r\nDaire Kat  3   \r\nFiyat  120000 YTL \r\nEmlak türü  Satılık Konut \r\nAçıklama:\r\nkütahya  merkezde 3 oda 1 salon hazır mutfaklı hilton banyolu yerler laminat parkeli çiftcam pen doğramalı çift balkonlu ön cephe asansörlü kat kalorifer tesisatlı önü açık çarşı pazar içinde konut kredisine uygun hesaplı daire  ','2016-05-14 19:17:47',10,1,110,10),(5,5,2,7,16,2,4,1,1,1,1,1,90000,'Yazlık Villa','Satılık Konut Ref No 360 Semt ÜRKMEZ Adres ürkmez mustakil satılık daire denıze 150m mesafede çarşı M2 100 Oda Sayısı 2 WC Sayısı 1 Isınma Tipi kilma Bina Yaşı 4 Bina Kat 1 Daire Kat 1 Fiyat 90000 YTL Emlak türü Satılık Konut Açıklama: ürkmez mustakil satılık daire denıze 150m mesafede çarşı pazara yuruyuş mesafesınde mazrafsız bahçe ıçınde meyve ağaçlarıyla fıyatında ufak bır pazaralık payı vardır Adınız Yetkili Ofisimiz: veriemlak ürkmez Adres:cumh cad no 86/b ','2016-05-14 19:25:13',1,1,150,5),(6,3,2,7,9,4,6,1,1,1,1,1,165000,'Bahçeli Villa','Bahçeli Evler M2 185 Oda Sayısı 5+1 WC Sayısı 3 Isınma Tipi Kat Kaloriferi Bina Yaşı 10 Bina Kat 3 Daire Kat 0 Fiyat 165000 YTL Emlak türü Satılık Yazlık Açıklama: Ürkmezde satılık trıplex 5+1 3 banyo wc bahce ıçerısınde her turlu meyve ağaçarıyla bırde artısyen yaz kış oturula bılır hıç bır mazrafı yoktur ve bu trıplex kara tarafında denıze 250m mesafede çarşı pazara 50m mesafede mazrafsız fıyatında pazarlık payı vardır','2016-05-14 19:30:43',2,1,185,13),(7,13,2,7,4,1,2,1,1,1,3,0,105000,'Satılık Daire','DAİREDE OTURAN OLDUğUNDAN LÜTFEN RANDEVU ALINIZ...','2016-05-14 20:16:25',7,1,95,14),(14,6,7,7,8,4,3,1,0,1,1,1,500,'apart eşyalı daire','2-3 KİŞİLİK APART DAİRE SU ELEKTRİK DOĞALGAZ SICAK SU İNTERNET TUVALET BANYO MUTFAK GENİŞ BAHÇELİ LÜX APART KÜTAHYA ','2016-05-14 21:59:57',3,0,70,3),(9,13,1,7,21,4,1,1,1,0,4,1,700,'MERKEZ FATİH  TE  3+1 FUL EŞYALI KİRALIK DAİRE','PAŞABAHÇE SİTESİNDE AÇIK OTOPARKLI\r\nMANTOLAMALI, ÇİFT ASANSÖRLÜ, CADDE ÜZERİ\r\nOTOBÜS, MÜNÜBÜS DURAĞI ÖNÜNDE\r\nİLK VE ORTA OKULUN YANINDA\r\nLİSEYE 200 M UZAKLIKTA\r\nMARKET, CAMİ, PAZARA 100 M MESAFEDE\r\nEŞYALI KİRALIK DAİRE','2016-05-14 21:24:36',5,0,150,10),(11,3,7,7,41,1,6,1,0,1,2,0,1100000,'villa','Oda Sayısı 5 oda 1 salon WC Sayısı 4 Isınma Tipi kalorifer tesisatlı Bina Yaşı 6 Fiyat 110000 YTL Emlak türü Satılık Konut Açıklama: yerler laminat parkeli çiftcam pen doğramalı çift balkonlu ön cephe dublex villa','2016-05-14 21:33:54',2,1,800,6),(15,6,7,4,93,4,7,1,0,1,3,1,50000,'apart eşyalı daire SATILIK','2-3 KİŞİLİK APART DAİRE SU ELEKTRİK DOĞALGAZ SICAK SU İNTERNET TUVALET BANYO MUTFAK GENİŞ BAHÇELİ LÜX APART KÜTAHYA ','2016-05-14 22:03:40',3,1,90,6),(16,13,7,5,96,4,4,1,0,1,3,1,120000,'YENİ SATILIK DAİRE','Oda Sayısı 3 oda 1 salon WC Sayısı 2 Isınma Tipi kalorifer tesisatlı Bina Yaşı 0 Bina Kat 4 Daire Kat 3 Fiyat 120000 YTL Emlak türü Satılık Konut Açıklama: Kütahya merkezde 3 oda 1 salon hazır mutfaklı banyolu yerler laminat parkeli çiftcam pen doğramalı çift balkonlu ön cephe asansörlü kat kalorifer tesisatlı önü açık çarşı pazar içinde konut kredisine uygun hesaplı daire ','2016-05-14 22:13:21',4,1,100,5),(17,12,7,13,122,4,1,1,0,1,1,0,900,'CADDE ONÜ KİRALIK DÜKKAN','CADDE ÖNÜ APARTMAN ALTI YERLERİ PARKE DÜKKAN.','2016-05-14 22:18:14',1,0,50,7),(18,6,7,1,78,4,7,1,0,1,2,0,80000,'apart eşyasız daire','havuzlu 4 katlı apart daire sahibinden satılık','2016-05-14 22:24:50',4,1,99,5),(19,6,7,4,90,1,5,1,0,1,1,1,200000,'Lüx Apart Satılık','lüx  villa sahibinden satılık 2 katı bahçeli site seklinde güvenlikli  parka ve garaja sahip','2016-05-14 22:33:06',2,1,199,5),(20,6,7,2,83,4,4,1,0,1,3,1,188000,' satılık daire','merkezde satılık 3 katlı 4 yıllık güvenlikli ve garaja sahip daire ','2016-05-14 22:44:37',2,0,188,4),(21,3,3,7,11,1,9,1,0,1,1,0,149998,'Bölcekte merkeze yakın çevrekent sitesinde fourleks bahçeli villa','bölcekte merkeze yakın çevrekent sitesinde fourleks bahçeli villa\r\nM2  160  \r\nOda Sayısı  4 oda 2 salon\r\nWC Sayısı  2\r\nIsınma Tipi  sobalı  \r\nBina Yaşı  5\r\nBina Kat  4\r\nDaire Kat  fourleks villa  \r\nFiyat  150000 YTL\r\nEmlak türü satılık Konut\r\nAçıklama:\r\nçevrekent sitesinde 4 oda 2 salon hazır mutfaklı yerler laminat parke çiftcam pen doğramalı pencerelerde ferforje demir korumalıkları olan üç tarafı bahçeli sürekli oturmaya müsait villa ','2016-05-15 13:04:39',3,1,160,2);
/*!40000 ALTER TABLE `ilanlar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ilceler`
--

DROP TABLE IF EXISTS `ilceler`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ilceler` (
  `ilce_id` int(11) NOT NULL AUTO_INCREMENT,
  `ilce_ad` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`ilce_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ilceler`
--

LOCK TABLES `ilceler` WRITE;
/*!40000 ALTER TABLE `ilceler` DISABLE KEYS */;
INSERT INTO `ilceler` (`ilce_id`, `ilce_ad`) VALUES (1,'ALTINTAŞ'),(2,'ASLANAPA'),(3,'ÇAVDARHİSAR'),(7,'MERKEZ'),(5,'DOMANİÇ'),(6,'TAVŞANLI'),(8,'HİSARCIK'),(9,' PAZARLAR'),(10,'ŞAPHANE'),(11,'SİMAV'),(12,' EMET'),(13,'GEDİZ'),(4,' Dumlupınar ');
/*!40000 ALTER TABLE `ilceler` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `iletisim`
--

DROP TABLE IF EXISTS `iletisim`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `iletisim` (
  `mesaj_id` int(11) NOT NULL AUTO_INCREMENT,
  `emlakci_id` int(11) NOT NULL,
  `gonderen_ad` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `gonderen_mail` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `gonderen_tel` varchar(15) COLLATE utf8_turkish_ci NOT NULL,
  `konu` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `mesaj` text COLLATE utf8_turkish_ci NOT NULL,
  `tarih` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `okundu` tinyint(4) NOT NULL,
  `silindi` tinyint(4) NOT NULL,
  PRIMARY KEY (`mesaj_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `iletisim`
--

LOCK TABLES `iletisim` WRITE;
/*!40000 ALTER TABLE `iletisim` DISABLE KEYS */;
/*!40000 ALTER TABLE `iletisim` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `isitma_tip`
--

DROP TABLE IF EXISTS `isitma_tip`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `isitma_tip` (
  `isitma_id` int(11) NOT NULL AUTO_INCREMENT,
  `isitma_ad` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`isitma_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `isitma_tip`
--

LOCK TABLES `isitma_tip` WRITE;
/*!40000 ALTER TABLE `isitma_tip` DISABLE KEYS */;
INSERT INTO `isitma_tip` (`isitma_id`, `isitma_ad`) VALUES (1,'Kombi'),(2,'Sobalı'),(3,'Merkezi Sistem'),(4,'Kalorifer');
/*!40000 ALTER TABLE `isitma_tip` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mahalle`
--

DROP TABLE IF EXISTS `mahalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mahalle` (
  `mahalle_id` int(11) NOT NULL AUTO_INCREMENT,
  `mahalle_ad` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `ilce_id` int(11) NOT NULL,
  PRIMARY KEY (`mahalle_id`)
) ENGINE=MyISAM AUTO_INCREMENT=227 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mahalle`
--

LOCK TABLES `mahalle` WRITE;
/*!40000 ALTER TABLE `mahalle` DISABLE KEYS */;
INSERT INTO `mahalle` (`mahalle_id`, `mahalle_ad`, `ilce_id`) VALUES (1,'100.YIl Mahallesi',7),(2,'30 Agustos Mahallesi',7),(3,'75.Yıl Mahallesi',7),(4,'Akkent(Toki) Mahallesi',7),(5,'Alayunt Mahallesi',7),(6,'Alipaşa Mahallesi',7),(7,'Andız Mah',7),(8,'Aydoğdu Mahallesi',7),(9,'Bahçelievler Mahallesi',7),(10,'Balıklı Mahallesi',7),(11,'BÖLÜCEK MAHALLESİ',7),(12,'Börekçiler Mahallesi',7),(13,'Cedit Mahallesi',7),(14,'Cemalettin Mahallesi',7),(15,'Civli Mah',7),(16,'Cumhuriyet Mahallesi',7),(17,'Çalca Mahallesi',7),(18,'Dumlupınar Mahallesi',7),(19,'Evliyaçelebi Mahallesi',7),(20,'Enne Mahallesi',7),(21,'Fatih Mahallesi',7),(22,'Fatihler Mahallesi',7),(23,'Fuatpaşa Mahallesi',7),(24,'Gaybiefendi Mahallesi',7),(25,'Gazikemal Mahallesi',7),(26,'Geven Mahallesi',7),(27,'Gültepe Mahallesi',7),(28,'Güveççi Mahallesi',7),(29,'Hamidiye Mahallesi',7),(30,'Ilıca Kaplıcaları',7),(31,'İnköy',7),(32,'İstiklal Mahallesi',7),(33,'Kırgılı Mahallesi',7),(34,'Kirazpınar Mahallesi',7),(35,'Köprüörenağaçköy',7),(36,'Kumarı Mahallesi',7),(37,'Lalahüseyinpaşa Mahallesi',7),(38,'Maltepe Mahallesi',7),(39,'Maruf Mahallesi',7),(40,'Mecidiye Mahallesi',7),(41,' Mehmetakifersoy Mahallesi',7),(42,'Meydan Mahallesi',7),(43,'Perli Mahallesi',7),(44,'Saray Mahallesi',7),(45,'Servi Mahallesi',7),(46,'Siner Mahallesi',7),(47,'Sofu Mahallesi',7),(48,'Vefa Mahallesi',7),(49,'Yenibosna Mahallesi',7),(50,'Yenidoğan Mahallesi',7),(51,'Yıldırımbeyazıt Mahallesi',7),(52,'Yunusemre Mahallesi',7),(53,'Zafertepe Mahallesi',7),(54,'Zığra Mah',7),(55,'Ziraat Mahallesi',7),(56,'Ada Mahallesi',6),(57,'Aşağı Mahallesi',6),(58,' Cevizli Mahallesi',6),(59,'Çamaltı Mahallesi',6),(60,'Çardaklı Mahallesi',6),(61,'Çırçırçeşme Mahallesi',6),(62,'Çıvgallar Mahallesi',6),(63,'Durak Mahallesi',6),(64,'Dağçeşme Mahallesi',6),(65,'Hanımçeşme Mahallesi',6),(66,' İstasyon Mahallesi',6),(67,'Karakova Mahallesi',6),(68,'Kavaklı Mahallesi',6),(69,'Kemalsultan Mahallesi',6),(70,'Kocapınar Mahallesi',6),(71,'Moymul Mahallesi',6),(72,'Ömerbey Mahallesi',6),(73,'Subaşı Mahallesi',6),(74,' Ulucami Mahallesi',6),(75,'Yeni Mahallesi',6),(76,'Yıldırımbeyazıt Mahallesi',6),(77,'Bozbay Mahallesi',1),(78,'Cumhuriyet Mahallesi',1),(79,'Hürriyet Mahallesi',1),(80,'İstiklal Mahallesi',1),(81,'Yeni Mahallesi',1),(82,' Cumhuriyet Mahallesi ',2),(83,' Hürriyet Mahallesi',2),(84,'Aslanapa Mahalleleri',3),(85,'Camiikebir Mahallesi',3),(86,'Cereller Mahallesi',3),(87,'Kemaller Mahallesi',3),(88,'Meydan Mahallesi',3),(89,'Yukarı Mahallesi',3),(90,'Cafergazi Mahallesi',4),(91,'Cumhuriyet Mahallesi ',4),(92,'Turgutözal Mahallesi',4),(93,'Zafer Mahallesi',4),(94,'Cumhuriyet Mahallesi',5),(95,'Hasantepe Mahallesi ',5),(96,'Hisar Mahallesi',5),(97,'Karşıyaka Mahallesi',5),(113,'Atatürk Mahallesi',13),(100,'Merkez',12),(101,'Akpınar Mahallesi',12),(102,'Alipaşa Mahallesi ',12),(103,'Cumhuriyet Mahallesi',12),(104,'Çimenli Mahallesi',12),(105,'Çimenlik Mahallesi',12),(106,'Dere Mahallesi',12),(107,'Esentepe Mahallesi',12),(108,'Fatih Mahallesi ',12),(109,'Esentepe Mahallesi',12),(110,'Hamam Mahallesi ',12),(111,'Kapaklıca Mahallesi ',12),(112,'Kaynarca Mahallesi',12),(114,'Bahçeler Mahallesi ',13),(115,'Camikebir Mahallesi',13),(116,'Çamlık Mahallesi',13),(117,'Çandır Mahallesi ',13),(118,'Çay Mahallesi',13),(119,'Çimentepe Mahallesi',13),(120,'Dayınlar Mahallesi',13),(121,'Ergenekon Mahallesi',13),(122,'Fatih Mahallesi',13),(123,'Gazikemal Mahallesi',13),(124,'Fatihsultan Mahallesi ',13),(125,'Gedizosb ',13),(126,'Gölcük Mahallesi ',13),(127,'Güney Mahallesi',13),(128,'Gürsu Mahallesi',13),(129,'Hamzabey Mahallesi ',13),(130,'Hisar Mahallesi ',13),(131,'İbrahimkahya Mahallesi',13),(132,'İsmetpaşa Mahallesi ',13),(133,'Kızıltepe Mahallesi ',13),(134,'Kumtaş Mahallesi',13),(135,'Kurtuluş Mahallesi',13),(136,' Kuzey Mahallesi',13),(137,'Muhipler Mahallesi',13),(138,'Muhtelıfkümeler Mahallesi',13),(139,'Özyurt Mahallesi',13),(140,' Park Mahallesi',13),(141,'Sabırgazi Mahallesi ',13),(142,'Salur Mahallesi',13),(143,'Saygılar Mahallesi ',13),(144,'Uluoymak Mahallesi ',13),(145,'Umurbey Mahallesi',13),(146,'Ülkü Mahallesi',13),(147,'Yayla Mahallesi',13),(148,' Yeni Mahallesi ',13),(149,'Yukarısusuz Mahallesi',13),(150,'Yunusemre  Mahallesi',13),(151,'82.Yıl Mahallesi',8),(152,'Alidede Mahallesi',8),(153,'Bahçelievler Mahallesi ',8),(154,'Cumhuriyet Mahallesi',8),(155,'Emirsultan Mahallesi ',8),(156,'Gazi Mahallesi',8),(157,'Haksızhasan Mahallesi',8),(158,'Karşıyaka Mahallesi',8),(159,'Şehitler Mahallesi',8),(160,'Tekke Mahallesi',8),(161,'Yenidoğan Mahallesi ',8),(162,'Yeşilhisar Mahallesi ',8),(163,'Yunusemre Mahallesi',8),(164,' Adnanmenderes Mahallesi ',9),(165,'Atatürk Mahallesi',9),(166,'Ayvalı Mahallesi',9),(167,'Fatih Mahallesi ',9),(168,'Hocaahmetyesevi Mahallesi',9),(169,'Turgutözal Mahallesi',9),(170,'Atatürk Mahallesi',11),(171,'Bahçelievler Mahallesi',11),(172,'Boğazköy Mahallesi ',11),(173,' Camiikebir Mahallesi',11),(174,'Cevizlik Mahallesi ',11),(175,'Cuma Mahallesi',11),(176,'Cumhuriyet Mahallesi',11),(177,'Çavdır Mahallesi ',11),(178,'Çobanlar Mahallesi',11),(179,'Darıcı Mahallesi',11),(180,'Değirmenciler Mahallesi',11),(181,'Dere Mahallesi',11),(182,'Dere Mahallesi',11),(183,'Eğdemir Mahallesi ',11),(184,'Esenevler Mahallesi',11),(185,'Fatih Mahallesi',11),(186,'Gazi Mahallesi',11),(187,'Gökçepınar Mahallesi',11),(188,'Hisar Mahallesi',11),(189,'Hisarardı Mahallesi ',11),(190,' Hisarbey Mahallesi',11),(191,'Hürriyet Mahallesi ',11),(192,'Kadılar Mahallesi',11),(193,'Karacalar Mahallesi',11),(194,'Karakür Mahallesi ',11),(195,'Karşıyaka Mahallesi',11),(196,'Kaya Mahallesi',11),(197,'Kekliktepe Mahallesi',11),(198,'Kınık Mahallesi ',11),(199,' Kusumlar Mahallesi',11),(200,'Maden Mahallesi',11),(201,'Mevlana Mahallesi ',11),(202,'Muradınlar Mahallesi',11),(203,'Ören Mahallesi',11),(204,'Sırapayam Mahallesi ',11),(205,'Şenbirlik Mahallesi ',11),(206,'Tabakhane Mahallesi',11),(207,'Tepecik Mahallesi',11),(208,'Yeni Mahallesi',11),(209,'Yeşilyayla Mahallesi',11),(210,'Yeşilyurt Mahallesi ',11),(211,'Yüzbirevler Mahallesi',11),(212,'Atatürk Mahallesi',10),(213,' Doktorosman Mahallesi',10),(214,' Hacıhasanlar Mahallesi ',10),(215,'Kalabak Mahallesi',10),(216,'Karaağıl Mahallesi',10),(217,'Karacaderbent Mahallesi ',10),(218,'Pazar Mahallesi ',10),(219,'Subaşı Mahallesi',10),(220,'Türegün Mahallesi',10),(226,'30 Ağustos Mahallesi',7);
/*!40000 ALTER TABLE `mahalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mesajlar`
--

DROP TABLE IF EXISTS `mesajlar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mesajlar` (
  `mesaj_id` int(11) NOT NULL AUTO_INCREMENT,
  `gonderen_ad` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `gonderen_mail` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `gonderen_tel` varchar(15) COLLATE utf8_turkish_ci NOT NULL,
  `konu` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `mesaj` text COLLATE utf8_turkish_ci NOT NULL,
  `tarih` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ilan_id` int(11) NOT NULL,
  `okundu` tinyint(4) NOT NULL,
  `silindi` tinyint(4) NOT NULL,
  PRIMARY KEY (`mesaj_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mesajlar`
--

LOCK TABLES `mesajlar` WRITE;
/*!40000 ALTER TABLE `mesajlar` DISABLE KEYS */;
INSERT INTO `mesajlar` (`mesaj_id`, `gonderen_ad`, `gonderen_mail`, `gonderen_tel`, `konu`, `mesaj`, `tarih`, `ilan_id`, `okundu`, `silindi`) VALUES (3,'kenan','kenan@hot.com','5423698512','fiyat','fiyatı son ne olur','2016-05-14 22:03:24',14,1,0),(4,'kenan','kenan@hot.com','5552','konu','son kaç olur ücretin','2016-05-14 22:04:15',7,1,1);
/*!40000 ALTER TABLE `mesajlar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oda_sayisi_tip`
--

DROP TABLE IF EXISTS `oda_sayisi_tip`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oda_sayisi_tip` (
  `oda_tip_id` int(11) NOT NULL AUTO_INCREMENT,
  `oda_ad` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`oda_tip_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oda_sayisi_tip`
--

LOCK TABLES `oda_sayisi_tip` WRITE;
/*!40000 ALTER TABLE `oda_sayisi_tip` DISABLE KEYS */;
INSERT INTO `oda_sayisi_tip` (`oda_tip_id`, `oda_ad`) VALUES (1,'1+0'),(2,'2+1'),(3,'1+1'),(4,'3+1'),(5,'4+1'),(6,'5+1'),(7,'2+0'),(9,'3+2'),(10,'4+2'),(11,'5+2');
/*!40000 ALTER TABLE `oda_sayisi_tip` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_login`
--

DROP TABLE IF EXISTS `tb_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_login` (
  `id_login` int(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` varchar(20) NOT NULL,
  `foto` varchar(20) NOT NULL,
  PRIMARY KEY (`id_login`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_login`
--

LOCK TABLES `tb_login` WRITE;
/*!40000 ALTER TABLE `tb_login` DISABLE KEYS */;
INSERT INTO `tb_login` (`id_login`, `username`, `password`, `level`, `foto`) VALUES (1,'verly','verly','admin','verly.png');
/*!40000 ALTER TABLE `tb_login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_siswa`
--

DROP TABLE IF EXISTS `tb_siswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_siswa` (
  `id_siswa` int(20) NOT NULL AUTO_INCREMENT,
  `nama_siswa` varchar(20) NOT NULL,
  `alamat_siswa` varchar(20) NOT NULL,
  PRIMARY KEY (`id_siswa`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_siswa`
--

LOCK TABLES `tb_siswa` WRITE;
/*!40000 ALTER TABLE `tb_siswa` DISABLE KEYS */;
INSERT INTO `tb_siswa` (`id_siswa`, `nama_siswa`, `alamat_siswa`) VALUES (3,'VerlyAnanda','Di Cimahi '),(5,'Tio Reza','Di Bandung'),(6,'Bayu ','Di Cimahi'),(7,'Rajif','Di Permata'),(8,'Fajar','Di Baros'),(9,'Sendi','Di Batujajar');
/*!40000 ALTER TABLE `tb_siswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `telefonlar`
--

DROP TABLE IF EXISTS `telefonlar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `telefonlar` (
  `telefon_id` int(11) NOT NULL AUTO_INCREMENT,
  `telefon_no` int(11) NOT NULL,
  `emlakci_id` int(11) NOT NULL,
  PRIMARY KEY (`telefon_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `telefonlar`
--

LOCK TABLES `telefonlar` WRITE;
/*!40000 ALTER TABLE `telefonlar` DISABLE KEYS */;
/*!40000 ALTER TABLE `telefonlar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'kutahyae_emlakdb'
--

--
-- Dumping routines for database 'kutahyae_emlakdb'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-05-15 15:22:14
