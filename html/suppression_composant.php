<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<link rel="stylesheet" href="../css/style.css">
<title>Suppression d'un composant</title>
</head>
<body>

	<header>
		<?php
            require("en_tete_connexion.php");
        ?>
	</header>
	<article>
		<h1>Suppression d'un composant</h1>
		<?php 
       		include('config_init.php');
       	?>
       	
		<div style="float:left">
			<a href="page_des_composants.php">		
				<input type="submit" id="supprimer" value="Retour &agrave; la page des composants" />
			</a>
		</div>
		
		<br />
		<br />
		<br />
		<br />
		<form method="post" action="traitement_suppression_composant.php" enctype="multipart/form-data">
			<div id="conteneur2"> 
   				<div type="formulaire1">
   					<label for="piece">Pi&egrave;ce</label><br /> 
       				<select name="piece" id="piece"> 
       					<?php 
       					$reponse = $bdd->query('SELECT * FROM piece');
       					while ($donnees = $reponse->fetch())
       					{
       					?>
       						<option value="<?php echo $donnees['nom']; ?>"><?php echo $donnees['nom'] ?></option>
       					<?php
                        }
                        ?> 
           			</select> 
  				 </div>
			<br />
			<br />
   				<div type="formulaire1">
   					<label for="composant">Nom du composant</label><br /> 
       				<select name="composant" id="composant"> 
       					<?php 
       					$reponse = $bdd->query('SELECT * FROM composant');
       					while ($donnees = $reponse->fetch())
       					{
       					?>
       						<option value="<?php echo $donnees['nom']; ?>"><?php echo $donnees['nom'] ?></option>
       					<?php
                        }
                        ?>  
           			</select> 
  				 </div>
			<br />
			<br />
			<div style="float:left">
				<a href="#confirmation">		
					<input type="submit" id="supprimer" value="Supprimer" />
				</a>
			</div>
		</div>
		</div>
		</form>
	</article>
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
				Condition g&eacute;n&eacute;rales d'utilisation
			</a>
		</p>
		<p>
			<a href="mentions_legales.html">
				Mentions l&eacute;gales
			</a>
		</p>
		<div>
			Date et heure
			<div id="afficherheure">
			</div>
			<script type="text/javascript">
			setInterval(function(){
    		document.getElementById('afficherheure').innerHTML = new Date().toLocaleTimeString();
			}, 1000);
			</script>
		</div>
		</div>
	</footer>
</body>
</html>