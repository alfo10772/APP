<!DOCTYPE html>
<html>
<head>
	<title>Statistiques</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<header>
			<?php
                require("en_tete_connexion.php");
	       ?>
</header>
<article>
	 <div id="conteneur2">
		<form method="post" action="../traitements/traitement_stats.php">
		
			<p>
			<br>
			    <h1>
			    	<abbr title="Les valeurs moyennes de temp&eacute;rature pour des pi&egrave;ces comme le salon, la cuisine, le bureau, etc.. 
doivent tourner autour des 19 degr&eacute;s C.Pour la salle de bain, la temp&eacute;rature doit &ecirc;tre d'environ 20 degr&eacute;s C.
Enfin les chambres doivent &ecirc;tre &agrave; une temp&eacute;rature de 16 degr&eacute;s durant la nuit car un espace frais peut favoriser 
un sommeil r&eacute;parateur. 
Pour les b&eacute;b&eacute;s, 3 degr&eacute;s C de plus sont n&eacute;cessaires du fait de leur fragilit&eacute;.">
			    		Temp&eacute;rature
			    	</abbr>
			    </h1>
				<br>
			    <label for="nom">
				Pi&egrave;ces:
				</label>
				</br>
				<select classe="réponse1" name="piece_t">
					
					<?php
					include('../modele/config_init.php');
					$id=$_SESSION['ID']; // on récupère l'id de l'utilisateur connecté
					$reponse = $bdd->query('SELECT piece.nom FROM piece JOIN maison ON (piece.IDmaison = maison.IDmaison) WHERE  maison.selection = 1 AND maison.IDutilisateur= "'.$id.'"'); 
					// permet de sélectionner les pièces de la maison sélectionnée uniquement (et de l'utilisateur connecté)
					while ($donnees = $reponse->fetch())
					{
	    			?>
	    			<option >
	    			<?php echo $donnees['nom']; ?>
	    			</option>
					<?php
					}
				
					$reponse->closeCursor(); 
				
					?>
					
			</section> 
					</option> 
				</select>
				</br>
				</br>
			    <label for="nom">
				Date:
				</label>
				</br>
				<select classe="réponse1" name="temps_t">
					<option value="valeur1">Moyenne de ce jour</option> 
				    	<option value="valeur2"selected>Moyenne de ce mois</option>
				   	<option value="valeur3">Moyenne de cette ann&eacute;e</option>
				</select>
				</br>		
				</br>
				</br>
			    <h1>
			    	<abbr title="Le taux d'humidit&eacute; relative tol&eacute;r&eacute;e est situ&eacute; entre 40 et 60% d'humidit&eacute. 
Un air trop humide peut provoquer des d&eacute;g&acirc;ts dans la maison et entra&icirc;ner 
des probl&egrave;mes de sant&eacute;. 
Un air trop sec peut favoriser la pr&eacue;sence de poussi&egrave;re et cr&eacute;er un 
ass&egrave;chement des muqueuses.">
					Humidit&eacute;
			    	</abbr>
			    </h1>
				</br>
			    <label for="nom">
				Pi&egrave;ces:
				</label>
				</br>
				<select class="réponse1" name="piece_h">
					
					<?php
					$reponse = $bdd->query('SELECT piece.nom FROM piece JOIN maison ON (piece.IDmaison = maison.IDmaison) WHERE maison.selection = 1 AND maison.IDutilisateur= "'.$id.'" ');
				    // permet de sélectionner les pièces de la maison sélectionnée uniquement (et de l'utilisateur connecté)
					while ($donnees = $reponse->fetch())
					{
	    			?>
	    			<option >
	    			<?php echo $donnees['nom']; ?>
	    			</option>
					<?php
					}
				
					$reponse->closeCursor(); 
				
					?>
					
				</select>
				</br>
				</br>
			    <label for="nom">
				Date:
				</label>
				</br>
				<select classe="réponse1" name="temps_h">
					<option value="valeur1">Moyenne de ce jour</option> 
				    	<option value="valeur2"selected>Moyenne de ce mois</option>
				    	<option value="valeur3">Moyenne de cette ann&eacute;e</option>
				</select>
				<br>
				<br>
				<div id="formulaire_1">
 							<input type="submit" id="stats" value="Consulter" />
 				</div>
		
		</form>
	</div>
</article>
<footer>						<!--  d&eacute;but du bas de la page -->
			<?php
                require("footer.php");
            ?>
</footer>
</body>
</html>