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
			<a href="../html/parametre_composant.php">		
				<input type="submit" id="retour" value="Retour &agrave; la s&eacute;lection de la pi&egrave;ce" />
			</a>
		</div>
	<br>
	<br>
	<br>
	<br>
	<form action="../traitements/parametre_composant1.php" method="post">
	<div id="conteneur2">
		<label for="composant">S&eacute;lectionnez le composant que vous voulez param&eacute;trer</label><br /> 
		<select name="composant" id="composant"> 
		<?php
		$id=$_SESSION['ID'];
		$idmaison = $_SESSION['maisonselect'];
		$piece = $_SESSION['piececomposant'];
		$requetepiece = $bdd->query('SELECT IDpiece FROM piece WHERE (nom="'. $piece .'" AND IDutilisateur= "'. $id .'" AND IDmaison = "'. $idmaison .'") ');
		$piece = $requetepiece ->fetch();
		$piece = $piece['IDpiece'];
		$reponse = $bdd->query('SELECT * FROM capteur WHERE IDpiece = "'. $piece .'" ');
		$reponse1 = $bdd->query('SELECT * FROM actionneur WHERE IDpiece = "'. $piece .'" ');
		while ($donnees = $reponse->fetch())
		{
		    ?>
       			<option value="<?php echo $donnees['nom']; ?>"><?php echo $donnees['nom'] ?></option>
       		<?php
                }
        while ($donnees1 = $reponse1->fetch())
        {
       		?>
       			<option value="<?php echo $donnees1['nom']; ?>"><?php echo $donnees1['nom'] ?></option>
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