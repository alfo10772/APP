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
			<a href="page_des_composants.php">		<!-- Bouton de retour -->
				<input type="submit" id="retour" value="Retour &agrave; la page des composants" />
			</a>
		</div>
		
		<br />
		<br />
		<br />
		<br />
		<form method="post" action="../traitements/traitement_suppression_composant.php" enctype="multipart/form-data">		<!-- D�but du formulaire -->
			<div id="conteneur2">
   				<div type="formulaire1">
   					<label for="composant">Nom du composant</label><br /> 
   					<br />
       				<select name="composant" id="composant"> 	<!-- Meun d�roulant pour s�lectionner le compsant � supprimer -->
       					<?php 
       					$id=$_SESSION['ID'];
       					$requeteuser = $bdd->query('SELECT * FROM utilisateur WHERE IDutilisateur= "'. $id. '" ');      //R�cup�re les donn�es de l'utilisateur connect�
       					$userdata=$requeteuser ->fetch();
       					$usertype = $userdata['type'];      //R�cup�re le type de l'utilisateur
       					if($usertype==1)    //test si l'utilisateur est secondaire
       					{
       					   $id_principal= $userdata['IDprincipal'];     //R�cup�re l'ID de l'utilisateur principal qe l'utilisateur connect�
       					}
       					if($usertype==0)    //test si l'utilisateur est principal
       					{
       					    $id_principal=$id;      //la valeur $id_principal prend donc la valeur de l'ID de l'utilisateur connect�
       					}
       					$idmaison = $_SESSION['maisonselect'];
       					$piece = $_SESSION['piececomposant'];
       					$requetepiece = $bdd->query('SELECT piece.IDpiece, piece.IDmaison FROM piece JOIN maison ON (piece.IDmaison = maison.IDmaison) WHERE ( maison.IDutilisateur= "'. $id_principal .'" AND maison.selection = 1 AND piece.nom="'. $piece .'") ');
       					//Requ�te qui permet de r�cup�rer l'ID de la pi�ce qui a �t� s�lectionn�e dans le formulaire de la page pr�c�dente
       					$piece = $requetepiece ->fetch();
       					$piece = $piece['IDpiece'];
       					$reponse = $bdd->query('SELECT * FROM capteur WHERE IDpiece = "'. $piece .'" ');    //R�cup�re les donn�es de tous les cpateurs pr�sents dans la pi�ce s�lectionn�e
       					$reponse1 = $bdd->query('SELECT * FROM actionneur WHERE IDpiece = "'. $piece .'" ');    //R�cup�re les donn�es de tous les actionneurs pr�sents dans la pi�ce s�lectionn�e
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
			<div id="confirmation" style="display:none;">	<!-- bloc de confirmation de suppression d�s qu'on clique sur le bouton du dessous -->
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