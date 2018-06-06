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
			<a href="../html/parametre_composant1.php">		
				<input type="submit" id="retour" value="Retour &agrave; la s&eacute;lection du composant" />
			</a>
		</div>
	<br>
	<br>
	<br>
	<br>
		<?php
		$id=$_SESSION['ID'];
		$idmaison = $_SESSION['maisonselect'];
		$piece = $_SESSION['piececomposant'];
		$composant = $_SESSION['composant'];
		
		
		$reqid1 = $bdd->query('SELECT type FROM capteur WHERE nom= "'. $composant .'" AND IDutilisateur= "'. $id .'" AND IDpiece = "'. $piece .'" ');
		$idtype=$reqid1->fetch();
		$idtype1= $idtype['type'];
		var_dump($idtype1);
		
		if($idtype == NULL)
		
		{
		    $reqid1 = $bdd->query('SELECT type FROM actionneur WHERE nom= "'. $composant .'" AND IDutilisateur= "'. $id .'" AND IDpiece = "'. $piece .'"');
		    $idtype=$reqid1->fetch();
		    $idtype= $idtype['type'];
		}
		if($idtype==0)
		{
		?>
			<form action="../traitements/parametre_capteur.php" method="post">
				<div id="conteneur2">
					<label for="composant">S&eacute;lectionnez vos param&egrave;tres</label><br />
						<label for="valeurmin">Valeur minimale</label>
						<input type="number" name="valeurmax">
						<br>
						<br>
						<label for="valeurmin">Valeur maximale</label>
						<input type="number" name="valeurmax">
						<br>
						<br>
						<input type="submit" id="supprimer" value="Confirmer" />
				</div>
			</form>
						
		<?php
		}
		elseif($idtype==1)
		{
		?>
		    <form action="../traitements/parametre_actionneur.php" method="post">
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
		    			<input type="submit" id="supprimer" value="Confirmer" />
		    	</div>
		    </form>
		<?php
		}
		
		
		    ?>
       	<div style="float:left">

			<br />

			<br />

			<br />
		</div>
	</article>
	<footer>
			<?php
                require("footer.php");
            ?>
	</footer>
</body>
</html>