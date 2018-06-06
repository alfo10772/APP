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

		<div id="conteneurparametre">

		<form  method="post" action="../traitements/traitement_parametres.php">

		
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
			Affichage dans le tableau de bord :
			<br />
			<br />
			<br />
			<?php
			
			$liste_capteur = $bdd->query('SELECT nom FROM typecomposant WHERE type = 0');
			
			foreach ($liste_capteur->fetchAll() as $capt) {
			    echo $capt[0];
			    ?>
			    <br />
			    <?php 
			    $pieces = $bdd -> query('SELECT piece.nom FROM capteur JOIN piece ON (piece.IDpiece = capteur.IDpiece) WHERE nomtype = "'.$capt[0].'"');
			    ?>
			    
			    <input type="checkbox" name="case2" />En moyenne
			    
			    <?php 
			    foreach ($pieces -> fetchAll() as $piece) {
			        ?>
			        
			        <input type="checkbox" name="case2"/><?php echo $piece['nom']; ?>
			        <br />
			        
			        <?php 
			    }
			    ?>
			    <br />
			    <hr width="100%">
			    <br />
			    <?php 
			    //$reponse = $bdd->query('SELECT * FROM capteur WHERE nomtype = "'.$capt[0].'"');
			    //$capteur = $reponse->fetchAll();
			    //var_dump($capteur);
			   
			}
			
			//$reponse = $bdd->query('SELECT * FROM capteur JOIN typecomposant ON (capteur.nomtype=typecomposant.nom) WHERE type = 0');
			
			/*while ($donnees = $reponse->fetch())
			{

				$user[$i] = $donnees['nom'];
				$idtyp[$i] = $donnees['IDtypeComposant'];
				$i++;
				
			}
			$incr = "affichage0";
			for ($j = 0,$size = count($user);$j<$size;$j++)
			{
			//echo implode (" ",$user[$j]);
			echo $user[$j];
			?>
			<select multiple name="<?php echo ++$incr ?>[]" size='4'>
			<option value="NULL"> Ne pas afficher </option>
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
			} */
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

