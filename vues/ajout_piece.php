<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<link rel="stylesheet" href="../css/style.css">	
		<title>Ajout_piece</title>
	</head>

	<body>

		<header>
			<?php
        require("en_tete_connexion.php");
        	?>
		</header>

	<article>
		
		<h1>Ajout d'une pi&egrave;ce</h1>
		
		<?php 
       		include('../modele/config_init.php');   //Connexion � la BDD
       	?>
       				
		<div style="float:left"> 	<!-- Bouton de retour -->
			<a href="piece.php">		
				<input type="submit" id="retour" value="Retour &agrave; la page des pi&egrave;ces" />
			</a>
		</div> 
		
		<br />
		<br />
		<br />
		<br />
		
		<div id="conteneur2">
			
			<form method="post" action="../traitements/ajout_piece.php" enctype="multipart/form-data"> <!-- d�but du formulaire d'ajout de piece -->
			
			<br />
			<br />
			
			
   				<div type="formulaire1">
   					<label for="piece">
   						Nom 
   					</label>
   					<br /> 
       				<input type="text" name="nom" placeholder="Nom de la pi&egrave;ce" id="nom" />		<!-- Nom de pi�ce entr�e par l'utilisateur -->
  				 </div>
			
			
			<br />
			<br />
			
			<input type="submit" id="supprimer" value="Ajouter" />		<!-- Bouton de supprimer -->
			
			<br />
			<br />
			
			</form>			<!-- fin du formulaire d'ajout de piece -->
		</div>
		
	</article>
		
	<footer>						<!--  d�but du bas de la page -->
		<?php
            require("footer.php");
        ?>
	</footer>
