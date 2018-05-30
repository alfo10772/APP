<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<link rel="stylesheet" href="../css/style.css">	
		<title>Piece</title>
	</head>

	<body>

		<header>
			<?php
        require("en_tete_connexion.php");
        	?>
		</header>
		
	<article>
		
		<h1>Page des pi&egrave;ces</h1>
		
		<?php 
       		include('../modele/config_init.php');
       	?>
       				
		
		<div style="float:left">
			<a href="tableau_de_bord.php">		
				<input type="submit" id="retour" value="Retour &agrave; la page d'accueil" />
			</a>
		</div> 
		
		<div style="float:right">
			<a href="suppression_piece.php">		
				<input type="submit" id="retour" value="Supprimer une piece" />
				
			</a>
		</div>
		
		<div id="conteneurcercle">
			<?php
			$id=$_SESSION['ID'];
			$reponse = $bdd->query('SELECT piece.nom, IDpiece FROM piece JOIN maison ON (piece.IDmaison = maison.IDmaison) WHERE (selection = 1 AND piece.IDutilisateur = "'. $id .'") ');
       					
       		foreach ($reponse->fetchAll() as $donnees)
       			{
       			    
       		        ?>
       		        	<form action="../traitements/exemple_piece.php" method="post">
							<input type="hidden" name="id" value="<?php echo $donnees['IDpiece']?>">
							<input type="submit" id="bouton" name=<?php echo $donnees['IDpiece'] ?> value="<?php echo $donnees['nom']?>">
			
						</form>
						<?php 
       			}
			?>
			<div><div id=textecercle><font size="+4"><a href="ajout_piece.php">+</a></font></div></div>
		</div>
	
		
	</article>
	
	<footer>						<!--  d&eacute;but du bas de la page -->
		<?php
            require("footer.php");
        ?>
	</footer>