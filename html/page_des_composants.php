<!DOCTYPE html>
<html>                                                  <!--squelette pour en-t�te et bas de page -->
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/style.css">
	<title>page des composants</title>
</head>
<body>

	<header>
		<?php
            require("en_tete_connexion.php");
        ?>
	</header>
	<article>
	<h1>Page des composants</h1>
	
	<br />
		<?php 
		include('../modele/config_init.php');
       	?>
	
		<div style="float:left">
			<a href="tableau_de_bord.php">		
				<input type="submit" id="retour" value="Retour &agrave; la page d'accueil" />
			</a>
		</div> 
		
		<?php 
		if ($_SESSION['utilisateur']==0){
		    
		?>
		
		<div style="float:right">
			<a href="suppression_composant1.php">		
				<input type="submit" id="retour" value="Supprimer un composant"> 
			</a>
		</div>
		
		<?php 
		}
		?>
	<br>
	<br>
	<br>
	<div id="conteneurcercle">
		<?php
		    $id=$_SESSION['ID'];
		    $id_principal=$_SESSION['principal'];
		    
		    if($_SESSION['utilisateur']==1){
		        $reponse1 = $bdd->query('SELECT capteur.nom, capteur.IDcapteur FROM capteur JOIN maison ON (capteur.IDmaison = maison.IDmaison) WHERE capteur.IDutilisateur= "'. $id_principal .'" AND maison.selection = 1');
		        $reponse2 = $bdd->query('SELECT actionneur.nom, actionneur.etat, actionneur.IDactionneur FROM actionneur JOIN maison ON (actionneur.IDmaison = maison.IDmaison) WHERE actionneur.IDutilisateur= "'. $id_principal .'" AND maison.selection = 1');
		    }
		    else{
		        $reponse1 = $bdd->query('SELECT capteur.nom, capteur.IDcapteur FROM capteur JOIN maison ON (capteur.IDmaison = maison.IDmaison) WHERE capteur.IDutilisateur= "'. $id .'" AND maison.selection = 1');
		        $reponse2 = $bdd->query('SELECT actionneur.nom, actionneur.etat, actionneur.IDactionneur FROM actionneur JOIN maison ON (actionneur.IDmaison = maison.IDmaison) WHERE actionneur.IDutilisateur= "'. $id .'" AND maison.selection = 1');
		    }
       		
       		
       		while ($donnees = $reponse1->fetch())
       		{
       		    $idcapteur = $donnees['IDcapteur'];
       		    $req = $bdd->query('SELECT donnees.donnees FROM donnees JOIN capteur ON (capteur.IDcapteur = donnees.IDcomposant) WHERE capteur.IDcapteur = "'. $idcapteur .'"');
       		    $rep = $req->fetch();
       		    $req2 = $bdd->query('SELECT typecomposant.unite FROM typecomposant JOIN capteur ON (typecomposant.nom = capteur.nomtype) WHERE capteur.IDcapteur = "'. $idcapteur .'"');
       		    $rep2 = $req2->fetch();
       		    $pieces = $bdd->query('SELECT piece.nom FROM piece JOIN capteur ON (piece.IDpiece = capteur.IDpiece) WHERE capteur.IDcapteur = "'.$idcapteur.'"');
       		    $piece = $pieces->fetchAll();
       		        ?>
       		        <div style="width: 150px;" id="conteneurcompo"> 
						<div id="cercle"><div><?php echo $rep['donnees']. " " . $rep2['unite'];?></div></div>
						<div id="texte"><?php echo $donnees['nom'] . " (" . $piece[0]['nom'] . ")";?></div>
					</div>
					<?php 
			         
			}
			while ($donnees = $reponse2->fetch())
			{
			    $idactionneur= $donnees['IDactionneur'];
			    $pieces1 = $bdd->query('SELECT piece.nom FROM piece JOIN actionneur ON (piece.IDpiece = actionneur.IDpiece) WHERE actionneur.IDactionneur = "'.$idactionneur.'"');
			    $piece1 = $pieces1->fetchAll();
			    ?>
			    	<div style="width: 150px;" id="conteneurcompo">
						<div id="cercle">
						<?php if ($donnees['etat']== 0) {?>
						<form method="post" action="../traitements/etat_on.php">
							<input type="submit" name="etat" id="cercleon" value="on" >
							<input type="hidden" name="id" value="<?php echo $donnees['IDactionneur'];?>">
						</form>
						<?php }
						if ($donnees['etat']== 1) {?>
						<form method="post" action="../traitements/etat_off.php">
							<input type="submit" name="etat" id="cercleoff" value="off" >
							<input type="hidden" name="id" value="<?php echo $donnees['IDactionneur'];?>" >
						</form>
						<?php }?>
						</div>
						<div id="texte"><?php echo $donnees['nom'] . " (" . $piece1[0]['nom'] . ")";?></div>
					</div>
				
					<?php 
			}
			
		if ($_SESSION['utilisateur']==0){
		    
		?>
		<a href="ajout_composant.php">
		<div id="cercle">
			<center><font size="+4"><div id=textecercle>+</div></font></center>
		</div>
		</a>
		
		<?php 
		}
		?>
	</div>
	
	<?php 
	if ($_SESSION['utilisateur']==0){
		    
	?>
		<a href="parametre_composant.php">
			<input type="submit" id="second" value="Modifier les param&egrave;tres d'un composant" style="margin-right:2%; margin-left:auto; margin-top:auto; margin-bottom:1%; padding:1%; width:21%">
		</a>
	
	<?php 
	}
	?>
	</article>
	<footer>
			<?php
                require("footer.php");
            ?>
	</footer>
</body>