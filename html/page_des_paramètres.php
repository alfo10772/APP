<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<link rel="stylesheet" href="../css/style.css">	
		<title>Param&egrave;tres</title>
	</head>

	<body>
	
		<header>
			<?php
        require("en_tete_connexion.php");
        	?>
        </header>
        
    <article>
          <h1>Param&egrave;tres du tableau de bord<h1>

			  <?php 
       		include('../modele/config_init.php');
       	?>

		<div id="conteneur2">

		<form  method="post" action="traitement_parametres.php">

		<div type="formulaire1">
			        Maison principale:
			        
			        
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
			<br />
			<br />
			Affichage dans le tableau de bord
			<br />
			<br />
			<?php
			$reponse = $bdd->query('SELECT * FROM type_capteur');
			$user = array();
			$i = 0;
			while ($donnees = $reponse->fetch())
			{

				$user[$i] = array($donnees['nom']);
				$i++;
				
			}
			$incr = "affichage0";
			for ($j = 0,$size = count($user);$j<$size;$j++)
			{
			echo implode (" ",$user[$j]);
			?>
			<select name="<?php echo ++$incr ?>">
			<option value="moyenne"> En moyenne </option>
			<?php 
       					
       					$reponse = $bdd->query('SELECT * FROM piece');
       					
       					while ($donnees = $reponse->fetch())
       					{
       					?>
                    		<option value ="<?php echo $donnees['nom']; ?>"><?php echo $donnees['nom'] ?></option>
                    	<?php 
       					}
                    	?>      
            </select> 
			<?php
			} 
			?>     
        </div>  
		<input type="submit" value="Enregistrer les modifications" />
		</form>
		</div>
					

	</article>
	

    <footer>
			<?php
                require("footer.php");
            ?>
	</footer>
</body>

