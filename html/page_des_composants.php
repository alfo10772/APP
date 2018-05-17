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
	
		<?php 
       		include('config_init.php');
       	?>
	
		<div style="float:left">
			<a href="tableau_de_bord.php">		
				<input type="submit" id="retour" value="Retour &agrave; la page d'accueil" />
			</a>
		</div> 
		
		<div style="float:right">
			<a href="suppression_composant.php">		
				<input type="submit" id="retour" value="Supprimer un composant"> 
			</a>
		</div>

	<div id="conteneurcercle">
		<?php	
       		$reponse = $bdd->query('SELECT * FROM composant');
       					
       		while ($donnees = $reponse->fetch())
       			{
       			    $nom=strval($donnees['nom']);
       			    $len=strlen($nom);
       			    if ($len<13)
       			    {
       		        ?>
						<div>
							<div id=textecercle1>
								<?php echo $donnees['nom']?>
							</div>
						</div>
					<?php 
			         }
			         if ($len>12 AND $len<27)
       			    {
       		        ?>
						<div>
							<div id=textecercle2>
								<?php echo $donnees['nom']?>
							</div>
						</div>
					<?php 
			         }
			         if ($len>26 AND $len<39)
			         {
			             ?>
						<div>
							<div id=textecercle3>
								<?php echo $donnees['nom']?>
							</div>
						</div>
					<?php
			         }
			}
			?>
		<div>
		<a href="ajout_composant.php">
			<div id=textecercle><font size="+4">+</font></div>
		</a>
		</div>
	</div>
	</article>
	<footer>
			<?php
                require("footer.php");
            ?>
	</footer>
</body>