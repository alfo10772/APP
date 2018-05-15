<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<link rel="stylesheet" href="../css/style.css">	
		<title>Ajout_piece</title>
	</head>

	<body>

		<header>
			<?php
        require("en_tete_connexion.php");
        	?>
		</header>

	<article>
		
		<h1>Ajout d'une pi&egrave;ce</h1>
		
		<?php 
       		include('config_init.php');
       	?>
       				
		<div style="float:left">
			<a href="piece.php">		
				<input type="submit" id="retour" value="Retour &agrave; la page des pi&egrave;ces" />
			</a>
		</div> 
		
		<br />
		<br />
		<br />
		<br />
		
		<div id="conteneur2">
			
			<form method="post" action="traitementpiece.php" enctype="multipart/form-data"> 
			
			<br />
			<br />
			
			
   				<div type="formulaire1">
   					<label for="piece">
   						Type
   					</label>
   					<br /> 
       				<input type="text" name="nom" placeholder="Nom de la pi&egrave;ce" id="nom" />
  				 </div>
			
			
			<br />
			<br />
			
			<input type="submit" id="supprimer" value="Ajouter" />
			
			<br />
			<br />
			
			</form>
			
			<input type="submit" id="supprimer" value="Annuler" />
		</div>
		
	</article>
		
	<footer>						<!--  d&eacute;but du bas de la page -->
		<p>
			<a href="faq.html">		<!--  lien vers la FAQ -->
				<strong>
					FAQ
				</strong>
			</a>
		</p>
		<p>
			<a href="condition_d'utilisation.html">		<!--  lien vers les conditions d'utilisations -->
				Condition g&eacute;n&eacute;rales d'utilisation
			</a>
		</p>
		<p>
			<a href="mentions_legales.html">			<!--  lien vers les mentions l&eacute;gales -->
				Mentions l&eacute;gales
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
