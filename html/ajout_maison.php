<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<link rel="stylesheet" href="../css/style.css">	
		<title>Ajout maison</title>
	</head>

	<body>
														<!--  Ajout du header  -->
		<header>
			<?php
        require("en_tete_connexion.php");
        	?>
		</header>

	<article>
		
		<h1>Ajout d'une maison</h1>
														<!--  Connexion à la bdd -->
		<?php 
       		include('../modele/config_init.php');
       	?>
       	<br>
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
																						<!--  Début du formulaire-->
			<form  method="post" action="../traitements/ajout_maison.php">		
				<div id="formulaire1">
					<label for="maison">								<!--  Zone pour ajout nom maison -->
						Nom
					</label>
					<br />
						<input type="text" name="nom" placeholder="Nom de la maison" id="maison" required/>
				</div>
			
			
			<br />
			<br />
			
			<form  method="post" action="traitement.php">		<!--  Zone pour ajout adresse -->
				<div id="formulaire1">
					<label for="maison">								
						Adresse
					</label>
					<br />
						<input type="text" name="adresse" placeholder="Adresse de la maison" id="maison" />
				</div>
			
			
			<br />
			<br />
			
			
			<input type="submit" id="supprimer" value="Ajouter" />			<!--  Envoi du formulaire -->
			</form>
		</div>
		
	</article>
		
	<footer>						<!--  Ajout du footer -->
		<?php
            require("footer.php");
        ?>
	</footer>
