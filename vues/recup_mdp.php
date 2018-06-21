<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<link rel="stylesheet" href="../css/style.css">	
		<title>R&eacute;cup&eacute;ration du Mot de Passe</title>
	</head>

	<body>
	
		<header>
			<?php
        		require("header_connexion.php");
        	?>
        </header>

		<article>
		<h1>
		R&eacute;cup&eacute;ration du Mot de Passe
		</h1>

		<section class='conteneur2'>
		<div id='conteneur2'>
			<form name='mailrecup1' method='post' action='../traitements/traitement_mdp1.php'>
				<br />
				<br />
				Adresse mail :
				<br />
				
				<input type="email" name="mail" id="mail" required />
				<br />
				<br />
				<input type='submit' value='Suivant'>
			</form>
		</div>
		</section>

		</article>

		<footer>
    		<?php
				require('footer.php');
    		?>
		</footer>

    </body>


