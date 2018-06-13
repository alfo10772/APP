<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">

<link rel="stylesheet" href="../css/style.css">

<title>Suppression d'un composant</title>

</head>

<body>



	<header>

		<?php

            require("en_tete_connexion.php");       //Affichage du header

        ?>

	</header>

	<article>

		<h1>Suppression d'un composant</h1>

		<?php 

       		include('../modele/config_init.php');      //Connexion � la BDD
       	?>

       	<br>

		<div style="float:left">

			<a href="page_des_composants.php">		<!-- Bouton de retour � la page des composants -->

				<input type="submit" id="retour" value="Retour &agrave; la page des composants" />

			</a>

		</div>

		

		<br />

		<br />

		<br />

		<br />

		<form method="post" action="../traitements/supp_composant1.php" enctype="multipart/form-data">		<!-- D�but du formulaire -->

			<div id="conteneur2"> 

   				<div type="formulaire1">

   					<label for="piece">S&egrave;lectionnez la pi&egrave;ce dans laquelle vous voulez supprimer un composant</label><br />

   					<br />

       				<select name="piece" id="piece"> 	<!-- Menu d�roulant pour choisir la pi�ce dans laquelle l'utilisateur souhaite supprimer un composant -->

       					<?php
       					$id=$_SESSION['ID'];
       					$reponse = $bdd->query('SELECT piece.nom FROM piece JOIN maison ON (piece.IDmaison = maison.IDmaison) WHERE maison.selection = 1 AND maison.IDutilisateur= "'. $id .'" ');
                        //S&lection du nom des pi�ces de la maison s�lectionn�e
       					while ($donnees = $reponse->fetch())

       					{

       					?>

       						<option value="<?php echo $donnees['nom']; ?>"><?php echo $donnees['nom'] ?></option>

       					<?php

                        }

                        ?> 

           			</select> 

  				 </div>

			<div style="float:left">

			<br />

			<br />

			<br />
					<input type="submit" id="supprimer" value="Confirmer" />	<!-- Bouton de confirmation -->
			</div>

		</div>

		</form>		<!-- Fin du formulaire -->

	</article>

	<footer>

			<?php

                require("footer.php");      //Affichage du footer

            ?>

	</footer>

</body>

</html>