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
       		<form action="traitement_suppression_client.php" method="post">   
       		    <table>
       		     	<tr>
       		       		<th>Nom</th>
       		        	<th>Adresse mail</th>
       		        	<th>Numéro de téléphone</th>

       		        </tr>
       		        
       		      <?php 
       		        $compt=0;
       		        while ($donnees = $reponse->fetch())
       		           {
       		       ?>
				
  					<tr>
     					<td><?php echo $donnees['nom'];?></td>
     					<td><?php echo $donnees['mail'];?></td>
     					<td><?php echo $donnees['numerodetelephone'];?></td>
     					<td><input type="submit" name=<?php echo $compt;?> value="Supprimer le client" /></td>
     					<td><input type="hidden" name="compt" value="<?php echo $compt;?>" /></td>
     					<td><?php echo $compt;?></td>
     					<?php 
     					  $compt+=1;
     					?>
  					</tr>
  					
  					<?php
                        }
                    ?>
  				</table>
  			</form>  
			</div>
		</div>
		
	</body>
	
</html>
