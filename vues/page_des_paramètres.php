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
        require("en_tete_connexion.php");       //Affichage du header
        	?>
        </header>
        
    <article>

        <h1>Param&egrave;tres du tableau de bord<h1>

			  <?php 
       		include('../modele/config_init.php');      //Connexion à la BDD
       	?>
		
		<br />
		
		<div id="conteneurparametre">

		<form  method="post" action="../traitements/parametres_tdb.php">	<!-- Début du formulare -->
			Maison principale:
			        
			<br />
			<select name="nommaison">	<!-- Menu déroulant pour choisir la maison -->
			
				<?php 
				$reponse = $bdd->query('SELECT nom FROM maison WHERE IDutilisateur = "'. $id .'"');     //R&cupère les maisons de l'utilisateur connecté			
       					
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
			//Sélectionne le nom et l'ID des pièces de la maison sélectionnée
			foreach ($pieces -> fetchAll() as $piece) {
			    
			    ?>
			    <br />
			    <h3><?php echo $piece[0]; ?></h3>	<!-- Affiche le nom de la pièce -->
			    
			    <br />
			    <?php 
			    $liste_capteur = $bdd->query('SELECT capteur.nomtype FROM capteur JOIN piece ON piece.IDpiece = capteur.IDpiece WHERE piece.IDpiece = "'.$piece[1].'"');
			    // Sélectionne les noms des types de capteurs présents dans la pièce
			    foreach ($liste_capteur -> fetchAll() as $capt) {
			        $valeur = $bdd -> query('SELECT IDcapteur FROM capteur JOIN piece ON piece.IDpiece = capteur.IDpiece WHERE capteur.nomtype="'.$capt['nomtype'].'" AND piece.IDpiece = "'.$piece[1].'"');
			        // Récupère l'ID des capteurs de la pièce
			        $val = $valeur -> fetchAll();
			        ?>
			        
			        <label><input type="checkbox" name="checkbox[]" value=<?php echo $val[0]['IDcapteur'];?>><?php echo " " . $capt['nomtype']; ?></label>
			        <!-- Checkbox pour que l'utilisateur sélectonne les types de capteurs de la pièce qu'il veut ajouter sur le Tableau de Bord -->
			        <br />
			        
			        <?php 
			    }
			    $liste_actionneur = $bdd -> query('SELECT actionneur.nomtype FROM actionneur JOIN piece ON piece.IDpiece = actionneur.IDpiece WHERE piece.IDpiece = "'.$piece[1].'"');
			    
			    foreach ($liste_actionneur -> fetchAll() as $action) {
			        $valeur2 = $bdd -> query('SELECT IDactionneur FROM actionneur JOIN piece ON piece.IDpiece = actionneur.IDpiece WHERE actionneur.nomtype="'.$action['nomtype'].'" AND piece.IDpiece = "'.$piece[1].'"');
			        // Récupère l'ID des actionneurs de la pièce
			        $val2 = $valeur2 -> fetchAll();
			        ?>
			        
			        <label><input type="checkbox" name="checkbox2[]" value=<?php echo $val2[0]['IDactionneur'];?>><?php echo " " . $action['nomtype']; ?></label>
			        <!-- Checkbox pour que l'utilisateur sélectonne les types d'actionneurs de la pièce qu'il veut ajouter sur le Tableau de Bord -->
			        <br />
			        
			        <?php 
			    }
			    ?>
			    
			    <br />
			    <?php 
			    
			}
			?>
		<input type="submit" value="Enregistrer les modifications" />		<!-- Bouton de confirmation -->
		</form>		<!-- Fin du formulaire -->
		</div>
					

	</article>
	

    <footer>
			<?php
                require("footer.php");      //Affichage du footer
            ?>
	</footer>
</body>

