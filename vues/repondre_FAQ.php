<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">

		<link rel="stylesheet" href="../css/style.css">		

		<title>FAQ</title>
	</head>
	
	<body>
		<div id="article2">
	
			<?php 
	          require("menu_admin.php");       //Affichage du menu de l'administrateur
	        ?>
			
			<?php 
       		   include('../modele/config_init.php');       //Connexion � la BDD
       	    ?>
  	
  			<div class="contenu">
 
				<h1 id="titre_FAQ">Modification de la FAQ</h1>
			
				<br/>	
 
 				<div id=conteneurtexte>
 
 					<form  method="post" action="../traitements/modif_FAQ.php">	<!-- D�but du formulaire -->
 						<div id="formulaire1">
 							<input type="admin" name="question" placeholder="Ecrire une question" >	
 							<!-- Texte ent�e par l'administration pour la question -->
 						</div>
 					
 					
 					<br/>
 					<br/>

 					
 						<div id="formulaire1">
 							<input type="admin" name="reponse" placeholder="Ecrire une reponse" >
 							<!-- Texte ent�e par l'administration pour la r�ponse de la question entr�e au dessus -->
 						</div>
 					
 					
 					<br/>
 					<br/>

 					
 						<div id="formulaire1">
 							<input type="submit" id="ajout" value="Enregistrer" />	<!-- Bouton de confirmation -->
 						</div>
 					</form>		<!-- Fin du formulaire -->
 					
 	  				<br/>
 	 				<br/>
 	 				<br/>
 	  
 	 			 </div>
 	 
 	 		</div>
  	 
  </body>
</html>