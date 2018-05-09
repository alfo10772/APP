<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<link rel="stylesheet" href="../css/style.css">
<title>Insert title here</title>
</head>
<body>

	<header>
		<p>
			<a href="../images/LogoHabilis.png">
				<img src="../images/LogoHabilisPetit.png" alt="Logo Habilis" width="150">
			</a>
			<br />
				Un produit de Domisep
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
	   			&nbspNom d'utilisateur
	   			</p>	
		</div>
	</header>
	<article>
		<h1>Suppression d'un composant</h1>
	
		<div style="float:left">
			<a href="page_des_composants.php">		
				<input type="submit" id="supprimer" value="Retour à la page des composants" />
			</a>
		</div>
		
		<br />
		<br />
		<br />
		<br />
		
		<div class="confirmer" id="confirmation">
			Etes-vous sûr de supprimer ce composant?
			<br>
			<br>
			<div style="float:left">
				<a href="page_des_composants.php">		
					<input type="submit" id="supprimer" value="Confirmer" />
				</a>
			</div> 
		
			<div style="float:right">
				<a href="#">		
					<input type="submit" id="supprimer" value="Annuler"> 
				</a>
			</div>
		</div>
		
		<div id="conteneur2">
			<form method="post" action="traitement.php"> 
   				<div type="formulaire1">
   					<label for="maison">Maison</label><br /> 
       				<select name="type" id="maison"> 
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
   					<label for="piece">Pièce</label><br /> 
       				<select name="piece" id="piece"> 
       					<option value="type">Type de piece</option> 
       					<option value="cuisine">Cuisine</option>
           				<option value="salon">Salon</option> 
           				<option value="sdb">Salle de bain</option> 
           				<option value="chambre">Chambre</option> 
           				<option value="nouveau">Ajouter un type</option> 
           			</select> 
  				 </div>
			</form>
			<br />
			<br />
			<form method="post" action="traitement.php"> 
   				<div type="formulaire1">
   					<label for="composant">Nom du composant</label><br /> 
       				<select name="composant" id="compoasnt"> 
       					<option value="type">Type de composant</option> 
       					<option value="temperature">Capteur de température</option>
           				<option value="humidite">Capteur d'humidité</option> 
           				<option value="presence">Capteur de présence</option>
           				<option value="fumee">Capteur de fumée</option>
           				<option value="lumiere">Capteur de luminosité</option> 
           				<option value="pression">Capteur de pression</option>  
           			</select> 
  				 </div>
			</form>
			<br />
			<br />
			<div style="float:left">
				<a href="#confirmation">		
					<input type="submit" id="supprimer" value="Supprimer" />
				</a>
			</div>
		</div>
		
	</article>
	<footer>
		<p class="bordure1">
			<a href="faq.html">
				<strong>
					FAQ
				</strong>
			</a>
		</p>
		<p>
			<a href="condition_d'utilisation.html">
				Condition générales d'utilisation
			</a>
		</p>
		<p>
			<a href="mentions_legales.html">
				Mentions légales
			</a>
		</p>
		<div>
			Date et heure
			<div id="afficherheure">
			</div>
			<script type="text/javascript">
			setInterval(function(){
    		document.getElementById('afficherheure').innerHTML = new Date().toLocaleTimeString();
			}, 1000);
			</script>
		</div>
		</div>
	</footer>
</body>
</html>