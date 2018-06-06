<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<link rel="stylesheet" href="../css/style.css">	
		<title>Votre piece</title>
	</head>

	<body>

	<header>
			<?php
        require("en_tete_connexion.php");
        	?>
	</header>
		
	<article>
		
		<?php 
		include('../modele/config_init.php');
       	?>
		
		<h1>
		<?php 
		  echo $_SESSION['nompiece'];
		?>
        </h1>
        
        <br />
		
		<div style="float:left">
			<a href="piece.php">		
				<input type="submit" id="retour" value="Retour &agrave; la page des pi&egrave;ces" />
			</a>
		</div> 
		

				
		<div id="conteneurcercle">
			<?php 
			$reponse = $bdd->query('SELECT capteur.nom FROM piece JOIN capteur ON (piece.IDpiece = capteur.IDpiece) WHERE capteur.IDpiece = "'.$_SESSION['idpiece'].'"');
			$reponse2 = $bdd->query('SELECT actionneur.nom, actionneur.etat FROM piece JOIN actionneur ON (piece.IDpiece = actionneur.IDpiece) WHERE actionneur.IDpiece = "'.$_SESSION['idpiece'].'"');
			foreach ($reponse->fetchAll() as $donnees)
			{
			?>
			
				<div style="width: 150px;" id="conteneurcompo">
					<div id="cercle"></div>
					<div id="texte"><?php echo $donnees['nom'];?></div>
				</div>
						
			<?php 
			}
			foreach ($reponse2->fetchAll() as $donnees2)
			{
			?>
				<div style="width: 150px;" id="conteneurcompo">
					<div id="cercle">
						<label class="switch">
 						<input type="checkbox" <?php if ($donnees2['etat']== 1) {?> checked <?php }?>> 							<span class="slider round">
  						</span>
						</label>
					</div>
					<div id="texte"><?php echo $donnees2['nom'];?></div>
				</div>
						
			<?php 
			}
			?>
			
			<div id="cercle">
				<a href="ajout_maison.php">
					<font size="+4"><div id=textecercle>+</div></font>
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
</html>