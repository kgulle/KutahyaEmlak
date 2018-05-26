<?php
$host = "localhost";
$user = "kutahyae";
$password = "ktahyaem4343";
$database_name = "kutahyae_emlakdb";
$verlipdo=new PDO("mysql:host=$host;dbname=$database_name",$user,$password,array(
	PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
?>
