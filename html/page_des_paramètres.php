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

		<form  method="post" action="../traitements/parametres_tdb.php">	
			Maison principale:
			        
			<br />
			<select name="nommaison">
			
				<?php 
				$reponse = $bdd->query('SELECT nom FROM maison WHERE IDutilisateur = "'. $id .'"');       			
       					
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
			<h4>Pour s&eacute;lectionner les composants d'une autre maison, veuillez changer la s&eacute;lection dans l'onglet maison du tableau de bord</h4>
			
				
			<?php
			$pieces = $bdd -> query('SELECT piece.nom, piece.IDpiece FROM piece JOIN maison ON piece.IDmaison = maison.IDmaison WHERE piece.IDutilisateur= "'. $id .'" AND selection = 1');
			
			foreach ($pieces -> fetchAll() as $piece) {
			    
			    ?>
			    <br />
			    <h3><?php echo $piece[0]; ?></h3>
			    
			    <br />
			    <?php 
			    $liste_capteur = $bdd->query('SELECT capteur.nomtype FROM capteur JOIN piece ON piece.IDpiece = capteur.IDpiece WHERE piece.IDpiece = "'.$piece[1].'"');
			    
			    foreach ($liste_capteur -> fetchAll() as $capt) {
			        $valeur = $bdd -> query('SELECT IDcapteur FROM capteur JOIN piece ON piece.IDpiece = capteur.IDpiece WHERE capteur.nomtype="'.$capt['nomtype'].'" AND piece.IDpiece = "'.$piece[1].'"');
			        $val = $valeur -> fetchAll();
			        ?>
			        
			        <label><input type="checkbox" name="checkbox[]" value=<?php echo $val[0]['IDcapteur'];?>><?php echo " " . $capt['nomtype']; ?></label>
			        <br />
			        
			        <?php 
			    }
			    $liste_actionneur = $bdd -> query('SELECT actionneur.nomtype FROM actionneur JOIN piece ON piece.IDpiece = actionneur.IDpiece WHERE piece.IDpiece = "'.$piece[1].'"');
			    
			    foreach ($liste_actionneur -> fetchAll() as $action) {
			        $valeur2 = $bdd -> query('SELECT IDactionneur FROM actionneur JOIN piece ON piece.IDpiece = actionneur.IDpiece WHERE actionneur.nomtype="'.$action['nomtype'].'" AND piece.IDpiece = "'.$piece[1].'"');
			        $val2 = $valeur2 -> fetchAll();
			        ?>
			        
			        <label><input type="checkbox" name="checkbox2[]" value=<?php echo $val2[0]['IDactionneur'];?>><?php echo " " . $action['nomtype']; ?></label>
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

