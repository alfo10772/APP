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
       		include('../modele/config_init.php');      //Connexion à la BDD
       	?>
       	<br>
		<div style="float:left">
			<a href="page_des_composants.php">		<!-- Bouton de retour -->
				<input type="submit" id="retour" value="Retour &agrave; la page des composants" />
			</a>
		</div>
		
		<br />
		<br />
		<br />
		<br />
		<form method="post" action="../traitements/traitement_suppression_composant.php" enctype="multipart/form-data">		<!-- Début du formulaire -->
			<div id="conteneur2">
   				<div type="formulaire1">
   					<label for="composant">Nom du composant</label><br /> 
   					<br />
       				<select name="composant" id="composant"> 	<!-- Meun déroulant pour sélectionner le compsant à supprimer -->
       					<?php 
       					$id=$_SESSION['ID'];
       					$requeteuser = $bdd->query('SELECT * FROM utilisateur WHERE IDutilisateur= "'. $id. '" ');      //Récupère les données de l'utilisateur connecté
       					$userdata=$requeteuser ->fetch();
       					$usertype = $userdata['type'];      //Récupère le type de l'utilisateur
       					if($usertype==1)    //test si l'utilisateur est secondaire
       					{
       					   $id_principal= $userdata['IDprincipal'];     //Récupère l'ID de l'utilisateur principal qe l'utilisateur connecté
       					}
       					if($usertype==0)    //test si l'utilisateur est principal
       					{
       					    $id_principal=$id;      //la valeur $id_principal prend donc la valeur de l'ID de l'utilisateur connecté
       					}
       					$idmaison = $_SESSION['maisonselect'];
       					$piece = $_SESSION['piececomposant'];
       					$requetepiece = $bdd->query('SELECT piece.IDpiece, piece.IDmaison FROM piece JOIN maison ON (piece.IDmaison = maison.IDmaison) WHERE ( maison.IDutilisateur= "'. $id_principal .'" AND maison.selection = 1 AND piece.nom="'. $piece .'") ');
       					//Requête qui permet de récupérer l'ID de la pièce qui a été sélectionnée dans le formulaire de la page précédente
       					$piece = $requetepiece ->fetch();
       					$piece = $piece['IDpiece'];
       					$reponse = $bdd->query('SELECT * FROM capteur WHERE IDpiece = "'. $piece .'" ');    //Récupère les données de tous les cpateurs présents dans la pièce sélectionnée
       					$reponse1 = $bdd->query('SELECT * FROM actionneur WHERE IDpiece = "'. $piece .'" ');    //Récupère les données de tous les actionneurs présents dans la pièce sélectionnée
       					while ($donnees = $reponse->fetch())
       					{
       					?>
       						<option value="<?php echo $donnees['IDcapteur']."/".$donnees['type']; ?>"><?php echo $donnees['nom'] ?></option>	<!-- Affichage des capteurs -->
       					<?php
                        }
                        
                        while ($donnees1 = $reponse1->fetch())
       					{
       					?>
       						<option value="<?php echo $donnees1['IDactionneur']."/".$donnees1['type']; ?>"><?php echo $donnees1['nom'] ?></option>	<!-- Affichage des actionneurs -->
       					<?php
                        }
                        ?>  
           			</select> 
  				 </div>
			<br />
			<br />
			<div style="float:left">		
					<input type="button" onclick="toggle_div(this,'confirmation');" id="supprimer" value="Supprimer" />		<!-- Bouton de confirmation du formulaire -->
			</div>
			<br>
			<div id="confirmation" style="display:none;">	<!-- bloc de confirmation de suppression dès qu'on clique sur le bouton du dessous -->
              		<hr width="100%">
              		<p><font size="+1">Etes-vous s&ucirc;r de vouloir supprimer ce composant ?</font></p>
              		<div id="suppression">
              			<input type="submit" id="suppression" value="Oui" />	<!-- Bouton de confirmation -->
              			<a href="maison.php">
              				<input type="button" id="suppression" value="Non" />	<!-- Bouton d'annulation -->
              			</a>
              			
              		</div>
              		
              </div>
		</div>
		</form>		<!-- Fin du formulaire -->
		
		<script type="text/javascript" src="../javascript/affichage_bloc.js">	<!-- lien du fichier javascript -->
		</script>
		
	</article>
	<footer>
			<?php
			require("footer.php");      //Affichage du footer
            ?>
	</footer>
</body>
</html>