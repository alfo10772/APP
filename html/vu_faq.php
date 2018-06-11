<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">

		<link rel="stylesheet" href="../css/style.css">		

		<title>Liste des clients</title>
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
				<h1>Liste des questions de votre FAQ</h1>
				<br />
				
				<?php 
       		        $reponse = $bdd->query('SELECT * FROM reponse');
       			?>	
       			
       			<table>
       		     	<tr>
       		       		<th>Questions</th>
       		        	<th>R&eacute;ponses</th>
       		        </tr>
       		        
       		        <?php 
       		        foreach ($reponse->fetchAll() as $donnees) {
       		        ?>
       		        
       		        <form action="../traitements/suppression_faq.php" method="post"> 
  						<tr>
     						<td><?php echo $donnees['question'];?></td>
     						<td><?php echo $donnees['reponse'];?></td>
     						<input type="hidden" name="idquestion" value=<?php echo $donnees['ID'] ?>></input>
     						<td><input type="submit" id="admin" name=<?php echo $donnees['ID'];?> value="Supprimer la question" /></td>
     					</tr>
  					</form>
  					
  					<?php
                        }
                    ?>
  				</table>
  				
  				<br />
  				<br />
  				 
    			<a href="repondre_FAQ.php">		
    				<input type="submit" id="ajout" value="Ajouter une nouvelle question" />
    			</a>
  			 
			</div>
		</div>
		
	</body>
	
</html>
  					