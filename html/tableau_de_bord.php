<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../css/style.css">
	<title>Tableau de bord</title>
</head>
<body>
	<header>
	<?php
        require("en_tete_connexion.php");
	?>
	
	</header>
	
	<article>
	
	<h1>Tableau de bord</h1>
	
	<?php 
       		include('../modele/config_init.php');
     
       	
     if ($_SESSION['utilisateur']==0){
       		    
     ?>
     <div style="float:right">
		<a href="gestion_secondaire.php">		
			<input type="submit" id="second" value="G&eacute;rer les utilisateurs secondaires" />
		</a>
	</div>
	
	<?php 
     }
	?>
		
	<div id="conteneurcercle1">
			<div id="tdb">
			    <a href="maison.php">
					<div>	
						Maisons
					</div>
				</a>
			</div> 
			<div id="tdb">
			<a href="piece.php">
				<div>		
					Pi&egrave;ces
				</div>
			</a>
			</div>
			
			<div id="tdb">
			<a href="page_des_composants.php">	
				<div>	
					Composants
				</div>
			</a>
			</div>
			
			<?php 
		    if ($_SESSION['utilisateur']==0){
		    
		    ?>
			<div id="tdb">
			<a href="page_des_paramètres.php">
				<div>
					Param&egrave;tres
				</div>
			</a>
			</div>
			
			<?php 
		    }
			?>
		
    </div>
    <br />
    <div id="conteneur2">
    	<hr width="100%">
    	<br />
    	<p><font size="+2"> Acc&egrave;s rapide aux composants </font></p>
    </div>
    
    <div id="conteneurcercle1">
    	<?php 
    	$id=$_SESSION['ID'];
    	
    	$id_principal=$_SESSION['principal'];
    	
    	if($_SESSION['utilisateur']==1){
    	    $capteur = $bdd -> query('SELECT capteur.nom, capteur.IDcapteur FROM capteur JOIN maison ON (capteur.IDmaison = maison.IDmaison) WHERE capteur.IDutilisateur= "'. $id_principal .'" AND capteur.selectiontdb = 1 AND maison.selection = 1');
    	}
    	else {
    	    $capteur = $bdd -> query('SELECT capteur.nom, capteur.IDcapteur FROM capteur JOIN maison ON (capteur.IDmaison = maison.IDmaison) WHERE capteur.IDutilisateur= "'. $id .'" AND capteur.selectiontdb = 1 AND maison.selection = 1');
    	}
    	
    
        foreach ($capteur->fetchAll() as $capt) {
            $idcapteur = $capt[1];
       
       	    $req = $bdd->query('SELECT donnees.donnees FROM donnees JOIN capteur ON (capteur.IDcapteur = donnees.IDcomposant) WHERE capteur.IDcapteur = "'. $idcapteur .'"');
       	    $rep = $req->fetch();
       	    $req2 = $bdd->query('SELECT typecomposant.unite FROM typecomposant JOIN capteur ON (typecomposant.nom = capteur.nomtype) WHERE capteur.IDcapteur = "'. $idcapteur .'"');
       	    $rep2 = $req2->fetch();
       	    ?>
       		<div style="width: 150px;" id="conteneurcompo"> 
				<div id="cercle"><div><?php echo $rep['donnees']. " " . $rep2['unite'];?></div></div>
				<?php 
				$pieces = $bdd->query('SELECT piece.nom FROM piece JOIN capteur ON (piece.IDpiece = capteur.IDpiece) WHERE capteur.IDcapteur = "'.$idcapteur.'"');
				$piece = $pieces->fetchAll();
				
				?>
				<div id="texte"><?php echo $capt['nom'] . " (" . $piece[0]['nom'] . ")";?></div>
			</div>
			<?php        
		}
		
		if($_SESSION['utilisateur']==1){
		    $actionneur = $bdd -> query('SELECT actionneur.nom, actionneur.etat, actionneur.IDactionneur FROM actionneur JOIN maison ON (actionneur.IDmaison = maison.IDmaison) WHERE actionneur.IDutilisateur= "'. $id_principal .'" AND actionneur.selectiontdb = 1 AND maison.selection = 1');
		}
		else{
		    $actionneur = $bdd -> query('SELECT actionneur.nom, actionneur.etat, actionneur.IDactionneur FROM actionneur JOIN maison ON (actionneur.IDmaison = maison.IDmaison) WHERE actionneur.IDutilisateur= "'. $id .'" AND actionneur.selectiontdb = 1 AND maison.selection = 1');
		}
		

		foreach ($actionneur->fetchAll() as $action) {
		    $idactionneur = $action['IDactionneur'];
		    $req1 = $bdd->query('SELECT donnees.donnees FROM donnees JOIN actionneur ON (actionneur.IDactionneur = donnees.IDcomposant) WHERE actionneur.IDactionneur = "'. $idactionneur .'"');
		    $rep1 = $req1->fetch();
		    $req3 = $bdd->query('SELECT typecomposant.unite FROM typecomposant JOIN actionneur ON (typecomposant.nom = actionneur.nomtype) WHERE actionneur.IDactionneur = "'. $idactionneur .'"');
		    $rep3 = $req3->fetch();
		    $pieces1 = $bdd->query('SELECT piece.nom FROM piece JOIN actionneur ON (piece.IDpiece = actionneur.IDpiece) WHERE actionneur.IDactionneur = "'.$idactionneur.'"');
		    $piece1 = $pieces1->fetchAll();
		   
			?>
			<div style="width: 150px;" id="conteneurcompo"> 
				<div id="cercle">
					<label class="switch">
 						<input type="checkbox" <?php if ($action['etat']== 1) {?> checked <?php }?>>
  						<span class="slider round">
						</span>
					</label>
				</div>
				<div id="texte"><?php echo $action['nom'] . " (" . $piece1[0]['nom'] . ")";?></div>
			</div>
			<?php        
		}
		?>
    </div>
		
	
	</article>
	<section>
	
	</section>	
	<footer>
			<?php
                require("footer.php");
            ?>
	</footer>
</body>


