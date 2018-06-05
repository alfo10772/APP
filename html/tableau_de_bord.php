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

	$affich = array();
	$capt = array();
	$idt = array();
	$i = 0;
		$rep = $bdd->prepare ('SELECT * FROM typecomposantuser WHERE type1 = :ind AND userID = :id');
   		$rep->execute(array(':ind' => 0, ':id' => $_SESSION['ID']));
		while ($piece = $rep->fetch()) {	
		$affich[$i] = explode(',',$piece['affichage']);
		$capt[$i] = $piece['nom'];
		//$idt[$i] = $piece['typec'];
		print_r($affich[$i]);
		$i++;
			
		
		}
		//print_r($affich);
       					
       	$reponse = $bdd->query('SELECT * FROM typecomposant WHERE type = 0');
       	$i = 0;			
		   while ($donnees = $reponse->fetch())
       	{

			$rep = $bdd->query('SELECT * FROM composant' );
			?>
			<p>
			<?php
				echo $donnees['nom'];
			   ?> :
			   </p>
			   <br/>
			   <br/>

		   <?php
		   $i++;
		   }
		   $size = $i;
		   ?>
		</div>

		<div id="conteneurcercle1">
	<?php 
		
			?>
			<div>
			<?php
			echo $piece['affichage'];
			?>
			</div>
			<?php



		   	
		   while ($donnees = $reponse->fetch())
       	{

			$rep = $bdd->query('SELECT * FROM composant' );
			?>
		

			   
			   <div>
				   <?php echo $donnees['vu'] ?>
		   </div>
		   <?php
		   $i++;
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


