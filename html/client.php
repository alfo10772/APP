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
				<h1>Liste des clients</h1>
				<br />
			
				<?php 
       					
       		        $reponse = $bdd->query('SELECT * FROM utilisateur WHERE type != 2');
       			?>	
       		  
       		    <table>
       		     	<tr>
       		       		<th id="nom2">Nom</th>
       		        	<th id="adresse">Adresse mail</th>
       		        	<th id="tel">Num&eacute;ro de t&eacute;l&eacute;phone</th>

       		        </tr>
       		        
       		      <?php 
       		        foreach ($reponse->fetchAll() as $donnees) {
       		           
       		       ?>
				<form action="../traitements/suppression_client.php" method="post"> 
  					<tr>
     					<td id="nom2"><?php echo $donnees['nom'];?></td>
     					<td id="adresse"><?php echo $donnees['mail'];?></td>
     					<td id="tel"><?php echo $donnees['numerodetelephone'];?></td>
     					<input type="hidden" name="id" value=<?php echo $donnees['IDutilisateur'] ?>></input>
     					<td><input type="submit" id="admin" name=<?php echo $donnees['IDutilisateur'];?> value="Supprimer le client" /></td>

     				</tr>
  				</form> 
  					<?php
                        }
                    ?>
  				</table>
  			 
			</div>
		</div>
		
	</body>
	
</html>
