<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<link rel="stylesheet" href="../css/style.css">	
		<title>Votre piece</title>
	</head>

	<body>

	<header>
			<?php
			require("en_tete_connexion.php");       //ajout du header
        	?>
	</header>
		
	<article>
		
		<?php 
		include('../modele/config_init.php');         //connexion à la BDD
       	?>
		
		<h1>
		<?php 
		  echo $_SESSION['nompiece'];     //affichage en titre du nom de la pièce qui a été sélectionnée
		?>
        </h1>
        
        <br />
		
		<div style="float:left">
			<a href="piece.php">		
				<input type="submit" id="retour" value="Retour &agrave; la page des pi&egrave;ces" />		<!-- Bouton de retour à la page des pièce -->
			</a>
		</div> 
		

				
		<div id="conteneurcercle">
			<?php 
			$reponse = $bdd->query('SELECT capteur.nom FROM piece JOIN capteur ON (piece.IDpiece = capteur.IDpiece) WHERE capteur.IDpiece = "'.$_SESSION['idpiece'].'"');        //Sélection des noms des capteurs présents dans la pièce sélectionnée uniquement
			$reponse2 = $bdd->query('SELECT actionneur.nom, actionneur.etat, actionneur.IDactionneur FROM piece JOIN actionneur ON (piece.IDpiece = actionneur.IDpiece) WHERE actionneur.IDpiece = "'.$_SESSION['idpiece'].'"');     //Sélection des noms des actionneurs présents dans la pièce sélectionnée uniquement
			
			$req = $bdd->query('SELECT donnees.donnees FROM donnees JOIN capteur ON (capteur.IDcapteur = donnees.IDcomposant) WHERE capteur.IDcapteur = "'. $idcapteur .'"');       //Sélection des données des capteurs présents
			$rep = $req->fetch();
			$req2 = $bdd->query('SELECT typecomposant.unite FROM typecomposant JOIN capteur ON (typecomposant.nom = capteur.nomtype) WHERE capteur.IDcapteur = "'. $idcapteur .'"');     //Sélection des unite de type de composant
			$rep2 = $req2->fetch();foreach ($reponse->fetchAll() as $donnees)
			{
			?>
			
				<div style="width: 150px;" id="conteneurcompo">
					<div id="cercle"><?php echo $rep['donnees']. " " . $rep2['unite'];?></div>		<!--  affichage des données suivies de leurs unités à partir de la BDD -->
					<div id="texte"><?php echo $donnees['nom'];?></div>		<!--  affichage du nom du capteur -->
				</div>
						
			<?php 
			}
			foreach ($reponse2->fetchAll() as $donnees2)
			{
			    $idactionneur= $donnees2['IDactionneur'];
			    ?>
				<div style="width: 150px;" id="conteneurcompo">
					<div id="cercle">
						<?php if ($donnees2['etat']== 0) {?>
						<form method="post" action="../traitements/etat_on.php">	<!--  Début du formulaire -->
							<input type="submit" name="etat" id="cercleon" value="on" >		<!--  affichage du bouton "on" si l'etat est "off" -->
							<input type="hidden" name="source" id="cercleon" value="2">		<!--  bouton hidden pour récupérer le numéro source de la page -->
							<input type="hidden" name="id" value="<?php echo $donnees2['IDactionneur'];?>">		<!--  bouton hidden pour récupérer l'ID de l'actionneur -->
						</form>
						<?php }
						if ($donnees2['etat']== 1) {?>
						<form method="post" action="../traitements/etat_off.php">
							<input type="submit" name="etat" id="cercleoff" value="off" >		<!--  affichage du bouton "off" si l'etat est "on" -->
							<input type="hidden" name="source" id="cercleoff" value="2">		<!--  bouton hidden pour récupérer le numéro source de la page -->
							<input type="hidden" name="id" value="<?php echo $donnees2['IDactionneur'];?>" >	<!--  bouton hidden pour récupérer l'ID de l'actionneur -->
						</form>
						<?php }?>
					</div>
					<div id="texte"><?php echo $donnees2['nom'];?></div>
				</div>
						
			<?php 
			}
			?>
			
			<div id="cercle">
				<a href="ajout_composant2.php">
					<font size="+4"><div id=textecercle>+</div></font>		<!--  bouton d'ajout de capteur -->
				</a>
			</div>
		</div>
	
		
	</article>
	
	<footer>						
		<?php
        require("footer.php");      //affichage du footer
        	?>
		
	</footer>
</body>
</html>