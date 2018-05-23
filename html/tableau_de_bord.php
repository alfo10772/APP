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
		
	<div id="conteneurcercle1">
			<div>
			    <a href="maison.php">
					<div>	
						Maisons
					</div>
				</a>
			</div> 
			<div>
			<a href="piece.php">
				<div>		
					Pi&egrave;ces
				</div>
			</a>
			</div>
			
			<div>
			<a href="page_des_composants.php">	
				<div>	
					Composants
				</div>
			</a>
			</div>

			<div>
			<a href="page_des_paramètres.php">
				<div>
					Param&egrave;tres
				</div>
			</a>
			</div>
		
    </div>
	
	<div id="conteneurcercle1">
	<?php 
       					
       	$reponse = $bdd->query('SELECT * FROM type_capteur');
       					
		   while ($donnees = $reponse->fetch())
       	{
			   ?>
			   <div>
				   <?php echo $donnees['vu'] ?>
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
