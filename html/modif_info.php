<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<link rel="stylesheet" href="../css/style.css">	
		<title>Modification des informations</title>
	</head>
	
	<body>

		<header>
			<?php
                require("en_tete_connexion.php");
	       ?>
		</header>
		
		<article>
		
			<h1>Modification des informations</h1>
			
			<div id="conteneur2">
		
			<form  method="post" action="traitement_modif_info.php">		
				<div id="formulaire1">
					<label for="nom">								
						Nom
					</label>
					<br />
						<input type="text" name="username" placeholder="Nom de l'utilisateur" />
				</div>
			
			
			<br />
			<br />
			
				
				<div id="formulaire1">
					<label for="mail">								
						Adresse mail
					</label>
					<br />
						<input type="text" name="mail" placeholder="Adresse mail" />
				</div>
			
			
			<br />
			<br />
			
				
				<div id="formulaire1">
					<label for="password">								
						Mot de passe
					</label>
					<br />
						<input type="password" name="password" placeholder="Mot de passe" />
				</div>
			
			
			<br />
			<br />
			
				<div id="formulaire1">
					<label for="mdp">								
						Confirmation du mot de passe
					</label>
					<br />
						<input type="password" name="mdp" placeholder="Mot de passe" />
				</div>
			
			
			<br />
			<br />
			
				<div id="formulaire1">
					<label for="tel">								
						Numéro de téléphone
					</label>
					<br />
						<input type="text" name="numero_de_tel" placeholder="Numéro de téléphone" />
				</div>
			
			
			<br />
			<br />
			
			<label for="photo">								
					Ajouter une photo
			</label>
			<input type="file" name="photo" />
			
			<br />
			<br />
			
			<input type="submit" value="Enregistrer les modifications" />
		</form>
		</div>
			
		</article>

		<footer>						<!--  début du bas de la page -->
			<?php
                require("footer.php");
            ?>
		</footer>
	
	</body>
</html>