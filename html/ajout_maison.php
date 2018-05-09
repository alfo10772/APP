<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<link rel="stylesheet" href="../css/style.css">	
		<title>ajout_maison</title>
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
       		include('config_init.php');
       	?>
       	
		<div style="float:left">
			<a href="tableau_de_bord.php">		
				<input type="submit" id="supprimer" value="Retour à la page d'accueil" />
			</a>
		</div> 
		
		<br />
		<br />
		<br />
		<br />
		
		<div id="conteneur2">
			
			<form  method="post" action="traitement_maison.php">		
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
						<input type="text" name="adresse" placeholder="Adresse de la maison" id="maison" required/>
				</div>
			
			
			<br />
			<br />
			
			<label for="photo">								
					Ajouter une photo
			</label>
			<input type="file" name="photo" />
			
			<br />
			<br />
			
			<input type="submit" id="supprimer" value="Ajouter" />
			</form>
		</div>
		
	</article>
		
	<footer>						<!--  début du bas de la page -->
		<p>
			<a href="faq.html">		<!--  lien vers la FAQ -->
				<strong>
					FAQ
				</strong>
			</a>
		</p>
		<p>
			<a href="condition_d'utilisation.html">		<!--  lien vers les conditions d'utilisations -->
				Condition générales d'utilisation
			</a>
		</p>
		<p>
			<a href="mentions_legales.html">			<!--  lien vers les mentions légales -->
				Mentions légales
			</a>
		</p>
		<div>
			
			Date et heure								<!--  affichage de la date et l'heure -->
			<div id="afficherheure">
			</div>
			<script type="text/javascript">
			setInterval(function(){
    		document.getElementById('afficherheure').innerHTML = new Date().toLocaleTimeString();
			}, 1000);
			</script>
		</div>
		
	</footer>
