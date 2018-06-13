<?php 
session_start()
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">

		<link rel="stylesheet" href="../css/style.css">		

		<title>Conditions g&eacute;n&eacute;rales d'utilisation</title>
	</head>
	
	<body>
	
	<header>
		<?php
        if(empty($_SESSION)) {
            require('header_connexion.php');
        }
        else {
            include('en_tete_connexionbis.php');
        }
        ?>
	</header>
	
	<article>
		<h1> Conditions g&eacute;n&eacute;rales d'utilisation </h1>

		<br />
		<br />
		
		<?php 
       		include('../modele/config_init.php');
       	?>
       	
		<div id="conteneurtxt">
			<?php	
       		   $reponse = $bdd->query('SELECT * FROM texte');
       		   $donnees = $reponse->fetch();
       		   
       		   echo $donnees[2];
       	    ?>
       	</div>
       	
	</article>
	
	
	<footer>
						
		<?php
            require("footer.php");
        ?>
	
	</footer>