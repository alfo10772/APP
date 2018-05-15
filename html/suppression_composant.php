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
				<input type="submit" id="retour" value="Retour &agrave; la page des composants" />
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
			<?php
                require("footer.php");
            ?>
	</footer>
</body>
</html>