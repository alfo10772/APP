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
	<a href="maisons.html">
	
			
			</a>
			<br>
			<br>
			<br />
			<br />
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
			<div id="afficherheure"></div>
<script type="text/javascript">
setInterval(function(){
    document.getElementById('afficherheure').innerHTML = new Date().toLocaleTimeString();
}, 1000);
</script>
		</div>
	</footer>
</body>