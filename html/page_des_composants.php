<!DOCTYPE html>
<html>                                                  <!--squelette pour en-tête et bas de page -->
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
	<div id="conteneurcercle">
		<?php
		    $id=$_SESSION['ID'];
		    $id_principal=$_SESSION['principal'];
		    
		    if($_SESSION['utilisateur']==1){
		        $reponse1 = $bdd->query('SELECT capteur.nom FROM capteur JOIN maison ON (capteur.IDmaison = maison.IDmaison) WHERE capteur.IDutilisateur= "'. $id_principal .'" AND maison.selection = 1');
		        $reponse2 = $bdd->query('SELECT actionneur.nom, actionneur.etat FROM actionneur JOIN maison ON (actionneur.IDmaison = maison.IDmaison) WHERE actionneur.IDutilisateur= "'. $id_principal .'" AND maison.selection = 1');
		    }
		    else{
		        $reponse1 = $bdd->query('SELECT capteur.nom FROM capteur JOIN maison ON (capteur.IDmaison = maison.IDmaison) WHERE capteur.IDutilisateur= "'. $id .'" AND maison.selection = 1');
		        $reponse2 = $bdd->query('SELECT actionneur.nom, actionneur.etat FROM actionneur JOIN maison ON (actionneur.IDmaison = maison.IDmaison) WHERE actionneur.IDutilisateur= "'. $id .'" AND maison.selection = 1');
		    }
       		
       		
       		while ($donnees = $reponse1->fetch())
       		{
       		        ?>
       		        <div style="width: 150px;" id="conteneurcompo">
						<div id="cercle"></div>
						<div id="texte"><?php echo $donnees['nom'];?></div>
					</div>
					<?php 
			         
			}
			while ($donnees = $reponse2->fetch())
			{
			    ?>
			    	<div style="width: 150px;" id="conteneurcompo">
						<div id="cercle">
							<label class="switch">
 							<input type="checkbox" <?php if ($donnees['etat']== 1) {?> checked <?php }?>>
  							<span class="slider round">
  							</span>
							</label>
						</div>
						<div id="texte"><?php echo $donnees['nom'];?></div>
					</div>
				
					<?php 
			}
			?>
		<a href="ajout_composant.php">
		<div id="cercle">
			<center><font size="+4"><div id=textecercle>+</div></font></center>
		</div>
		</a>
	</div>
	<br>
	<br>
	<div id="parametre_composant">
		<a href="parametre_composant.php">
			<input type="submit" id="second" value="Modifier les param&egrave;tres d'un composant">
		</a>
	</div>
	</article>
	<footer>
			<?php
                require("footer.php");
            ?>
	</footer>
</body>