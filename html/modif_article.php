<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">

		<link rel="stylesheet" href="../css/style.css">		

		<title>Composants propos&eacute;s</title>
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
				<h1>Liste des composants propos&eacute;s</h1>
				<br />
				
				
				<?php 
       					
       		        $reponse = $bdd->query('SELECT * FROM typecomposant');
       			?>	
       			
       			<table>
       				<tr>
       		       		<th><p>Composant</p></th>
       		       		<th><p>Type du composant</p></tr>
       		       	</tr>
       		       	
       		    
       		       	<?php 
       		        foreach ($reponse->fetchAll() as $donnees) {
       		        ?>
       		        
				<form action="../traitements/suppression_article.php" method="post"> 
  					<tr>
     					<td><?php echo $donnees['nom'];?></td>
     					<td><?php 
     					if($donnees['type']==0) {
     					    echo '<p>Capteur</p>';
     					}
     					else{
     					    echo '<p>Effecteur</p>';
     					}
     					?></td>
     					<input type="hidden" name="id" value=<?php echo $donnees['IDtypeComposant'] ?>></input>
     					<td><input type="submit" id="admin" name=<?php echo $donnees['IDtypeComposant'];?> value="Supprimer ce type de composant" /></td>
       		  		</tr>
  				</form> 
  					<?php
                        }
                    ?>
  				</table>
  			
  				<br />
  				<br />
  				 
    			<a href="ajout_article.php">		
    				<input type="submit" id="ajout" value="Ajouter un nouveau type" />
    			</a>
    			  			
  		</div>
  	</div>
  </body>
</html>
