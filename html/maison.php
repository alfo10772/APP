<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<link rel="stylesheet" href="../css/style.css">	
		<title>Page des maisons</title>
	</head>
	
	<body>
		<header>
			<?php
        require("en_tete_connexion.php");
        	?>
		</header>
		
		<article>
		
		<h1>Page des maisons</h1>
		
		<?php 
       		include('config_init.php');
       	?>
       				
		<div style="float:left">
			<a href="tableau_de_bord.php">		
				<input type="submit" id="supprimer" value="Retour &agrave; la page d'accueil" />
			</a>
		</div> 
		
		<div style="float:right">
			<a href="suppression_maison.php">		
				<input type="submit" id="supprimer" value="Supprimer une maison" />
				
			</a>
		</div>
		
		<br/>
        <br/>
        <br/>
        
		<h2> Cliquez sur une maison pour la sélectionner </h2>
        
		<div id="conteneurcercle">
			<?php 
       					
       		$reponse = $bdd->query('SELECT * FROM maison');
       					
       		while ($donnees = $reponse->fetch())
       			{
       		?>
       		
			<div><?php echo $donnees['nom']?></div>
			
			<?php 
       			}
			?>
			<div><font size="+4"><a href="ajout_maison.php">+</a></font></div>
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
				Conditions g&eacute;n&eacute;rales d'utilisation
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


	</body>
</html>