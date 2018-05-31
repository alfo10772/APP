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
		
		<div style="float:right">
			<a href="suppression_composant1.php">		
				<input type="submit" id="retour" value="Supprimer un composant"> 
			</a>
		</div>

	<div id="conteneurcercle">
		<?php
		    $id=$_SESSION['ID'];
		    $idmaison = $_SESSION['maisonselect'];
       		$reponse1 = $bdd->query('SELECT * FROM capteur WHERE (IDutilisateur= "'. $id .'" AND IDmaison = "'. $idmaison .'")');
       		$reponse2 = $bdd->query('SELECT * FROM actionneur WHERE (IDutilisateur= "'. $id .'" AND IDmaison = "'. $idmaison .'")');
       		
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
 							<input type="checkbox" checked>
  							<span class="slider round"></span>
							</label>
						</div>
						<div id="texte"><?php echo $donnees['nom'];?></div>
					</div>
					<?php 
			}
			?>
		<a href="ajout_composant.php">
		<div id="cercle">
			<center><font size="+4">+</font></center>
		</div>
		</a>
	</div>
	</article>
	<footer>
			<?php
                require("footer.php");
            ?>
	</footer>
</body>