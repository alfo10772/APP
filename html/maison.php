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
        
        <?php
            $id=$_SESSION['ID'];
       		$reponse = $bdd->query('SELECT maison.nom, maison.IDmaison FROM maison INNER JOIN utilisateur ON maison.IDutilisateur=utilisateur.IDutilisateur WHERE(utilisateur.IDutilisateur= "'.$id.'")');
       		$selection = $bdd ->query('SELECT nom FROM maison WHERE selection = 1 AND IDutilisateur = "'.$id.'"');
       		$selected = $selection->fetch()[0];
       		
        ?>
        
        <h2>La maison s&eacute;lectionn&eacute;e est : <?php echo $selected ?></h2>
		<h2> Cliquez sur une autre maison pour changer de maison </h2>
        
        
		<div id="conteneurcercle">
				
			<?php 
       					
       		foreach ($reponse->fetchAll() as $donnees)
       			{
       			    ?>
       			    <form action="../traitements/selection_maison.php" method="post"> 
       			   
       		        	<input type="hidden" name="id" value=<?php echo $donnees['IDmaison'] ?>></input>
						<input type="submit" id="bouton" name=<?php echo $donnees['IDmaison'] ?> value="<?php echo $donnees['nom']?>">
							
			        </form>
			        <?php    
			     }
			?>
			
			
			<div><font size="+4"><div id=textecercle><a href="ajout_maison.php">+</a></div></font></div>
		</div>
		
		
	</article>
	
	<footer>						
		<?php
            require("footer.php");
        ?>
	</footer>


	</body>
</html>