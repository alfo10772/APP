<?php
session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<link rel="stylesheet" href="../css/style.css">	
		<title>Nom piece</title>
	</head>

	<body>

		<header>
			<?php
        require("en_tete_connexion.php");
        	?>
		</header>
		
	<article>
		
		<h1>
		Nom de la pi�ce
        </h1>
		
		
		
		<div style="float:left">
			<a href="tableau_de_bord.php">		
				<input type="submit" id="retour" value="Retour � la page d'accueil" />
			</a>
		</div> 
		
		<div style="float:right">		
			<input type="submit" id="retour" value="Supprimer la piece" />
		</div>
				
		<div id="conteneurcercle">
			<div>Donn�es</div>
			<div>Donn�es</div>
			<div>Donn�es</div>
			<div>Donn�es</div>
			<div><font size="+4"><a href="ajout_composant.php">+</a></font></div>
		</div>
	
		
	</article>
	
	<footer>						<!--  d�but du bas de la page -->
		<?php
        require("footer.php");
        	?>
		
	</footer>