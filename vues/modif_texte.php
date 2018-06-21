<!DOCTYPE html>
<html>
	<head>
 		<meta charset="utf-8">
   
    	<link rel="stylesheet" href="../css/style.css">		<!--  lien vers style -->

 		<title>Modifier les textes</title>				<!--  titre de la page -->
	</head>
 
 	<body>	

 		<div id="article2">
	
			<?php 
	          require("menu_admin.php");       //Ajout menu vertical 
	        ?>
			
			<?php 
       		   include('../modele/config_init.php');       //Connexion à la bdd
       	    ?>
  	
  			<div class="contenu">
 
				<h1>Modification des textes</h1>
			
				<br/>	
 
 				<div id=conteneurtexte>
 
 					<form  method="post" action="../traitements/modif_texte.php">		<!--  Début du formualire  -->
 						<div id="formulaire1">
 							<input type="admin" name="presentation" placeholder="Modifier le texte de pr&eacute;sentation de l'entreprise" > 	<!--  Zone pour modifier le texte de présentation  -->
 							<br/>
 							<br/>
 							<input type="submit" id="ajout" value="Enregistrer" />
 	
 						</div>
 					
 					
 					<br/>
 					<br/>

 					
 						<div id="formulaire1">
 							<input type="admin" name="cgu" placeholder="Modifier les conditions gÃ©nÃ©rales d'utilisation" >		<!--  Zone pour modifier les CGU  -->
 							<br/>
 							<br/>
 							<input type="submit" id="ajout" value="Enregistrer" />		<!--  Envoi du formulaire  -->
 						</div>
 					</form>
 					
 	  				<br/>
 	 				<br/>
 	 				<br/>
 	  
 	 			 </div>
 	 
 	 		</div>
  	 
  </body>
</html>
	
