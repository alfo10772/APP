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
       		include('config_init.php');
       	?>
       	
	<div style="float:left;width:250px;height:10px;">
			<a href="maison.php">		
				<input type="submit" id="supprimer" value="Retour &agrave; la page des maisons" />
			</a>
		</div>
	
	<br/> 
	<br/>
	<br/>
	
	<div id="conteneur2">
	
		<form action="traitement_suppression_maison.php" method="post">
			<div type=formulaire1>
			        Nom:
			        <br />
			        <select name="nom_maison">
			        
			        	<?php 
       					
       					$reponse = $bdd->query('SELECT * FROM maison');
       					
       					while ($donnees = $reponse->fetch())
       					{
       					?>
                    		<option value ="<?php echo $donnees['nom']; ?>"><?php echo $donnees['nom'] ?></option>
                    	<?php 
       					}
                    	?>
                    
                    </select>
              </div> 
              
              <br/>
              <br/>
                    
              <input type="submit" id="supprimer" value="Supprimer" />
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