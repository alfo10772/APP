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
	          require("menu_admin.php");
	        ?>
			
			<?php 
       		   include('../modele/config_init.php');
       	    ?>
  	
  			<div class="contenu">
 
				<h1>Modification des textes</h1>
			
				<br/>	
 
 				<div id=conteneurtexte>
 
 					<form  method="post" action=".php">
 						<div id="formulaire1">
 							<input type="admin" placeholder="Modifier le texte de pr&eacute;sentation de l'entreprise" >
 							<br/>
 							<br/>
 							<input type="submit2" value="Enregistrer" />
 	
 						</div>
 					</form>
 					
 					<br/>
 					<br/>

 					<form  method="post" action=".php">
 						<div id="formulaire1">
 							<input type="admin" placeholder="Modifier les conditions générales d'utilisation" >
 							<br/>
 							<br/>
 							<input type="submit2" value="Enregistrer" />
 						</div>
 					</form>
 					
 	  				<br/>
 	 				<br/>
 	 				<br/>
 	  
 	 			 </div>
 	 
 	 		</div>
  	 
  </body>
</html>
	
