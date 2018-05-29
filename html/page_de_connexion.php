<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">

		<link rel="stylesheet" href="../css/style.css">		<!--  lien vers style -->



		<title>Page de connexion</title>				<!--  titre de la page -->
	</head>
	<body>
		<?php 
       		include('../modele/config_init.php');
       	?>
		<header>
			<?php
				require('header_connexion.php');
			?>
	</header>
	<article>
		<br />
		<br />
		<div id=conteneurtxt>
		<?php	
            $reponse = $bdd->query('SELECT * FROM texte ');
       		$donnees = $reponse->fetch();	
       		
       		echo $donnees[1];
        ?>
		</div>

	</article>
	<footer>
		<?php
            require("footer.php");
        ?>
	</footer>
	</body>
	</html>