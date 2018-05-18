<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">

		<link rel="stylesheet" href="../css/style.css">		

		<title>Ajout type de composant</title>
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
			
				<br />
				
				<h1>Ajout d'un nouveau type de composant</h1>
				<br />
				<br />
				<br />
				
				<div id="conteneurarticle">
					<form method="post" action="../traitements/ajout_article.php" enctype="multipart/form-data"> 
			
						<br />	
			
   						<div type="formulaire1">
   							Nom du nouveau type
   							<br /> 
       						<input type="admin2" name="nom" placeholder="Nom du type de composant" id="nom" />
  				 		</div>
			
						<br />
						<br />
						
						<div type="formulaire1">
							Type du composant
							<select name="type" type="admin">
								<option value="capteur">Capteur</option>
								<option value="effecteur">Effecteur</option>
							
							</select>
						
						</div>
			
						<br />
						<br />
						
						<input type="submit" id="ajout" value="Ajouter" />
			
						<br />
			
					</form>
				
				</div>
			</div>
		</div>
	</body>
</html>