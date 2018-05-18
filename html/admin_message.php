<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/style.css">		<!--  lien vers style -->
        <title>Messages</title>
    </head>

    <body>
    <?php 
       		include('config_init.php');
       	?>
    <div id="article2">
	
	<?php 
	   require("menu_admin.php");
	?>
    

     <div class="imagemessage">
    <a href="messages_recus.php">
    <img src="../images/message.png" alt="Logo message" width="200">
    <div class="conteneurcercle1">
    <?php
            $umess = array();
            $i = 0;
            $reponse = $bdd->query('SELECT * FROM utilisateur');
            while ($donnees = $reponse->fetch()){
            $umess[$i] = $donnees['nom'];
            $i++;
            }
            echo count($umess);
            ?>
            </div>
    </a>
   
    </div>
    </div>
   
    
   


    </body>

<html>