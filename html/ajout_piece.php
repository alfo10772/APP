<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<link rel="stylesheet" href="../css/style.css">	
		<title>ajout_piece</title>
	</head>

	<body>

		<header>
			<p>
			<a href="../images/LogoHabilis.png">
				<img src="../images/LogoHabilis.png" alt="Logo Habilis" width="150">
			</a>
			<br />
				Un produit de Domisep
			</p>
			
			
			<div id="conteneur1">
				<br />
				<br />
				<a href="informations.html">			
					Mes informations
				</a>
				
				<a href="page_de_connexion.php">			
					Se déconnecter
				</a>
				<br />
				<br />
				<br />
			
			</div>
			<div id="profil">
	   		
	   			<a href="../images/photo.png">
					<img src="../images/photo.png" alt="Photo profil" width="125">
	   			</a>
	   			<p>
	   				Nom d'utilisateur
	   			</p>
	   		
			</div>
		</header>

	<article>
		
		<h1>Ajout d'une pièce</h1>
		
		<div id="conteneur1">
			
			<form method="post" action="traitement.php"> 
   				<p> 
   					<label for="maison">Maison</label><br /> 
       				<select name="maison" id="maison"> 
       					<option value="france">Maison principale</option> 
           				<option value="espagne">Maison de campagne</option> 
           				<option value="italie">Maison de vacances</option> 
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
