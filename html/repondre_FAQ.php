<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">

		<link rel="stylesheet" href="../css/style.css">		

		<title>edition de la FAQ</title>
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
 
				<h1 id="titre_FAQ">Modification de la FAQ</h1>
			
				<br/>	
 
 				<div id=conteneurtexte>
 
 					<form  method="post" action="../traitements/modif_FAQ.php">
 						<div id="formulaire1">
 							<input type="admin" name="question" placeholder="Ecrire une question" >
 							
 						</div>
 					
 					
 					<br/>
 					<br/>

 					
 						<div id="formulaire1">
 							<input type="admin" name="reponse" placeholder="Ecrire une reponse" >
 							
 						</div>
 					
 					
 					<br/>
 					<br/>

 					
 						<div id="formulaire1">
 							<input type="submit" id="ajout" value="Enregistrer" />
 						</div>
 					</form>
 					
 	  				<br/>
 	 				<br/>
 	 				<br/>
 	  
 	 			 </div>
 	 
 	 		</div>
  	 
  </body>
</html>