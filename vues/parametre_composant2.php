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
            require("en_tete_connexion.php");       //Affiche le header
        ?>
	</header>
	<article>
	<h1>Param&eacute;trage des composants</h1>
	
	<br />
		<?php 
		include('../modele/config_init.php');     //Connexion � la BDD
       	?>
	
		<div style="float:left">

			<a href="../vues/parametre_composant1.php">		<!-- Bouton de retour � la page pr�c�dente -->
				<input type="submit" id="retour" value="Retour &agrave; la s&eacute;lection du composant" />
			</a>
		</div>
	<br>
	<br>
	<br>
	<br>
		<?php
		$id=$_SESSION['ID'];
		$piece = $_SESSION['piececomposant']; //R�cup�re le nom de la pi�ce s�lectionn�e dans le premier formulaire
		$composant = $_SESSION['composant'];  //R�cup�re le nom du composant s�lectionn�e dans le deuxi�me formulaire
		
		$reqidp = $bdd->query('SELECT piece.IDpiece FROM piece JOIN maison ON (piece.IDmaison = maison.IDmaison) WHERE piece.nom= "'. $piece .'" AND piece.IDutilisateur= "'. $id .'" AND maison.selection = 1');
		$piece=$reqidp->fetch();
		$piece= $piece['IDpiece'];
		//R�cup�re l'ID de la pi�ce
		
		$reqid1 = $bdd->query('SELECT actionneur.type, actionneur.IDactionneur FROM actionneur JOIN maison ON (actionneur.IDmaison = maison.IDmaison) WHERE actionneur.nom= "'. $composant .'" AND actionneur.IDutilisateur= "'. $id .'" AND actionneur.IDpiece = "'. $piece .'" AND maison.selection = 1');
		$compo=$reqid1->fetch();

		$idcompo= $compo['IDactionneur'];
		//Cherche l'ID du composant en fonction du nom, de la pi�ce et de la maison, dans la table actionneur

		?>
	 		<form action="../traitements/parametre_actionneur.php" method="post">	<!-- D�but du formulaire de param�tres pour un actionneur -->
		    	<div id="conteneur2">
		    		<label for="composant">S&eacute;lectionnez vos param&egrave;tres</label><br />
		    			<label for="heuredebut">Heure de d&eacute;but d'action</label>
		    			<input type="time" name="heuredebut">
		    			<br>
		    			<br>
		    			<label for="heurefin">Heure de fin d'action</label>
		    			<input type="time" name="heurefin">
		    			<br>
		    			<br>
		    			<input type="hidden" name="id" value=<?php echo $idcompo ?>>
		    			<input type="submit" id="supprimer" value="Confirmer" />	<!-- Bouton de validation -->
		    	</div>
		    </form>
	</article>
	<footer>
			<?php
                require("footer.php");      //Affichage du footer
            ?>
	</footer>
</body>
</html>