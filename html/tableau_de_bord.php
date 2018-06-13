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
        require("en_tete_connexion.php");       //Afficahge du header
	?>
	
	</header>
	
	<article>
	
	<h1>Tableau de bord</h1>
	
	<?php 
       		include('../modele/config_init.php');      //Connexion à la BDD
     
       	
     if ($_SESSION['utilisateur']==0){      //Test pour savoir s'il s'agit d'un utilisateur principal
       		    
     ?>
     <div style="float:right">
		<a href="gestion_secondaire.php">		
			<input type="submit" id="second" value="G&eacute;rer les utilisateurs secondaires" />	<!-- Bouton d'ajout d'utilisateur secondaire, unqiuement pour les utilisateurs principaux -->
		</a>
	</div>
	
	<?php 
     }
	?>
		
	<div id="conteneurcercle1">
			<div id="tdb">
			    <a href="maison.php">
					<div>	
						Maisons		<!-- Cercle qui mène vers la page des maisons lorsqu'on clique dessus -->
					</div>
				</a>
			</div> 
			<div id="tdb">
			<a href="piece.php">
				<div>		
					Pi&egrave;ces	<!-- Cercle qui mène vers la page des pièces lorsqu'on clique dessus -->
				</div>
			</a>
			</div>
			
			<div id="tdb">
			<a href="page_des_composants.php">	
				<div>	
					Composants		<!-- Cercle qui mène vers la page des composants lorsqu'on clique dessus -->
				</div>
			</a>
			</div>
			
			<?php 
		    if ($_SESSION['utilisateur']==0){ //Test pour savoir s'il s'agit d'un utilisateur principal
		    ?>
			<div id="tdb">
			<a href="page_des_paramÃ¨tres.php">
				<div>
					Param&egrave;tres	<!-- Cercle qui mène vers la page des paramètres lorsqu'on clique dessus (uniquement pour les utilisateurs principaux-->
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
    	
    	$id_principal=$_SESSION['principal'];      //récupère l'ID de l'utilisateur principal
    	
    	if($_SESSION['utilisateur']==1){       //Test pour savoir s'il s'agit d'un utilisateur secondaire
    	    $capteur = $bdd -> query('SELECT capteur.nom, capteur.IDcapteur FROM capteur JOIN maison ON (capteur.IDmaison = maison.IDmaison) WHERE capteur.IDutilisateur= "'. $id_principal .'" AND capteur.selectiontdb = 1 AND maison.selection = 1');
    	}
    	else {
    	    $capteur = $bdd -> query('SELECT capteur.nom, capteur.IDcapteur FROM capteur JOIN maison ON (capteur.IDmaison = maison.IDmaison) WHERE capteur.IDutilisateur= "'. $id .'" AND capteur.selectiontdb = 1 AND maison.selection = 1');
    	}
    	//Sélectionne les capteurs qui ont été sélectionnés dans les paramètres pour être affichés sur le tableau de bord
    
        foreach ($capteur->fetchAll() as $capt) {
            $idcapteur = $capt[1];
       
       	    $req = $bdd->query('SELECT donnees.donnees FROM donnees JOIN capteur ON (capteur.IDcapteur = donnees.IDcomposant) WHERE capteur.IDcapteur = "'. $idcapteur .'"');
       	    //Sélectionne les donnees des capteurs
       	    $rep = $req->fetch();
       	    $req2 = $bdd->query('SELECT typecomposant.unite FROM typecomposant JOIN capteur ON (typecomposant.nom = capteur.nomtype) WHERE capteur.IDcapteur = "'. $idcapteur .'"');
       	    //Sélectionne les unites utilisées pour les capteurs
       	    $rep2 = $req2->fetch();
       	    ?>
       		<div style="width: 150px;" id="conteneurcompo"> 
				<div id="cercle"><div><?php echo $rep['donnees']. " " . $rep2['unite'];?></div></div>	<!-- Affiche la donnée suivie de son unité -->
				<?php 
				$pieces = $bdd->query('SELECT piece.nom FROM piece JOIN capteur ON (piece.IDpiece = capteur.IDpiece) WHERE capteur.IDcapteur = "'.$idcapteur.'"');
				$piece = $pieces->fetchAll();
				//Récupère le nom de la pièce où se trouve le capteur
				?>
				<div id="texte"><?php echo $capt['nom'] . " (" . $piece[0]['nom'] . ")";?></div>	<!-- Affiche le nom du capteur suivi du nom de la pièce dans laquelle il se trovue entre parenthèses -->
			</div>
			<?php        
		}
		
		if($_SESSION['utilisateur']==1){  //Test pour savoir s'il s'agit d'un utilisateur secondaire
		    $actionneur = $bdd -> query('SELECT actionneur.nom, actionneur.etat, actionneur.IDactionneur FROM actionneur JOIN maison ON (actionneur.IDmaison = maison.IDmaison) WHERE actionneur.IDutilisateur= "'. $id_principal .'" AND actionneur.selectiontdb = 1 AND maison.selection = 1');
		}
		else{
		    $actionneur = $bdd -> query('SELECT actionneur.nom, actionneur.etat, actionneur.IDactionneur FROM actionneur JOIN maison ON (actionneur.IDmaison = maison.IDmaison) WHERE actionneur.IDutilisateur= "'. $id .'" AND actionneur.selectiontdb = 1 AND maison.selection = 1');
		}
		//Sélectionne les actionneurs qui ont été sélectionnés dans les paramètres pour être affichés sur le tableau de bord

		foreach ($actionneur->fetchAll() as $action) {
		    $idactionneur = $action['IDactionneur'];
		    $req1 = $bdd->query('SELECT donnees.donnees FROM donnees JOIN actionneur ON (actionneur.IDactionneur = donnees.IDcomposant) WHERE actionneur.IDactionneur = "'. $idactionneur .'"');
		    //Sélectionne les donnees des actionneurs
		    $rep1 = $req1->fetch();
		    $req3 = $bdd->query('SELECT typecomposant.unite FROM typecomposant JOIN actionneur ON (typecomposant.nom = actionneur.nomtype) WHERE actionneur.IDactionneur = "'. $idactionneur .'"');
		    //Sélectionne les types de composant des actionneurs
		    $rep3 = $req3->fetch();
		    $pieces1 = $bdd->query('SELECT piece.nom FROM piece JOIN actionneur ON (piece.IDpiece = actionneur.IDpiece) WHERE actionneur.IDactionneur = "'.$idactionneur.'"');
		    //Récupère le nom de la pièce où se trouve l'actionneur
		    $piece1 = $pieces1->fetchAll();
		   
			?>
			<div style="width: 150px;" id="conteneurcompo"> 
				<div id="cercle">
					<?php if ($action['etat']== 0) {?>	
						<form method="post" action="../traitements/etat_on.php">	<!--  Début du formulaire -->
							<input type="submit" name="etat" id="cercleon" value="on" >		<!--  affichage du bouton "on" si l'etat est "off" -->
							<input type="hidden" name="source" id="cercleon" value="3" >	<!--  bouton hidden pour récupérer le numéro source de la page -->
							<input type="hidden" name="id" id="cercleon" value="<?php echo $action['IDactionneur'];?>">		<!--  bouton hidden pour récupérer l'ID de l'actionneur -->
						</form>
					<?php }
					if ($action['etat']== 1) {?>
						<form method="post" action="../traitements/etat_off.php">	<!--  Début du formulaire -->
							<input type="submit" name="etat" id="cercleoff" value="off" >	<!--  affichage du bouton "off" si l'etat est "on" -->
							<input type="hidden" name="source" id="cercleoff" value="3" >	<!--  bouton hidden pour récupérer le numéro source de la page -->
							<input type="hidden" name="id" id="cercleoff" value="<?php echo $action['IDactionneur'];?>" >		<!--  bouton hidden pour récupérer l'ID de l'actionneur -->
						</form>
					<?php }?>
				</div>
				<div id="texte"><?php echo $action['nom'] . " (" . $piece1[0]['nom'] . ")";?></div>		<!--  affichage du nom de l'actionneur (en dessous du cercle) suivi de la piece dans laquelle il se trouve entre parenthèses-->
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
			require("footer.php");       //Affichage du footer
            ?>
	</footer>
</body>


