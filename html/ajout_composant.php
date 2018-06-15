<!DOCTYPE html>
<html>                                                  
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/style.css">
	<title>Page d'ajout de composant</title>
</head>
<body>
																<!--  Ajout du header -->
	<header>
		<?php
            require("en_tete_connexion.php");
        ?>
	</header>

	<article>
		
		<h1>Ajout d'un composant</h1>
																<!--  Connexion à la bdd -->
		<?php 
       		include('../modele/config_init.php');
       	?>
		<br>
		<div style="float:left">
			<a href="page_des_composants.php">		
				<input type="submit" id="retour" value="Retour &agrave; la page des composants" />
			</a>
		</div> 
		<br />
		<br />
		<br />
		<br />
																<!--  Début du formulaire -->
		<div id="conteneur2">
			<form method="post" action="../traitements/traitement_composant.php" enctype="multipart/form-data"> 
   				<div type="formulaire1">
   					<label for="type">Type de composant</label><br /> 
       				<select name="type" id="type"> 									<!--  Sélection du type du composant en fonction des types existants -->
       					<?php
       					$id=$_SESSION['ID'];
       					$reponse = $bdd->query('SELECT * FROM typeComposant');
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
   					<label for="piece">Piece</label><br /> 
       				<select name="piece" id="piece"> 								<!--  Sélection de la piece en fonction des piece existantes dans la maison -->
       					<?php 
       					$reponse = $bdd->query('SELECT piece.nom FROM piece JOIN maison ON (piece.IDmaison = maison.IDmaison )WHERE piece.IDutilisateur= "'. $id .'" AND maison.selection = 1');
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
				<label for="nom">Nom du composant</label> 							<!--  Zone pour entrer le nom du composant -->
				<input type="text" name="nom"/>
				<br />
				<br />
			
				<input type="submit" value="Ajouter" />								<!--  Envoie du formulaire -->
			</form>
		</div>
		<br />
		<br />
		
	</article>
	
	<footer>														<!--  Ajout du footer -->
			<?php
                require("footer.php");
            ?>
	</footer>
</body>