<!DOCTYPE html>
<html>                                                  <!--squelette pour en-tête et bas de page -->
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/style.css">
	<title>FAQ</title>
</head>
<body>

	<header>
		<?php
            require("en_tete_connexion.php");
        ?>
	</header>
	<aricle>
		<div id="conteneur5">
			<aside class="bonhomme1">
			<section id="conteneur6">
				<p>
					<img src="../images/photo.png" alt="administrateur" width="200">
					<br/>
						administrateur	
				</p>
			</aside>
			<section id="conteneur_question_reponse">
				<?php
				try
				{
					$bdd = new PDO('mysql:host=localhost;dbname=bdd_a;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // A modifier lors de l'hebergement
				}
				catch (Exception $e)
				{
				        die('Erreur : '.$e->getMessage());
				}
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
				<?php
				}
				
				$reponse->closeCursor(); 
				
				?>
				</section>
			
			<aside class="bonhomme2">
				<p>
					<img src="../images/photo.png" alt="utilisateur" width="200">
						<br/>
					utilisateur	
				</p>
			</aside>
		</div>
	</aricle>
	<footer>						
		<?php
            require("footer.php");
        ?>
	</footer>
</body>