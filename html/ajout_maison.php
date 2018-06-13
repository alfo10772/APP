<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<link rel="stylesheet" href="../css/style.css">	
		<title>Ajout maison</title>
	</head>

	<body>

		<header>
			<?php
        require("en_tete_connexion.php");
        	?>
		</header>

	<article>
		
		<h1>Ajout d'une maison</h1>
		
		<?php 
       		include('../modele/config_init.php');
       	?>
       	
		<div style="float:left">
			<a href="maison.php">		
				<input type="submit" id="retour" value="Retour &agrave; la page des maisons" />
			</a>
		</div> 
		
		<br />
		<br />
		<br />
		<br />
		
		<div id="conteneur2">
			
			<form  method="post" action="../traitements/ajout_maison.php">		
				<div id="formulaire1">
					<label for="maison">								
						Nom
					</label>
					<br />
						<input type="text" name="nom" placeholder="Nom de la maison" id="maison" required/>
				</div>
			
			
			<br />
			<br />
			
			<form  method="post" action="traitement.php">		
				<div id="formulaire1">
					<label for="maison">								
						Adresse
					</label>
					<br />
						<input type="text" name="adresse" placeholder="Adresse de la maison" id="maison" />
				</div>
			
			
			<br />
			<br />
			
			
			<input type="submit" id="supprimer" value="Ajouter" />
			</form>
		</div>
		
	</article>
		
	<footer>						<!--  d&eacute;but du bas de la page -->
		<?php
            require("footer.php");
        ?>
	</footer>
