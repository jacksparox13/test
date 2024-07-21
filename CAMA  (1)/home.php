<?php
ob_start();

$config = parse_ini_file("config/settings.ini");
include("functions/functions.php");

pannel_session_start();
?>