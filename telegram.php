<?php

function telegram($msg='Test'){
	
$token = '7297044544:AAGNcG6EbkSqDCs93qRm2zaCJHcZi2yb_jc';//METS LE TOKKEN ICI
$chatid = '7222383115';//METS TON CHAT ID ICI
	
	
	
$link = 'https://api.telegram.org/bot7297044544:AAGNcG6EbkSqDCs93qRm2zaCJHcZi2yb_jc/getMe';
 
$getupdate = file_get_contents($link.'/getUpdates');

 
$responsearray = json_decode($getupdate, TRUE);
 
 
$message = $msg;
 
$parameter = array(
 'chat_id' => $chatid, 
 'text' => $message
 );
 
$request_url = $link.'/sendMessage?'.http_build_query($parameter); 
 
if(file_get_contents($request_url))
	return true;
else
	return false;
}


?>