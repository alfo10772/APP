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
       	?>
     <div style="float:right">
		<a href="gestion_secondaire.php">		
			<input type="submit" id="second" value="G&eacute;rer les utilisateurs secondaires" />
		</a>
	</div>
		
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

			<div id="tdb">
			<a href="page_des_paramètres.php">
				<div>
					Param&egrave;tres
				</div>
			</a>
			</div>
		
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
    	$capteur = $bdd -> query('SELECT capteur.nom, capteur.IDcapteur FROM capteur JOIN maison ON (capteur.IDmaison = maison.IDmaison) WHERE capteur.IDutilisateur= "'. $id .'" AND capteur.selectiontdb = 1 AND maison.selection = 1');
    
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


