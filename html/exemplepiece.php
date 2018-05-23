
<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<link rel="stylesheet" href="../css/style.css">	
		<title>Votre piece</title>
	</head>

	<body>

	<header>
			<?php
        require("en_tete_connexion.php");
        	?>
	</header>
		
	<article>
		
		<?php 
		include('../modele/config_init.php');
       	?>
		
		<h1>
		<?php 
		  echo $_SESSION['nompiece'];
		?>
        </h1>
        
		
		<div style="float:left">
			<a href="piece.php">		
				<input type="submit" id="retour" value="Retour &agrave; la page des pi&egrave;ces" />
			</a>
		</div> 
		

				
		<div id="conteneurcercle">
			<?php 
			$reponse = $bdd->query('SELECT composant.nom FROM piece JOIN composant ON (piece.IDpiece = composant.IDpiece) WHERE composant.IDpiece = "'.$_SESSION['idpiece'].'"');
			
			foreach ($reponse->fetchAll() as $donnees)
			{
			?>
			
			<input type="submit" id="bouton" name=<?php echo $donnees['nom'] ?> value="<?php echo $donnees['nom']?>">
						
			<?php 
			}
			?>
			<div><div id=textecercle><font size="+4"><a href="ajout_composant.php">+</a></font></div></div>
		</div>
	
		
	</article>
	
	<footer>						
		<?php
        require("footer.php");
        	?>
		
	</footer>