<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">

		<link rel="stylesheet" href="../css/style.css">		

		<title>Conditions g&eacute;n&eacute;rales d'utilisation</title>
	</head>
	
	<body>
	
	<header>
		<p>
			<a href="tableau_de_bord.php">
				<img src="../images/LogoHabilis.png" alt="Logo Habilis" width="150">
			</a>	
			
			<br />
				Un produit de Domisep
		</p>

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