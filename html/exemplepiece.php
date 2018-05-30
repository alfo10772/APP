
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
			$reponse = $bdd->query('SELECT capteur.nom FROM piece JOIN capteur ON (piece.IDpiece = capteur.IDpiece) WHERE capteur.IDpiece = "'.$_SESSION['idpiece'].'"');
			$reponse2 = $bdd->query('SELECT actionneur.nom FROM piece JOIN actionneur ON (piece.IDpiece = actionneur.IDpiece) WHERE actionneur.IDpiece = "'.$_SESSION['idpiece'].'"');
			foreach ($reponse->fetchAll() as $donnees)
			{
			?>
			
			<input type="submit" id="bouton" name=<?php echo $donnees['nom'] ?> value="<?php echo $donnees['nom']?>">
						
			<?php 
			}
			foreach ($reponse2->fetchAll() as $donnees2)
			{
			?>
			<input type="submit" id="bouton" name=<?php echo $donnees2['nom'] ?> value="<?php echo $donnees2['nom']?>">
						
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
</body>
</html>