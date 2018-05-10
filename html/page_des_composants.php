<!DOCTYPE html>
<html>                                                  <!--squelette pour en-tête et bas de page -->
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/style.css">
	<title>page des composants</title>
</head>
<body>

	<header>
		<?php
            require("en_tete_connexion.php");
        ?>
	</header>
	<article>
	<h1>Page des composants</h1>
	
		<?php 
       		include('config_init.php');
       	?>
	
		<div style="float:left">
			<a href="tableau_de_bord.php">		
				<input type="submit" id="supprimer" value="Retour &agrave; la page d'accueil" />
			</a>
		</div> 
		
		<div style="float:right">
			<a href="suppression_composant.php">		
				<input type="submit" id="supprimer" value="Supprimer un composant"> 
			</a>
		</div>

	<div id="conteneurcercle">
		<?php 			
       		$reponse = $bdd->query('SELECT * FROM composant');		
       		while ($donnees = $reponse->fetch())
       			{
       	?>
				<div><?php echo $donnees['nom'] ?></div>
		<?php
                }
        ?>
		<div>
		<a href="ajout_composant.php">
			<font size="+4">+</font>
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
	</footer>
</body>