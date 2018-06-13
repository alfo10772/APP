<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">

		<link rel="stylesheet" href="../css/style.css">		<!--  lien vers style -->
		<title>Suppression d'une maison</title>
	</head>
	
	<body>
		<header>
			<?php
        require("en_tete_connexion.php");
        	?>
		</header>
		
	<article>
	
	<h1>Suppression d'une maison</h1>
	
	<?php 
       		include('../modele/config_init.php');
       	?>
       	
	<div style="float:left;width:250px;height:10px;">
			<a href="maison.php">		
				<input type="submit" id="retour" value="Retour &agrave; la page des maisons" />
			</a>
		</div>
	
	<br/> 
	<br/>
	<br/>
	
	<div id="conteneur2">
	
		<form action="../traitements/suppression_maison.php" method="post">
			<div type=formulaire1>
			        Nom:
			        <br />
			        <select name="nom_maison">
			        
			        	<?php 
       					
			        	$id=$_SESSION['ID'];
			        	
       					$reponse = $bdd->query('SELECT * FROM maison WHERE IDutilisateur = "'. $id .'"');
       					
       					while ($donnees = $reponse->fetch())
       					{
       					?>
                    		<option value ="<?php echo $donnees['IDmaison']; ?>"><?php echo $donnees['nom'] ?></option>
                    	<?php 
       					}
                    	?>
                    
                    </select>
              </div> 
              
              <br/>
              <br/>
                    
              <input type="submit" id="supprimer" value="Supprimer" />
              
              <br/>
              <br/>
              
              <input type="submit" id="supprimer" value="Annuler" />
              
         </form>
                    
       </div>
       
   		<br/>
   		<br/>
    
     
    
	
	</article>
	<footer>						<!--  début du bas de la page -->
		<?php
            require("footer.php");
        ?>
	</footer>
	</body>
	</html>