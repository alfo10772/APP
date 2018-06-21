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
	          require("menu_admin.php");       //Ajout du menu vertical
	        ?>
			
			<?php 
       		   include('../modele/config_init.php');       //Connexion à la bdd
       	    ?>
			<div class="contenu">
				<h1>Liste des composants propos&eacute;s</h1>
				<br />
				
				
				<?php 
       					
       		        $reponse = $bdd->query('SELECT * FROM typecomposant');
       			?>	
       			
       			<table>			<!--  Création d'un tableau avec le type du composant, son nom et l'unite -->
       				<tr>
       		       		<th><p>Composant</p></th>
       		       		<th><p>Type du composant</p></th>
       		       		<th><p>Unite</p></th>
       		       	</tr>
       		       	
       		    
       		       	<?php 
       		        foreach ($reponse->fetchAll() as $donnees) {
       		        ?>
       		        
				<form action="../traitements/suppression_article.php" method="post"> 		<!--  Formulaire qui permet de supprimer un composant -->
  					<tr>
     					<td><?php echo $donnees['nom'];?></td>
     					<td><?php 
     					if($donnees['type']==0) {
     					    echo '<p>Capteur</p>';
     					}
     					else{
     					    echo '<p>Actionneur</p>';
     					}
     					?></td>
     					<td><?php echo $donnees['unite'];?>
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
