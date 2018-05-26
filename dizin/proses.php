<?php
include "koneksi.php";
//VERLYSAYS:::
#jika ditekan tombol login
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$op = $_GET['login'];
if($op=="masuk"){
$verliquier=$verlipdo->prepare("select * from tb_login where username=:username and password=:password");
$verliquier->bindParam(':username', $username);//ngecek username
$verliquier->bindParam(':password', $password);//ngecek password
$verliquier->execute();//ngeksesuksi 
$verly = $verliquier->rowCount();//ini ibaratnya mysql_numrows gan ngitung rows
if($verly== 1){//jika berhasil akan bernilai 1 baru masuk jika 0 gagal
$verly=$verliquier->fetch();
$_SESSION['username'] = $verly['username'];
$_SESSION['password'] = $verly['password']; 
$_SESSION['level'] = $verly['level'];
$_SESSION['foto'] = $verly['foto'];
//Verly HTACCESS
$homepage="homepage.html";
//Verly HTACCESS END
 if($verly['level']=="admin"){
header("location:index.php");
}else if($verly['level']=="guru"){
header("location:homepage.html");
}else if($verly['level']=="siswa"){
header("location:homepage.html");
}
}else{
echo
include"login.php";
}
}else if($op=="out"){
unset($_SESSION['username']);
unset($_SESSION['level']);
header("location:login.php");
}
?>

