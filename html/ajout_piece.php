<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<link rel="stylesheet" href="../css/style.css">	
		<title>ajout_piece</title>
	</head>

	<body>

		<header>
			<?php
        require("en_tete_connexion.php");
        	?>
		</header>

	<article>
		
		<h1>Ajout d'une pièce</h1>
		
		<?php 
       		try
       		{
       		   $bdd = new PDO('mysql:host=localhost;dbname=bdd_a;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // A modifier lors de l'hebergement
       		}
       		catch (Exception $e)
       		{
       		die('Erreur :' . $e->getMessage());
       		}
       	?>
       				
		<div style="float:left">
			<a href="piece.php">		
				<input type="submit" id="supprimer" value="Retour à la page des pièces" />
			</a>
		</div> 
		
		<br />
		<br />
		<br />
		<br />
		
		<div id="conteneur2">
			
			<form method="post" action="traitementpiece.php" enctype="multipart/form-data"> 
   				
   				<div type="formulaire1">
   					<label for="maison">Maison</label><br /> 
       				<select name="maison" id="maison"> 
       					<?php 
       					
       					$reponse = $bdd->query('SELECT * FROM maison');
       					
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
   					<label for="piece">
   						Type
   					</label>
   					<br /> 
       				<input type="text" name="nom" placeholder="Nom de la pièce" id="nom" />
  				 </div>
			
			
			<br />
			<br />
			
				
				<div type="formulaire1">
					<label for="surface">								
						Superficie de la pièce (optionnelle)
					</label>
					<br />
					<input type="text" name="surface" placeholder="Superficie de la pièce" id="piece" />
				</div>
			
			
			<br />
			<br />
			
			<input type="submit" value="Ajouter" />
			
			</form>
		</div>
		
	</article>
		
	<footer>						<!--  début du bas de la page -->
		<p>
			<a href="faq.html">		<!--  lien vers la FAQ -->
				<strong>
					FAQ
				</strong>
			</a>
		</p>
		<p>
			<a href="condition_d'utilisation.html">		<!--  lien vers les conditions d'utilisations -->
				Condition générales d'utilisation
			</a>
		</p>
		<p>
			<a href="mentions_legales.html">			<!--  lien vers les mentions légales -->
				Mentions légales
			</a>
		</p>
		<div>
			
			Date et heure								<!--  affichage de la date et l'heure -->
			<div id="afficherheure">
			</div>
			<script type="text/javascript">
			setInterval(function(){
    		document.getElementById('afficherheure').innerHTML = new Date().toLocaleTimeString();
			}, 1000);
			</script>
		</div>
		
	</footer>
