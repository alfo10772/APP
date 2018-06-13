<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<link rel="stylesheet" href="../css/style.css">	
		<title>Page des maisons</title>
	</head>
	
	<body>
		<header>			<!--  Ajout header -->
			<?php
        require("en_tete_connexion.php");
        	?>
		</header>
		
		<article>
		
		<h1>Page des maisons</h1>
									<!--  Connexion à la bdd -->
		<?php 
       		include('../modele/config_init.php');
       	?>
       			
       	<br />
       		
		<div style="float:left">
			<a href="tableau_de_bord.php">		
				<input type="submit" id="retour" value="Retour &agrave; la page d'accueil" />
			</a>
		</div> 
						<!--  Affichage du bouton uniquement pour les utilisateurs principaux  -->
		<?php             
		if ($_SESSION['utilisateur']==0){
		    
		?>
		<div style="float:right">
			<a href="suppression_maison.php">		
				<input type="submit" id="retour" value="Supprimer une maison" />
				
			</a>
		</div>
		<?php 
		}
		?>
		
		<br/>
        <br/>
        <br/>
        								<!--  Récupération du nom des maison de l'utilisateur principal -->
        <?php
        
        $id=$_SESSION['ID'];
        $id_principal=$_SESSION['principal'];
        
        if($_SESSION['utilisateur']==1){
       		$reponse = $bdd->query('SELECT maison.nom, maison.IDmaison FROM maison INNER JOIN utilisateur ON maison.IDutilisateur=utilisateur.IDutilisateur WHERE(maison.IDutilisateur= "'.$id_principal.'")');
       		$selection = $bdd ->query('SELECT nom FROM maison WHERE selection = 1 AND IDutilisateur = "'.$id_principal.'"');
        }
        
        else{
            $reponse = $bdd -> query('SELECT maison.nom, maison.IDmaison FROM maison INNER JOIN utilisateur ON maison.IDutilisateur=utilisateur.IDutilisateur WHERE(utilisateur.IDutilisateur= "'.$id.'")');
            $selection = $bdd ->query('SELECT nom FROM maison WHERE selection = 1 AND IDutilisateur = "'.$id.'"');
        }
        
        
        $selected = $selection->fetch()[0];
        
        ?>
        							<!--  Affichage de la maison selectionnée en fonction de la bdd -->
        <br />
        
        <h2>La maison s&eacute;lectionn&eacute;e est : <?php echo $selected ?></h2>
        
        <?php 
        if($_SESSION['utilisateur']==0){ ?>
        <br />
		<h2> Cliquez sur une autre maison pour changer de maison </h2>
		
        <?php } ?>
        
		<div id="conteneurcercle">
				
			<?php 
       		
       		foreach ($reponse->fetchAll() as $donnees)
       			{
       			    ?>
       			    <form action="../traitements/selection_maison.php" method="post"> 		<!--  Formulaire pour modifier la maison selectionnée -->
       			   
       		        	<input type="hidden" name="id" value=<?php echo $donnees['IDmaison'] ?>></input>
						<input type="submit" id="bouton" name=<?php echo $donnees['IDmaison'] ?> value="<?php echo $donnees['nom']?>">
							
			        </form>
			        <?php    
			     }
			
		    if ($_SESSION['utilisateur']==0){
		    
		?>									<!--  Bouton qui envoie vers la page d'ajout d'une maison -->
			<div id="cercle">
				<a href="ajout_maison.php">
					<font size="+4"><div id=textecercle>+</div></font>
				</a>
			</div>
			
			<?php 
		    }
			?>
		</div>
		
		
	</article>
	
	<footer>									<!--  Ajout du footer -->
		<?php
            require("footer.php");
        ?>
	</footer>


	</body>
</html>