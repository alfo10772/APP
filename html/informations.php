

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
			
			<div style="float:left">
				<a href="tableau_de_bord.php">		
					<input type="submit" id="retour" value="Retour &agrave; la page d'accueil" />
				</a>
			</div> 
			
			<br />
			<br />
			<br />
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
				<font size="+1">Num&eacute;ro de t&eacute;l&eacute;phone :  <?php echo $_tel; ?>
				</font>
				<br />
				<font size="+1">Photo :</font>
			
				<a href="modif_info.php">
					<input type="submit" id="supprimer" value="Modifier mes informations" />
				</a>
			
			</div>
			
		</article>

		<footer>						<!--  d&eacute;but du bas de la page -->
			<?php
                require("footer.php");
            ?>
		</footer>
	</body>
</html>