<?php
session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<link rel="stylesheet" href="../css/style.css">	
		<title>Nom piece</title>
	</head>

	<body>

		<header>
			<p>
			
				<img src="../images/LogoHabilis.png" alt="Logo Habilis" width="150">
			
			<br />
				Un produit de Domisep
			</p>
			
			<p>
				<br />
				
			</p>
						
			<div id="conteneur3">
				<br />
				<br />
				<a href="informations.php">			
					Mes informations
				</a>
				<br />
				<br />
				
				<a href="page_de_connexion.php">			
					Se déconnecter
				</a>
			
			</div>
			
			<div id="profil">
	   		
				<img src="../images/photo.png" alt="Photo profil" width="125">
	   			<p>
	   				Nom d'utilisateur
	   			</p>	
			</div>
		</header>
		
	<article>
		
		<h1>
		Nom de la pièce
        </h1>
		
		
		
		<div style="float:left">
			<a href="tableau_de_bord.php">		
				<input type="submit" id="supprimer" value="Retour à la page d'accueil" />
			</a>
		</div> 
		
		<div style="float:right">		
			<input type="submit" id="supprimer" value="Supprimer la piece" />
		</div>
				
		<div id="conteneurcercle">
			<div>Données</div>
			<div>Données</div>
			<div>Données</div>
			<div>Données</div>
			<div><font size="+4"><a href="ajout_composant.php">+</a></font></div>
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
				Conditions générales d'utilisation
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