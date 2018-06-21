<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">

		<link rel="stylesheet" href="../css/style.css">		<!--  lien vers style -->



		<title>Page de connexion</title>				<!--  titre de la page -->
	</head>
	<body>
		<?php 
       		include('../modele/config_init.php');      //Connexion bdd
       	?>
		<header>
			<?php
				require('header_connexion.php');            //ajout du header 
			?>
	</header>
	<article>
		<br />
		<br />
		<div id=conteneurtxt>
		<?php	                                //Affichage du texte en fonction de la bdd
            $reponse = $bdd->query('SELECT * FROM texte ');
       		$donnees = $reponse->fetch();	
       		
       		echo $donnees[1];
        ?>
		</div>

	</article>
	<footer>
		<?php
            require("footer.php");              //Ajout du footer
        ?>
	</footer>
	</body>
	</html>