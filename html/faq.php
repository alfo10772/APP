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
	<div id="conteneur5">
		<aside class="bonhomme1">
		<section id="conteneur6">
			<p>
				<img src="../images/photo.png" alt="administrateur" width="200">
				<br/>
					administrateur	
			</p>
		</aside>
			<?php
			try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=bdd_a;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // A modifier lors de l'hebergement
			}
			catch (Exception $e)
			{
			        die('Erreur : '.$e->getMessage());
			}
			$reponse = $bdd->query('SELECT * FROM question');
			
			// On affiche chaque entr�e une � une
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
			
			$reponse->closeCursor(); // Termine le traitement de la requ�te
			
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
	<footer>						
		<?php
            require("footer.php");
        ?>
	</footer>
</body>