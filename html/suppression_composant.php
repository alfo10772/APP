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
            require("en_tete_connexion.php");
        ?>
	</header>
	<article>
		<h1>Suppression d'un composant</h1>
		<?php 
       		include('../modele/config_init.php');
       	?>
       	<br>
		<div style="float:left">
			<a href="page_des_composants.php">		
				<input type="submit" id="retour" value="Retour &agrave; la page des composants" />
			</a>
		</div>
		
		<br />
		<br />
		<br />
		<br />
		<form method="post" action="../traitements/traitement_suppression_composant.php" enctype="multipart/form-data">
			<div id="conteneur2">
   				<div type="formulaire1">
   					<label for="composant">Nom du composant</label><br /> 
   					<br />
       				<select name="composant" id="composant"> 
       					<?php 
       					$id=$_SESSION['ID'];
       					$requeteuser = $bdd->query('SELECT * FROM utilisateur WHERE IDutilisateur= "'. $id. '" ');
       					$userdata=$requeteuser ->fetch();
       					$usertype = $userdata['type'];
       					if($usertype==1)
       					{
       					   $id_principal= $userdata['IDprincipal'];
       					}
       					if($usertype==0)
       					{
       					    $id_principal=$id;
       					}
       					$idmaison = $_SESSION['maisonselect'];
       					$piece = $_SESSION['piececomposant'];
       					$requetepiece = $bdd->query('SELECT piece.IDpiece, piece.IDmaison FROM piece JOIN maison ON (piece.IDmaison = maison.IDmaison) WHERE ( maison.IDutilisateur= "'. $id_principal .'" AND maison.selection = 1 AND piece.nom="'. $piece .'") ');
       					$piece = $requetepiece ->fetch();
       					$piece = $piece['IDpiece'];
       					$reponse = $bdd->query('SELECT * FROM capteur WHERE IDpiece = "'. $piece .'" ');
       					$reponse1 = $bdd->query('SELECT * FROM actionneur WHERE IDpiece = "'. $piece .'" ');
       					while ($donnees = $reponse->fetch())
       					{
       					?>
       						<option value="<?php echo $donnees['IDcapteur']."/".$donnees['type']; ?>"><?php echo $donnees['nom'] ?></option>
       					<?php
                        }
                        
                        while ($donnees1 = $reponse1->fetch())
       					{
       					?>
       						<option value="<?php echo $donnees1['IDactionneur']."/".$donnees1['type']; ?>"><?php echo $donnees1['nom'] ?></option>
       					<?php
                        }
                        ?>  
           			</select> 
  				 </div>
			<br />
			<br />
			<div style="float:left">
				<a href="#confirmation">		
					<input type="submit" id="supprimer" value="Supprimer" />
				</a>
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