<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">

		<link rel="stylesheet" href="../css/style.css">		<!--  lien vers style -->
		<title>Suppression d'une maison</title>
	</head>
	
	<body>
		<header>
			<?php
        require("en_tete_connexion.php");       //Affichage du header
        	?>
		</header>
		
	<article>
	
	<h1>Suppression d'une maison</h1>
	
	<?php 
       		include('../modele/config_init.php');      //Connexion à la BDD
       	?>
    <br>	
	<div style="float:left;width:250px;height:10px;">
			<a href="maison.php">		<!-- Bouton de retour -->
				<input type="submit" id="retour" value="Retour &agrave; la page des maisons" />
			</a>
		</div>
	
	<br/> 
	<br/>
	<br/>
	
	<div id="conteneur2">
	
		<form action="../traitements/suppression_maison.php" method="post">		<!-- Début du formulaire -->
			<div type=formulaire1>
			        Nom:
			        <br />
			        <select name="nom_maison">		<!-- Menu déroulant pour choisir la maison à supprimer -->
			        
			        	<?php 
       					
			        	$id=$_SESSION['ID'];
			        	
       					$reponse = $bdd->query('SELECT * FROM maison WHERE IDutilisateur = "'. $id .'"');       //Sélectionne les toutes les maisons de l'utilisateur connecté
       					
       					while ($donnees = $reponse->fetch())
       					{
       					?>
                    		<option value ="<?php echo $donnees['IDmaison']; ?>"><?php echo $donnees['nom'] ?></option>
                    	<?php 
       					}
                    	?>
                    
                    </select>
              </div> 
              
              <br/>
              <br/>
                    
              <input type="button" onclick="toggle_div(this,'confirmation');" id="supprimer" value="Supprimer" />		<!-- Bouton de confirmation pour la suppression -->
              
              <br/>
              <br/>
              
              <div id="confirmation" style="display:none;">		<!-- bloc de confirmation de suppression dès qu'on clique sur le bouton du dessous -->
              		<hr width="100%">
              		<p><font size="+1">Etes-vous sûr de vouloir supprimer cette maison ?</font></p>
              		<div id="suppression">
              			<input type="submit" id="suppression" value="Oui" />	<!-- Bouton de confirmation -->
              			<a href="maison.php">
              				<input type="button" id="suppression" value="Non" />	<!-- Bouton d'annulation -->
              			</a>
              			
              		</div>
              		
              </div>
              
              <br/>
              <br/>
              
         </form>		<!-- Fin du formulaire -->
                    
       </div>
       
   		<br/>
   		<br/>
    
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