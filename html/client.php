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
       		   include('config_init.php');
       	    ?>
			<div class="contenu">
				<h1>Liste des clients</h1>
			
				<?php 
       					
       		        $reponse = $bdd->query('SELECT * FROM utilisateur');
       			?>	
       		        
       		    <table>
       		     	<tr>
       		       		<th>Nom</td>
       		        	<th>Adresse mail</td>
       		        	<th>Numéro de téléphone</td>
       		        </tr>
       		        
       		      <?php 
       		         while ($donnees = $reponse->fetch())
       		           {
       		       ?>
				
  					<tr>
     					<td><?php echo $donnees['nom'];?></td>
     					<td><?php echo $donnees['mail'];?></td>
     					<td><?php echo $donnees['numerodetelephone'];?></td>
  					</tr>
  					
  					<?php
                        }
                    ?>
  				</table>
			</div>
		</div>
		
	</body>
	
</html>
