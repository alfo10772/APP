<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<link rel="stylesheet" href="../css/style.css">	
		<title>ajout_maison</title>
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
			
			
			<div id="conteneur3">
				<br />
				<br />
				<a href="informations.html">			
					Mes informations
				</a>
				<br />
				<br />
				
				<a href="page_de_connexion.php">			
					Se déconnecter
				</a>
			
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
		
		<h1>Ajout d'une maison</h1>
		
		<div style="float:left">
			<a href="tableau_de_bord.php">		
				<input type="submit" value="Retour à la page d'accueil" />
			</a>
		</div> 
		
		<br />
		<br />
		<br />
		<br />
		
		<div id="conteneur2">
			
			<form  method="post" action="traitement.php">		
				<div id="formulaire1">
					<label for="maison">								
						Nom
					</label>
					<br />
						<input type="text" name="maison" placeholder="Nom de la maison" id="maison" required/>
				</div>
			</form>
			
			<br />
			<br />
			
			<form  method="post" action="traitement.php">		
				<div id="formulaire1">
					<label for="maison">								
						Adresse
					</label>
					<br />
						<input type="text" name="maison" placeholder="Adresse de la maison" id="maison" required/>
				</div>
			</form>
			
			<br />
			<br />
			
			<label for="photo">								
					Ajouter une photo
			</label>
			<input type="file" name="photo" />
			
			<br />
			<br />
			
			<input type="submit" value="Ajouter" />
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
