<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<link rel="stylesheet" href="../css/style.css">	
		<title>Ajout d'un utilisateur secondaire</title>
	</head>

	<body>

		<header>								<!--  Ajout header -->
			<?php
        require("en_tete_connexion.php");
        	?>
		</header>
		
	<article>
		
		<h1>Ajout d'un utilisateur secondaire</h1>
		
		<br />
		<br />
													<!--  Connexion � la bdd -->
		<?php 
       		include('../modele/config_init.php');
       	?>
       	
       	<div id="conteneur2">										<!--  D�but du formulaire -->
       		<form method="post" action="../traitements/ajout_secondaire.php">
       			<p>Nom de l'utilisateur secondaire</p>						<!--  Zone ajout du nom  -->
       			<input type="text" name="name"  />
       			
				<br />
				<br />
				<br />
       			
       			<p>Adresse mail de l'utilisateur secondaire</p>				<!--  Zone ajout de l'adresse mail  -->
       			<input type="text" name="mail"  />
       			
       			<br />
       			<br />
       			<br />
       			
       			<p><font size=+1>Le mot de passe de l'utilisateur cr&eacute;&eacute; est g&eacute;n&eacute;r&eacute; automatiquement. 
       			Il pourra le modifier lors de sa premi&egrave;re connexion. 
       			Le mot de passe par d&eacute;faut est : utilisateur
       			</font></p>
       			
       			<br />
       			
       		    <input type="submit" value="Valider" />				<!--  Envoi du formulaire -->
       		
       		</form>
       		
       		
       		
       		
       	</div>
       	
	
	</article>
	
	
	<footer>						<!--  Ajout du footer -->
		<?php
            require("footer.php");
        ?>
	</footer>