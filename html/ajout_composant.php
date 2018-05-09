<!DOCTYPE html>
<html>                                                  <!--squelette pour en-t�te et bas de page -->
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/style.css">
	<title>Page d'ajout de composant</title>
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
				<a href="informations.php">			
					Mes informations
				</a>
				<br />
				<br />
				
				<a href="page_de_connexion.php">			
					Se d�connecter
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
		
		<h1>Ajout d'un composant</h1>
		
		<div style="float:left">
			<a href="page_des_composants.php">		
				<input type="submit" id="supprimer" value="Retour � la page des composants" />
			</a>
		</div> 
		<br />
		<br />
		<br />
		<br />
		
		<div id="conteneur2">
			
			<form method="post" action="traitement.php"> 
   				<div type="formulaire1">
   					<label for="composant">Composant</label><br /> 
       				<select name="type" id="compoasnt"> 
       					<option value="type">Type de composant</option> 
       					<option value="temperature">Capteur de temp�rature</option>
           				<option value="humidite">Capteur d'humidit�</option> 
           				<option value="presence">Capteur de pr�sence</option>
           				<option value="fumee">Capteur de fum�e</option>
           				<option value="lumiere">Capteur de luminosit�</option> 
           				<option value="pression">Capteur de pression</option>  
           			</select> 
  				 </div>
			</form>
			
			<br />
			<br />
			
			<form method="post" action="traitement.php"> 
   				<div type="formulaire1">
   					<label for="piece">Piece</label><br /> 
       				<select name="piece" id="piece"> 
       					<option value="Piece">Piece dans laquelle se trouve le composant</option> 
       					<option value="cuisine">Cuisine</option>
           				<option value="salon">Salon</option> 
           				<option value="sdb">Salle de bain</option>
           				<option value="sdb2">Salle de bain 2</option> 
           				<option value="chambre1">Chambre</option> 
           				<option value="chambre2">Chambre 2</option>
           				<option value="bureau">Bureau</option> 
           			</select> 
  				 </div>
			</form>
			
			<br />
			<br />
			
			<label for="nom capteur">Nom du capteur</label> 
			<input type="text"/>
			<br />
			
			<form  method="post" action="traitement.php">		<!-- début formulaire -->
				<div type="formulaire1">
					<h2>Param�tres</h2>
					<label for="seuil">Seuil</label>
						<input type="number" placeholder="Valeur minimale"/>
						<br />
						<br />
						<input type="number" placeholder="Valeur maximale"/>
				</div>
			</form>
			
			<br />
			<br />
			
			<input type="submit" value="Ajouter" />
		</div>
		<br />
		<br />
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
				Condition g�n�rales d'utilisation
			</a>
		</p>
		<p>
			<a href="mentions_legales.html">
				Mentions l�gales
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