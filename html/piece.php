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
       				
		<br />
		
		<div style="float:left">
			<a href="tableau_de_bord.php">		
				<input type="submit" id="retour" value="Retour &agrave; la page d'accueil" />
			</a>
		</div> 
		
		<?php 
		if ($_SESSION['utilisateur']==0){
		    
		?>
		
		<div style="float:right">
			<a href="suppression_piece.php">		
				<input type="submit" id="retour" value="Supprimer une piece" />
				
			</a>
		</div>
		
		<?php 
		}
		?>
		<div id="conteneurcercle">
			<?php	
			
			$id=$_SESSION['ID'];
			$id_principal=$_SESSION['principal'];
			
			if($_SESSION['utilisateur']==1){
			    $reponse = $bdd->query('SELECT piece.nom, IDpiece FROM piece JOIN maison ON (piece.IDmaison = maison.IDmaison) WHERE maison.IDutilisateur= "'. $id_principal .'" AND maison.selection = 1');
			}
			else {
			    $reponse = $bdd->query('SELECT piece.nom, IDpiece FROM piece JOIN maison ON (piece.IDmaison = maison.IDmaison) WHERE maison.IDutilisateur= "'. $id .'" AND maison.selection = 1');
			}
       					
       		foreach ($reponse->fetchAll() as $donnees)
       			{
       			    
       		        ?>
       		        	<form action="../traitements/exemple_piece.php" method="post">
							<input type="hidden" name="id" value="<?php echo $donnees['IDpiece']?>">
							<input type="submit" id="bouton" name=<?php echo $donnees['IDpiece'] ?> value="<?php echo $donnees['nom']?>">
			
						</form>
						<?php 
       			}
			
       		if ($_SESSION['utilisateur']==0){
       			    
       	   ?>
			<div id="cercle">
				<a href="ajout_piece.php">
					<font size="+4"><div id=textecercle>+</div></font>
				</a>
			</div>
			
			<?php 
       		}
			?>
			
		</div>
	
		
	</article>
	
	<footer>						<!--  d&eacute;but du bas de la page -->
		<?php
            require("footer.php");
        ?>
	</footer>