<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<link rel="stylesheet" href="../css/style.css">	
		<title>Piece</title>
	</head>

	<body>

		<header>
			<?php
        require("en_tete_connexion.php");       //Affichage du header
        	?>
		</header>
		
	<article>
		
		<h1>Page des pi&egrave;ces</h1>
		
		<?php 
       		include('../modele/config_init.php');      // Connexion � la BDD
       	?>
       				
		<br />
		
		<div style="float:left">
			<a href="tableau_de_bord.php">		<!-- Bouton de retour -->
				<input type="submit" id="retour" value="Retour &agrave; la page d'accueil" />
			</a>
		</div> 
		
		<?php 
		if ($_SESSION['utilisateur']==0){     //Test pour savoir si l'utilsateur connect� est principal
		    
		?>
		
		<div style="float:right">
			<a href="suppression_piece.php">		<!-- Bouton que seul un utilisateur principal peut avoir -->
				<input type="submit" id="retour" value="Supprimer une piece" />
				
			</a>
		</div>
		
		<?php 
		}
		?>
		<div id="conteneurcercle">
			<?php	
			
			$id=$_SESSION['ID'];
			$id_principal=$_SESSION['principal'];    //R�cup�re l'ID de l'utilisateur principal
			
			if($_SESSION['utilisateur']==1){     //Test pour savoir s'il s'agit d'un utilisateur secondaire
			    $reponse = $bdd->query('SELECT piece.nom, IDpiece FROM piece JOIN maison ON (piece.IDmaison = maison.IDmaison) WHERE maison.IDutilisateur= "'. $id_principal .'" AND maison.selection = 1');
			    //Comme il s'agit d'un utilisateur secondaire, on cehrcher la piece de la maison s�lectionn�e li�e � l'utilisateur principal
			    //La requ�te s�lectionne le nom et l'ID de la pi�ce li�e � l'utilisateur principal
			}
			else {
			    $reponse = $bdd->query('SELECT piece.nom, IDpiece FROM piece JOIN maison ON (piece.IDmaison = maison.IDmaison) WHERE maison.IDutilisateur= "'. $id .'" AND maison.selection = 1');
			    //Dans ce cas (o� il s'agit d'un utilisateur principal) on s�lectionne directement les nom et Id de la pi�ce li�e � son propre ID
			}
       					
       		foreach ($reponse->fetchAll() as $donnees)
       			{
       			    
       		        ?>
       		        	<form action="../traitements/exemple_piece.php" method="post">		<!-- D�but du formulaire -->
							<input type="hidden" name="id" value="<?php echo $donnees['IDpiece']?>">		<!-- bouton hidden qui sert � r�cup�rer l'ID de la pi�ece  -->
							<input type="submit" id="bouton" name=<?php echo $donnees['IDpiece'] ?> value="<?php echo $donnees['nom']?>">		<!-- Bouton qui m�ne � la pges des composants pr�sents dans la pi�ce -->
			
						</form>		<!-- Fin du formulaire -->
						<?php 
       			}
			
       		if ($_SESSION['utilisateur']==0){      //Test pour savoir s'il s'agit d'un utilisateur principal
       			    
       	   ?>
			<div id="cercle">
				<a href="ajout_piece.php">		<!-- Bouton qui m�ne � l'ajout d'une pi�ce (uniquement possible pour un utilisateur principal) -->
					<font size="+4"><div id=textecercle>+</div></font>
				</a>
			</div>
			
			<?php 
       		}
			?>
			
		</div>
	
		
	</article>
	
	<footer>	
		<?php
            require("footer.php");      //Affichage du footer
        ?>
	</footer>