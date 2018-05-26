<!--VerlyRedirect Session-->
<?php
	error_reporting(0);
	session_start();
	if ((!$_SESSION['eposta']) AND (!$_SESSION['sifre']))
	{
		header("location:giris.php");
	}
?>