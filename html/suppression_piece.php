<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<link rel="stylesheet" href="../css/style.css">	
		<title>Suppression d'une pièce</title>
	</head>

	<body>

		<header>
			<?php
        require("en_tete_connexion.php");
        	?>
		</header>
		
	<article>
		
		<h1>Suppression d'une pièce</h1>
		
		<div id="conteneur2">
			
			<form method="post" action="traitementpiece.php" enctype="multipart/form-data"> 
   				
   				<div type="formulaire1">
   					<label for="maison">Maison</label><br /> 
       				<select name="maison" id="maison"> 
       					<option value="nom">Nom de la maison</option> 
       					<option value="principale" selected="selected">1</option>
           				<option value="campagne">2</option> 
           				<option value="vacances">3</option> 
           			</select> 
  				 </div>
			
			
				<br />
				<br />
				
				<div type="formulaire1">
   					<label for="piece">Maison</label><br /> 
       				<select name="piece" id="piece"> 
       					<option value="nom">Nom de la piece</option> 
       					<option value="principale">Cuisine</option>
           				<option value="campagne">Salle de bain</option> 
           				<option value="vacances">Chambre</option> 
           			</select> 
  				 </div>
  				 
  				<br />
				<br />
				
  				<input type="submit" value="Supprimer" />
  				
  				<input type="submit" value="Annuler" />
  				
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
			