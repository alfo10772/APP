<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<link rel="stylesheet" href="../css/style.css">	
		<title>piece</title>
	</head>

	<body>

		<header>
			<?php
        require("en_tete_connexion.php");
        	?>
		</header>
		
	<article>
		
		<h1>Page des pi�ces</h1>
		
		
		
		<div style="float:left">
			<a href="tableau_de_bord.php">		
				<input type="submit" id="supprimer" value="Retour � la page d'accueil" />
			</a>
		</div> 
		
		<div style="float:right">
			<a href="suppression_piece.php">		
				<input type="submit" id="supprimer" value="Supprimer une piece" />
				
			</a>
		</div>
		
		
		
		
		<div id="conteneurcercle">
			<div>Cuisine</div>
			<div>Salon</div>
			<div>Salle de bain</div>
			<div>Chambre 1</div>
			<div>Chambre 2</div>
			<div>Pi�ce</div>
			<div>Pi�ce</div>
			<div>Pi�ce</div>
			<div><font size="+4"><a href="ajout_piece.php">+</a></font></div>
		</div>
	
		
	</article>
	
	<footer>						<!--  d�but du bas de la page -->
		<p>
			<a href="faq.html">		<!--  lien vers la FAQ -->
				<strong>
					FAQ
				</strong>
			</a>
		</p>
		<p>
			<a href="condition_d'utilisation.html">		<!--  lien vers les conditions d'utilisations -->
				Conditions g�n�rales d'utilisation
			</a>
		</p>
		<p>
			<a href="mentions_legales.html">			<!--  lien vers les mentions l�gales -->
				Mentions l�gales
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