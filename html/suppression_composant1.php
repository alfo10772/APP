<!DOCTYPE html>

<html>

<head>

<meta charset="ISO-8859-1">

<link rel="stylesheet" href="../css/style.css">

<title>Suppression d'un composant</title>

</head>

<body>



	<header>

		<?php

            require("en_tete_connexion.php");

        ?>

	</header>

	<article>

		<h1>Suppression d'un composant</h1>

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

		<form method="post" action="../traitements/supp_composant1.php" enctype="multipart/form-data">

			<div id="conteneur2"> 

   				<div type="formulaire1">

   					<label for="piece">S&egrave;lectionnez la pi&egrave;ce dans laquelle vous voulez supprimer un composant</label><br />

   					<br />

       				<select name="piece" id="piece"> 

       					<?php

       					$idmaison = $_SESSION['maisonselect'];

       					$reponse = $bdd->query('SELECT * FROM piece WHERE IDmaison = "'. $idmaison .'" ');

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

</html>