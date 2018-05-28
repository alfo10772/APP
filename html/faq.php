<!DOCTYPE html>
<html>                                                  <!--squelette pour en-t√™te et bas de page -->
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
			
			// On affiche chaque entrÈe une ‡ une
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
			
			$reponse->closeCursor(); // Termine le traitement de la requÍte
			
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
		<p class="bordure1">
			<a href="faq.html">
				<strong>
					FAQ
				</strong>
			</a>
		</p>
		<p>
			<a href="condition_d'utilisation.html">
				Condition g√©n√©rales d'utilisation
			</a>
		</p>
		<p>
			<a href="mentions_legales.html">
				Mentions l√©gales
			</a>
		</p>
		<div>
			Date et heure
			</div>
			<div id="afficherheure">
			
			<script type="text/javascript">
			setInterval(function(){
    		document.getElementById('afficherheure').innerHTML = new Date().toLocaleTimeString();
			}, 1000);
			</script>
		
		</div>
	</footer>
</body>