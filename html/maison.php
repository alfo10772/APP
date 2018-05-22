<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<link rel="stylesheet" href="../css/style.css">	
		<title>Page des maisons</title>
	</head>
	
	<body>
		<header>
			<?php
        require("en_tete_connexion.php");
        	?>
		</header>
		
		<article>
		
		<h1>Page des maisons</h1>
		
		<?php 
       		include('../modele/config_init.php');
       	?>
       				
		<div style="float:left">
			<a href="tableau_de_bord.php">		
				<input type="submit" id="retour" value="Retour &agrave; la page d'accueil" />
			</a>
		</div> 
		
		<div style="float:right">
			<a href="suppression_maison.php">		
				<input type="submit" id="retour" value="Supprimer une maison" />
				
			</a>
		</div>
		
		<br/>
        <br/>
        <br/>
        
		<h2> Cliquez sur une maison pour la s&eacute;lectionner </h2>
        
        
		<div id="conteneurcercle">
				
			<?php	
       		$reponse = $bdd->query('SELECT nom FROM maison');
       					
       		foreach ($reponse->fetchAll() as $donnees)
       			{
       			    $nom=strval($donnees['nom']);
       			    $len=strlen($nom);
       			    
       			    if ($len<13)
       			    {
       		        ?>
						<div onclick="select();">
							<div id=textecercle1>
								<?php echo $donnees['nom']?>
							</div>
						</div>
					<?php 
			         }
			         
			         if ($len>12 AND $len<27)
       			    {
       		        ?>
						<div onclick="select();">
							<div id=textecercle2>
								<?php echo $donnees['nom']?>
							</div>
						</div>
					<?php 
			         }
			         
			         if ($len>26 AND $len<39)
			         {
			             ?>
						<div onclick="select();">
							<div id=textecercle3>
								<?php echo $donnees['nom']?>
							</div>
						</div>
					<?php
			         }		
			         
			}
			?>
			
			
			<div><font size="+4"><div id=textecercle><a href="ajout_maison.php">+</a></div></font></div>
		</div>
		
		<script type="text/javascript">
			var select = function() { 
				var nom = '<?php echo $nom; ?>';
				document.write(nom);
			}
		</script>
		
	</article>
	
	<footer>						
		<?php
            require("footer.php");
        ?>
	</footer>


	</body>
</html>