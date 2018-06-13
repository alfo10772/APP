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
		include('../modele/config_init.php');     //Connexion à la BDD
       	?>
	
		<div style="float:left">
			<a href="../html/parametre_composant1.php">		<!-- Bouton de retour à la page précédente -->
				<input type="submit" id="retour" value="Retour &agrave; la s&eacute;lection du composant" />
			</a>
		</div>
	<br>
	<br>
	<br>
	<br>
		<?php
		$id=$_SESSION['ID'];
		$piece = $_SESSION['piececomposant']; //Récupère le nom de la pièce sélectionnée dans le premier formulaire
		$composant = $_SESSION['composant'];  //Récupère le nom du composant sélectionnée dans le deuxième formulaire
		
		$reqidp = $bdd->query('SELECT piece.IDpiece FROM piece JOIN maison ON (piece.IDmaison = maison.IDmaison) WHERE piece.nom= "'. $piece .'" AND piece.IDutilisateur= "'. $id .'" AND maison.selection = 1');
		$piece=$reqidp->fetch();
		$piece= $piece['IDpiece'];
		//Récupère l'ID de la pièce
		
		$reqid1 = $bdd->query('SELECT capteur.type, capteur.IDcapteur FROM capteur JOIN maison ON (capteur.IDmaison = maison.IDmaison) WHERE capteur.nom= "'. $composant .'" AND capteur.IDutilisateur= "'. $id .'" AND capteur.IDpiece = "'. $piece .'" AND maison.selection = 1');
		$compo=$reqid1->fetch();
		$idtype= $compo['type'];
		$idcompo= $compo['IDcapteur'];
		//Cherche l'ID et le type du composant en fonction du nom, de la pièce et de la maison, dans la table capteur
		
		if($idtype == NULL) //Si le type est NULL c'est que le composant n'a pas été trouvé dans la table capteur, c'est donc un actionneur
		
		{
		    $reqid1 = $bdd->query('SELECT actionneur.type, actionneur.IDactionneur FROM actionneur JOIN maison ON (actionneur.IDmaison = maison.IDmaison) WHERE actionneur.nom= "'. $composant .'" AND actionneur.IDutilisateur= "'. $id .'" AND actionneur.IDpiece = "'. $piece .'" AND maison.selection = 1');
		    $compo=$reqid1->fetch();
		    $idtype= $compo['type'];
		    $idcompo= $compo['IDactionneur'];
		    //Cherche l'ID et le type du composant en fonction du nom, de la pièce et de la maison, dans la table actionneur
		}
		
		if($idtype==0)    //Si le type est 0 alors c'est un capteur donc on affiche le formulaire pour les paramètres des capteurs
		{
		?>
			<form action="../traitements/parametre_capteur.php" method="post"> <!-- Début du formulaire de paramètres pour un capteur -->
				<div id="conteneur2">
					<label for="composant">S&eacute;lectionnez vos param&egrave;tres</label><br />
						<label for="valeurmin">Valeur minimale</label>
						<input type="number" name="valeurmin">
						<br>
						<br>
						<label for="valeurmin">Valeur maximale</label>
						<input type="number" name="valeurmax">
						<br>
						<br>
						<input type="hidden" name="id" value=<?php echo $idcompo ?>>
						<input type="submit" id="supprimer" value="Confirmer" />	<!-- Bouton de validation -->
				</div>
			</form>
						
		<?php
		}
		elseif($idtype==1)    //Si le type est 1 alors c'est un actionneur donc on affiche le formulaire pour les paramètres des actionneurs
		{
		?>
		    <form action="../traitements/parametre_actionneur.php" method="post">	<!-- Début du formulaire de paramètres pour un actionneur -->
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
		<?php
		}
		
		
		    ?>
	</article>
	<footer>
			<?php
                require("footer.php");      //Affichage du footer
            ?>
	</footer>
</body>
</html>