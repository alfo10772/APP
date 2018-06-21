<!DOCTYPE html>
<html>                                                  <!--squelette pour en-t�te et bas de page -->
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
		include('../modele/config_init.php');     //Connexion � la BDD
       	?>
	
		<div style="float:left">
			<a href="../vues/parametre_composant.php">		
				<input type="submit" id="retour" value="Retour &agrave; la s&eacute;lection de la pi&egrave;ce" />
				<!-- Bouton de retour � la page pr�c�dente -->
			</a>
		</div>
	<br>
	<br>
	<br>
	<br>
	<form action="../traitements/parametre_composant1.php" method="post">		<!-- D�but du formulaire -->
	<div id="conteneur2">
		<label for="composant">S&eacute;lectionnez le composant que vous voulez param&eacute;trer</label><br /> 
		<select name="composant" id="composant">		<!-- Menu d�roulant pour s�lectionner un composant � param�trer -->
		<?php
		$id=$_SESSION['ID'];
		$piece = $_SESSION['piececomposant'];     //r�cup�re la valeur du nom de la pi�ce qui a �t� s�lectionn�e dans la page pr�c�dente
		$requetepiece = $bdd->query('SELECT piece.IDpiece FROM piece JOIN maison ON (piece.IDmaison = maison.IDmaison) WHERE (piece.nom="'. $piece .'" AND piece.IDutilisateur= "'. $id .'" AND maison.selection=1) '); //requ�te qui permet de retrouver l'ID de la pi�ce
		$piece = $requetepiece ->fetch();
		$piece = $piece['IDpiece'];
		$reponse = $bdd->query('SELECT * FROM capteur WHERE IDpiece = "'. $piece .'" ');  //S�lectionne tous les capteurs pr�sents dans la pi�ce s�lectionn�e
		$reponse1 = $bdd->query('SELECT * FROM actionneur WHERE IDpiece = "'. $piece .'" ');  //S�lectionne tous les actionneurs pr�sents dans la pi�ce s�lectionn�e
		while ($donnees = $reponse->fetch())
		{
		    ?>
       			<option value="<?php echo $donnees['nom']; ?>"><?php echo $donnees['nom'] ?></option>
       		<?php
                }
        //Affiche tous les capteurs de la pi�ce
        while ($donnees1 = $reponse1->fetch())
        {
       		?>
       			<option value="<?php echo $donnees1['nom']; ?>"><?php echo $donnees1['nom'] ?></option>
       		<?php
        }
        //Affiche tous les actionneurs de la pi�ce
            ?>
       	</select>
       	<div style="float:left">

			<br />

			<br />

			<br />

				

					<input type="submit" id="supprimer" value="Confirmer" />	<!-- Bouton de confirmation du formulaire -->

				

			</div>
    </div>
    </form>		<!-- Fin du formulaire -->
	</article>
	<footer>
			<?php
                require("footer.php");      //Affiche le footer
            ?>
	</footer>
</body>