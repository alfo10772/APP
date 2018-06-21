<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
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
        <?php $boll = true; ?>

		<section class='conteneur2'>
		<div id='conteneur2'>
			<form name='mailrecup1' method='post' action='../traitements/traitement_mdp2.php'>
                <br />
				<br />
				Confirmer l'Adresse mail :
				<br />
				
				<input type="email" name="mail" id="mail" required />
				<br />
				<br />
				Code de R&eacute;initialisation :
				<br />
				
				<input type="int" name="code" required />
				<br />
                <?php 
                if ($boll == false) {
                    ?> Code non valide
                    <?php
                }
                ?>
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
