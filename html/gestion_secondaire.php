<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../css/style.css">	
		<title>G&eacute;rer les utilisateurs secondaires</title>
	</head>

	<body>

		<header>
			<?php
        require("en_tete_connexion.php");
        	?>
		</header>
		
	<article>
		
		<h1>G&eacute;rer les utilisateurs secondaires</h1>
		<br>
		<br>
		<?php 
		            include('../modele/config_init.php');
		            $id=$_SESSION['ID'];
		            $reponse = $bdd->query('SELECT * FROM utilisateur WHERE (type = 1 AND IDprincipal = "'. $id .'")');
       			?>	
       		  
       		    <table id="secondaire">
       		     	<tr>
       		       		<th id="nom">Nom</th>
       		        	<th id="mail">Adresse mail</th>
       		        	<th id="changer">Type</th>

       		        </tr>
       		        
       		      <?php 
       		        foreach ($reponse->fetchAll() as $donnees) {
       		           
       		       ?>
       				<form method="post" action="../traitements/gestion_secondaire.php">
  					<tr>
     					<td id="changer"><?php echo $donnees['nom'];?></td>
     					<td id="changer"><?php echo $donnees['mail'];?></td>
     					<td id="changer">
     						<input type="submit" id="supprimer" value="Devenir utilisateur principal" /> 
     						<input type="hidden" name="type" value="<?php echo $donnees['IDutilisateur'];?>">
     					</td>
     				</tr>
  					</form> 
  					<?php
                        }
                    ?>
  				</table>
       	
       	
	
	</article>
	
	
	<footer>						<!--  d&eacute;but du bas de la page -->
		<?php
            require("footer.php");
        ?>
	</footer>