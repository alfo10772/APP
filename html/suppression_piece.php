<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">

		<link rel="stylesheet" href="../css/style.css">		<!--  lien vers style -->




<title>Suppression d'une pi&egrave;ce</title>
</head>
	<body>
	
		<header>
			<?php
        require("en_tete_connexion.php");       //Affichage du header
        	?>	
		</header>
		
	<article>
	
    
	<h1>Suppression d'une piece	</h1>
	
		<?php 
       		include('../modele/config_init.php');      //Connexion à la BDD
       	?>
       	
	<div style="float:left;width:250px;height:10px;">	
			<a href="piece.php">		
				<input type="submit" id="retour" value="Retour &agrave; la page des pi&egrave;ces" />	<!-- Bouton de retour -->
			</a>
		</div>
	
	<br/> 
	<br/>
	<br/>
	
	
	<div id="conteneur2">
		<br/>
		<br/>
	
		<form action="../traitements/suppression_piece.php" method="post"> 	<!-- Début du formulaire -->
		             
             
			        Piece :
			        <br />
			        <select name="nom_piece">	<!-- Menu déroulant pour sélectionner la pièce à supprimer -->
			        
                   <?php 
       					
       					$reponse = $bdd->query('SELECT piece.nom, piece.IDpiece FROM piece JOIN maison on maison.IDmaison = piece.IDmaison WHERE maison.selection = 1 AND piece.IDutilisateur = "'. $id .'"');
   					    //Sélectionne toutes les pièces de la maison sélectionnée
       					while ($donnees = $reponse->fetch())
       					{
       					?>
       						<option value="<?php echo $donnees['IDpiece']; ?>"><?php echo $donnees['nom'] ?></option>
       					<?php
                        }
                    ?>
                
                    </select>
                    
                    <br/>
                    <br/>
                    
                    <input type="button" onclick="toggle_div(this,'confirmation');" id="supprimer" value="Supprimer" />		<!-- Bouton de confirmation du formulaire -->
                    
                    <br/>
             		<br/>
              
              		<div id="confirmation" style="display:none;">	<!-- bloc de confirmation de suppression dès qu'on clique sur le bouton du dessous -->
              			<hr width="100%">
              			<p><font size="+1">Etes-vous sûr de vouloir supprimer cette pièce ?</font></p>
              			<div id="suppression">
              				<input type="submit" id="suppression" value="Oui" />	<!-- Bouton de confirmation -->
              				<a href="piece.php">
              					<input type="button" id="suppression" value="Non" />	<!-- Bouton d'annulation -->
              				</a>
              			</div>
            		</div>
		</form>	<!-- Fin du formulaire -->
     </div>
      
     <br/>
     <br/>
	
	 <script type="text/javascript" src="../javascript/affichage_bloc.js">		<!-- lien du fichier javascript -->
	 </script>
	 
	 
	</article>
	<footer>						<!--  dÃ©but du bas de la page -->
		<?php
		require("footer.php");       //Affichage du footer
        ?>
	</footer>
	</body>
	</html>