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
       		$reponse = $bdd->query('SELECT piece.nom FROM piece JOIN maison ON (piece.IDmaison = maison.IDmaison) WHERE selection = 1');
       					
       		while ($donnees = $reponse->fetch())
       			{
       			    $nom=strval($donnees['nom']);
       			    $len=strlen($nom);
       			    if ($len<13)
       			    {
       		        ?>
						<div>
							<a href="../html/exemplepiece.php">	
							<div id=textecercle1>
								<?php echo $donnees['nom']?>
							</div>
							</a>
						</div>
					<?php 
			         }
			         if ($len>12 AND $len<27)
       			    {
       		        ?>
						<div>
							<a href="../html/exemplepiece.php">	
							<div id=textecercle2>
								<?php echo $donnees['nom']?>
							</div>
							</a>
						</div>
					<?php 
			         }
			         if ($len>26 AND $len<39)
			         {
			             ?>
						<div>
							<a href="../html/exemplepiece.php">	
							<div id=textecercle3>
								<?php echo $donnees['nom']?>
							</div>
							</a>
						</div>
					<?php
			         }
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