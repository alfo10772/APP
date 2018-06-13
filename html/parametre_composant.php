<!DOCTYPE html>
<html>                                                  
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/style.css">
	<title>Param&eacute;trage des composants</title>
</head>
<body>

	<header>
		<?php
            require("en_tete_connexion.php");       //Affichage du header
        ?>
	</header>
	<article>
	<h1>Param&eacute;trage des composants</h1>
	
	<br />
		<?php 
		include('../modele/config_init.php');     //Connexion à la BDD
       	?>
	
		<div style="float:left">
			<a href="page_des_composants.php">		<!-- Bouton de retour -->
				<input type="submit" id="retour" value="Retour &agrave; la page des composants" />
			</a>
		</div>
	<br>
	<br>
	<br>
	<br>
	<form action="../traitements/parametre_composant.php" method="post">		<!-- début du formulaire -->
	<div id="conteneur2">
		<label for="composant">  S&eacute;lectionnez la pi&egrave;ce dans laquelle vous voulez param&eacute;trer un composant</label><br /> 
   		<select name="piece" id="piece">	<!-- menu déroulant pour sélectionner la pièce -->

       					<?php
       					$id=$_SESSION['ID'];
       					$reponse = $bdd->query('SELECT piece.nom FROM piece JOIN maison ON (piece.IDmaison = maison.IDmaison) WHERE maison.selection = 1 AND piece.IDutilisateur = "'. $id .'"');
       					//Sélectionne les pièces de la maison sélectionnée uniquement
       					while ($donnees = $reponse->fetch())
       					{
       					?>
       						<option value="<?php echo $donnees['nom']; ?>"><?php echo $donnees['nom'] ?></option>
       					<?php
                        }
                        ?> 
           			</select> 

			<div style="float:left">
			<br />
			<br />
			<br />
					<input type="submit" id="supprimer" value="Confirmer" />		<!-- Bouton de confirmation -->
			</div>
    </div>
    </form>
	</article>
	<footer>
			<?php
                require("footer.php");      //Affichage du footer
            ?>
	</footer>
</body>