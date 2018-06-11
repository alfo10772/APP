<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../css/style.css">	
		<title>G&eacute;rer les utilisateurs secondaires</title>
	</head>

	<body>

		<header>
			<?php
        require("en_tete_connexion.php");
        	?>
		</header>
		
	<article>
		
		<h1>G&eacute;rer les utilisateurs secondaires</h1>
		<br>
		<br>
		<div id="conteneursecond">
		<table id="secondaire">
       		     	<tr>
       		       		<th id="nom">Nom</th>
       		        	<th id="mail">Adresse mail</th>
       		        	<th id="type">Type</th>
       		        	<th id="changer">Changer le type</th>

       		        </tr>
       		        
       		      <?php
       		       include('../modele/config_init.php');
		            $id=$_SESSION['ID'];
		            $reponse = $bdd->query('SELECT * FROM utilisateur WHERE IDprincipal = "'. $id .'" ');
       		        foreach ($reponse->fetchAll() as $donnees) {
       		       ?>
  					<tr>
					<form method="post" action="../traitements/gestion_secondaire.php">
     					<td id="changer"><?php echo $donnees['nom'];?></td>
     					<td id="changer"><?php echo $donnees['mail'];?></td>
     					<td id="changer">
     					<?php if($donnees['type']==1) {?> Utilisateur secondaire <?php } else{?> Utilisateur principal <?php }?>
     					</td>
     					<td id="changer">
     					<abbr title="Un utilisateur principal poss&egrave;de des droits que l'utilisateur secondaire n'a pas, comme par exemple les gestion des composants, des pi&egrave;ces, et des maisons (ajouter ou supprimer un &eacute;l&eacute;ment).
L'utilisateur secondaire peut uniquement voir les donn&eacute;es des composants et effectuer des actions basiques comme allumer les lumi&egrave;res ou ouvrir les volets. ">
     						<input type="submit" id="seconda" value=<?php 
     						if($donnees['type']==1) {?> "Devenir utilisateur principal" <?php } else{?> "Devenir utilisateur secondaire"<?php }?> >
     						</abbr>
     						<input type="hidden" name="id" value="<?php echo $donnees['IDutilisateur'];?>">
     						<input type="hidden" name="type" value="<?php echo $donnees['type'];?>">
     					</td>
     				</tr>
  					</form> 
  					<?php
                        }
                    ?>
  				</table>
		
		<div style="float:right; margin-bottom:1%; margin-top:auto; width:40%; margin-left:auto; margin-right:auto;">
		<br/>
		<br/>
		<a href="ajout_secondaire.php">		
			<input type="submit" id="seconda" value="Ajouter un utilisateur secondaire" />
		</a>
		</div>
		</div>
	</article>
	
	
	<footer>						<!--  d&eacute;but du bas de la page -->
		<?php
            require("footer.php");
        ?>
	</footer>