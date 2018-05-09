<?php
session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<link rel="stylesheet" href="../css/style.css">	
		<title>Mes informations</title>
	</head>
	
	<body>

		<header>
			<?php
                require("en_tete_connexion.php");
	       ?>
		</header>

		<article>
		
			<h1>Mes informations</h1>
			
			<br />
			
			<div id="conteneur2">
				<?php 
				    require('traitementinfo.php')
				?>
				<font size="+1">Nom : <?php echo $nom; ?>
                </font>
				<br />
				<font size="+1">Type de l'utilisateur : <?php echo $type; ?>
				</font>
				<br />
				<font size="+1">Adresse mail :  <?php echo $mail; ?>
				</font>
				<br />
				<font size="+1">Numéro de téléphone :  <?php echo $_tel; ?>
				</font>
				<br />
				<font size="+1">Photo :</font>
			
				<a href="modif_info.php">
					<input type="submit" value="Modifier mes informations" />
				</a>
			
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
				Conditions générales d'utilisation
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
	
	</body>
</html>