<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<link rel="stylesheet" href="../css/style.css">	
		<title>Ajout_piece</title>
	</head>

	<body>

		<header>
			<?php
        require("en_tete_connexion.php");
        	?>
		</header>

	<article>
		
		<h1>Ajout d'une pi&egrave;ce</h1>
		
		<?php 
       		include('config_init.php');
       	?>
       				
		<div style="float:left">
			<a href="piece.php">		
				<input type="submit" id="supprimer" value="Retour &agrave; la page des pi&egrave;ces" />
			</a>
		</div> 
		
		<br />
		<br />
		<br />
		<br />
		
		<div id="conteneur2">
			
			<form method="post" action="traitementpiece.php" enctype="multipart/form-data"> 
   				
   				<div type="formulaire1">
   					<label for="maison">Maison</label><br /> 
       				<select name="maison" id="maison"> 
       					<?php 
       					
       					$reponse = $bdd->query('SELECT * FROM maison');
       					
       					while ($donnees = $reponse->fetch())
       					{
       					?>
       						<option value="<?php echo $donnees['nom']; ?>"><?php echo $donnees['nom'] ?></option>
       					<?php
                        }
                        ?>
					</select>
       					
  				 </div>
			
			
			<br />
			<br />
			
			
   				<div type="formulaire1">
   					<label for="piece">
   						Type
   					</label>
   					<br /> 
       				<input type="text" name="nom" placeholder="Nom de la pi&egrave;ce" id="nom" />
  				 </div>
			
			
			<br />
			<br />
			
			<input type="submit" value="Ajouter" />
			
			</form>
		</div>
		
	</article>
		
	<footer>						<!--  d&eacute;but du bas de la page -->
		<?php
            require("footer.php");
        ?>
	</footer>
