<!DOCTYPE html>
<html>                                                  <!--squelette pour en-tête et bas de page -->
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/style.css">
	<title>Page d'ajout de composant</title>
</head>
<body>

	<header>
		<?php
            require("en_tete_connexion.php");
        ?>
	</header>

	<article>
		
		<h1>Ajout d'un composant</h1>
		
		<?php 
       		include('config_init.php');
       	?>
		
		<div style="float:left">
			<a href="page_des_composants.php">		
				<input type="submit" id="supprimer" value="Retour &agrave; la page des composants" />
			</a>
		</div> 
		<br />
		<br />
		<br />
		<br />
		
		<div id="conteneur2">
			<form method="post" action="traitement_composant.php" enctype="multipart/form-data"> 
   				<div type="formulaire1">
   					<label for="type">Composant</label><br /> 
       				<select name="type" id="type"> 
       					<option value="temperature">Capteur de temp&eacute;rature</option>
           				<option value="humidite">Capteur d'humidit&eacute;</option> 
           				<option value="presence">Capteur de pr&eacute;sence</option>
           				<option value="fumee">Capteur de fum&eacute;e</option>
           				<option value="lumiere">Capteur de luminosit&eacute;</option> 
           				<option value="pression">Capteur de pression</option>  
           			</select> 
  				 </div>
				<br />
				<br />
   				<div type="formulaire1">
   					<label for="piece">Piece</label><br /> 
       				<select name="piece" id="piece"> 
       					<?php 
       					$reponse = $bdd->query('SELECT * FROM piece');
       					while ($donnees = $reponse->fetch())
       					{
       					?>
       						<option value="<?php echo $donnees['nom']; ?>"><?php echo $donnees['nom'] ?></option>
       					<?php
                        }
                        ?> 
           			</select> 
  				</div>
				<br />
				<br />			
				<label for="nom">Nom du capteur</label> 
				<input type="text" name="nom"/>
				<br />
				<div type="formulaire1">
					<h2>Param&egrave;tres</h2>
					<label for="seuil">Seuil</label>
						<input type="number" name="valeurmin" placeholder="Valeur minimale"/>
						<br />
						<br />
						<input type="number" name="valeurmax" placeholder="Valeur maximale"/>
				</div>
			
				<br />
				<br />
			
				<input type="submit" value="Ajouter" />
			</form>
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
				Condition g&eacute;n&eacute;rales d'utilisation
			</a>
		</p>
		<p>
			<a href="mentions_legales.html">
				Mentions l&eacute;gales
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