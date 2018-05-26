<!--VerlyRedirect Session-->
<?php
error_reporting(0);
session_start();
if ((!$_SESSION['username']) AND (!$_SESSION['password']))
{
header("location:login.php");
}
?>