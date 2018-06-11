<!DOCTYPE html>
<html>                                                  <!--squelette pour en-tête et bas de page -->
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/style.css">
	<title>Param&eacute;trage des composants</title>
</head>
<body>

	<header>
		<?php
            require("en_tete_connexion.php");
        ?>
	</header>
	<article>
	<h1>Param&eacute;trage des composants</h1>
	
	<br />
		<?php 
		include('../modele/config_init.php');
       	?>
	
		<div style="float:left">
			<a href="page_des_composants.php">		
				<input type="submit" id="retour" value="Retour &agrave; la page des composants" />
			</a>
		</div>
	<br>
	<br>
	<br>
	<br>
	<form action="../traitements/parametre_composant.php" method="post">
	<div id="conteneur2">
		<label for="composant">  S&eacute;lectionnez la pi&egrave;ce dans laquelle vous voulez param&eacute;trer un composant</label><br /> 
   		<select name="piece" id="piece"> 

       					<?php
       					$reponse = $bdd->query('SELECT piece.nom FROM piece JOIN maison ON (piece.IDmaison = maison.IDmaison) WHERE maison.selection = 1 ');
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
					<input type="submit" id="supprimer" value="Confirmer" />
			</div>
    </div>
    </form>
	</article>
	<footer>
			<?php
                require("footer.php");
            ?>
	</footer>
</body>