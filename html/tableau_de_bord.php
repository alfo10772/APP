<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../css/style.css">
	<title>Tableau de bord</title>
</head>
<body>
	<header>
	<?php
        require("en_tete_connexion.php");
	?>
	
	</header>
	
	<article>
	
	<h1>Tableau de bord</h1>
	
	<div id="bandeau">
		
		
	<div id="conteneurcercle">
			<div>
			    <a href="maison.html">	
			    	Maisons	
				</a>
		</div> 
			<div>
			<a href="piece.php">		
				Pièces
			</a>
		</div>
			
			<div>
			<a href="page des composants.html">		
				Composants
			</a>
		</div>
		
    </div>
		
	
	
	</article>
	<section>
	
	</section>	
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
			<div id="afficherheure"></div>
<script type="text/javascript">
setInterval(function(){
    document.getElementById('afficherheure').innerHTML = new Date().toLocaleTimeString();
}, 1000);
</script>
		</div>
	</footer>
</body>
