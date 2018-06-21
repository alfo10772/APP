<!DOCTYPE html>
<html>                                                  
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/style.css">
	<title>Page d'ajout de composant</title>
</head>
<body>

	<header>											<!--  Ajout du header  -->
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
		
		<div style="float:left">
			<a href="page_des_composants.php">		
				<input type="submit" id="retour" value="Retour &agrave; la page des composants" />
			</a>
		</div> 
		<br />
		<br />
		<br />
		<br />
																	<!--  Début du formulaire d'ajout d'un composant -->
		<div id="conteneur2">
			<form method="post" action="../traitements/ajout_composant.php" enctype="multipart/form-data"> 
   				<div type="formulaire1">
   					<label for="type">Type de composant</label><br /> 		<!--  Sélection du type du composant en fonction des types existants -->
       				<select name="type" id="type"> 
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
				<label for="nom">Nom du composant</label> 			<!--  Zone d'ajout du nom  -->
				<input type="text" name="nom"/>
				<br />
				<br />
				<br />
				<input type="submit" value="Ajouter" />			<!--  Envoi du formulaire -->
			</form>
		</div>
		<br />
		<br />
		
	</article>
	
	<footer>									<!--  Ajout du footer-->
			<?php
                require("footer.php");
            ?>
	</footer>
</body>