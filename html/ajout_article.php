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
			
   							Nom du nouveau type
   							<br /> 
       						<input type="admin2" name="nom" placeholder="Nom du type de composant" required />
  				 		
						<br />
						<br />
						<br />
					
							Type du composant
							<select name="type" type="admin">
								<option value="capteur">Capteur</option>
								<option value="effecteur">Effecteur</option>
							
							</select>
			
						<br />
						<br />
						<br />
						
							Unit&eacute; (Uniquement s'il s'agit d'un capteur)
							<input type="admin2" name="unite" placeholder="Unit&eacute;" />
						
						<br />
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