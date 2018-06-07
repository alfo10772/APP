<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<link rel="stylesheet" href="../css/parametre.css">	
		<title>Param&egrave;tres</title>
	</head>

	<body>
	
		<header>
			<?php
        require("en_tete_connexion.php");
        	?>
        </header>
        
    <article>
    	<br />
        <h1>Param&egrave;tres du tableau de bord<h1>

			  <?php 
       		include('../modele/config_init.php');
       	?>
		
		<br />
		
		<div id="conteneurparametre">

		<form  method="post" action="../traitements/traitement_parametres.php">	
			Maison principale:
			        
			<br />
			<select name="nom_maison">
				<?php 
       					
       			$reponse = $bdd->query('SELECT * FROM maison');
       					
       			while ($donnees = $reponse->fetch()){
       				?>
                   	<option value ="<?php echo $donnees['nom']; ?>"><?php echo $donnees['nom'] ?></option>
                    <?php 
       			}
                ?>
                    
            </select>
			<br />
			<br />
			<hr width="100%">
			<br />
			<h2>Affichage dans le tableau de bord :</h2>
			<br />		
			<?php
			
			$liste_capteur = $bdd->query('SELECT nom FROM typecomposant WHERE type = 0');
			
			
			foreach ($liste_capteur->fetchAll() as $capt) {
			    ?><h3><?php echo $capt[0]; ?></h3>
			    <br />
			    <?php 
			    $pieces = $bdd -> query('SELECT piece.nom FROM capteur JOIN piece ON (piece.IDpiece = capteur.IDpiece) WHERE nomtype = "'.$capt[0].'"');
			    ?>
			    
			    <label><input type="checkbox" /> En moyenne</label>
			    <br />
			    <?php 
			    foreach ($pieces -> fetchAll() as $piece) {
			        ?>
			        
			        <label><input type="checkbox" /><?php echo $piece['nom']; ?></label>
			        <br />
			        
			        <?php 
			    }
			    ?>
			    
			    <br />
			    
			    <?php 			   
			}
			?>
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

