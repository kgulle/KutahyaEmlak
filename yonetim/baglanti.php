<?php
	$vt_sunucu = "localhost";
	$vt_kullanici = "kutahyae";
	$vt_sifre = "ktahyaem4343";
	$vt_ad = "kutahyae_emlakdb";
	$veritabani=new PDO("mysql:host=$vt_sunucu;dbname=$vt_ad",$vt_kullanici,$vt_sifre,array(
	PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
	$veritabani->exec("set names utf8");

?>
