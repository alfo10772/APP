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
			
			
			<div id="bandeauinfo">
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
		
		<div style="float:left">
			<a href="tableau_de_bord.php">		
				<input type="submit" value="Retour à la page d'accueil" />
			</a>
		</div> 
		
		<br />
		<br />
		
		<div id="conteneur2">
			
			<form method="post" action="traitement.php"> 
   				<div type="formulaire1">
   					<label for="maison">Maison</label><br /> 
       				<select name="maison" id="maison"> 
       					<option value="nom">Nom de la maison</option> 
       					<option value="principale">Maison principale</option>
           				<option value="campagne">Maison de campagne</option> 
           				<option value="vacances">Maison de vacances</option> 
           			</select> 
  				 </div>
			</form>
			
			<br />
			<br />
			
			<form method="post" action="traitement.php"> 
   				<div type="formulaire1">
   					<label for="piece">Type</label><br /> 
       				<select name="piece" id="piece"> 
       					<option value="france">Type de piece</option> 
       					<option value="espagne">Cuisine</option>
           				<option value="espagne">Salon</option> 
           				<option value="italie">Salle de bain</option> 
           				<option value="italie">Chambre</option> 
           				<option value="italie">Ajouter un type</option> 
           			</select> 
  				 </div>
			</form>
			
			<br />
			<br />
			
			<form  method="post" action="traitement.php">		<!-- dÃ©but formulaire -->
				<div type="formulaire1">
					<label for="piece">								<!-- texte adresse mail -->
						Superficie de la pièce (optionnelle)
					</label>
					<br />
						<input type="text" name="piece" placeholder="Superficie de la pièce" id="piece" />
				</div>
			</form>
			
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
