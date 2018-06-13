<!DOCTYPE html>
<html>                                                  
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/style.css">
	<title>FAQ</title>
</head>
<body>

	<header>							<!--  Ajout du header  -->
		<?php
            require("en_tete_connexion.php"); 
        ?>
	</header>
	<article >
		<section id="conteneur_faq">
			<aside class="bonhomme1">
				<p>
					<img src="../images/photo.png" alt="administrateur" width="200">
					<br/>
						Administrateur	
				</p>
			</aside>
			<section id="conteneur6">		<!--  Connexion à la bdd et selecion de toutes les questions et reponses existante -->
				<?php 
       		    include('../modele/config_init.php');
				
				$reponse = $bdd->query('SELECT * FROM reponse');
				
				while ($donnees = $reponse->fetch())
				{
				?>
					<div class="question">	
				    	<?php echo $donnees['question']; ?>
				    </div>
					<div class="reponse">
				   		<?php echo $donnees['reponse']; ?>
				    </div>
				    <br />
				    <br />
				<?php
				}
				
				$reponse->closeCursor(); 
				
				?>
			</section>
			
			<aside class="bonhomme2">
				<p>
					<img src="../images/photo.png" alt="utilisateur" width="200">
					<br/>
						Utilisateur	
				</p>
			</aside>
		</section>
	</article>
	<footer>						<!--  Ajout du footer -->
		<?php
            require("footer.php");
        ?>
	</footer>
</body>