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
	 <div >
	 	
		<form method="post" action="">
		<article class="forme_stats">
		<div class="selection_stats">
			<p>  
			    <h1>
			    	<abbr title="Les valeurs moyennes de temp&eacute;rature pour des pi&egrave;ces comme le salon, la cuisine, le bureau, etc.. 
doivent tourner autour des 19 degr&eacute;s C.Pour la salle de bain, la temp&eacute;rature doit &ecirc;tre d'environ 20 degr&eacute;s C.
Enfin les chambres doivent &ecirc;tre &agrave; une temp&eacute;rature de 16 degr&eacute;s durant la nuit car un espace frais peut favoriser 
un sommeil r&eacute;parateur. 
Pour les b&eacute;b&eacute;s, 3 degr&eacute;s C de plus sont n&eacute;cessaires du fait de leur fragilit&eacute;.">
			    		Temp&eacute;rature
			    	</abbr>.
			    </h1>
			
			    <label for="nom">
				Pi&egrave;ces:
				</label>
				</br>
				<select classe="réponse1" name="piece_t">
					
					<?php
					try
					{
					$bdd = new PDO('mysql:host=localhost;dbname=bdd_a;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // A modifier lors de l'hebergement
					}
					catch (Exception $e)
					{
				        die('Erreur : '.$e->getMessage());
					}
					$reponse = $bdd->query('SELECT piece.nom FROM piece JOIN maison ON (piece.IDmaison = maison.IDmaison) WHERE  selection = 1'); 
				
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
			</div>
			
			<div class="selection_stats">

			    <h1>
			    	<abbr title="Le taux d'humidit&eacute; relative tol&eacute;r&eacute;e est situ&eacute; entre 40 et 60% d'humidit&eacute. 
Un air trop humide peut provoquer des d&eacute;g&acirc;ts dans la maison et entra&icirc;ner 
des probl&egrave;mes de sant&eacute;. 
Un air trop sec peut favoriser la pr&eacue;sence de poussi&egrave;re et cr&eacute;er un 
ass&egrave;chement des muqueuses.">
					Humidit&eacute;
			    	</abbr>.
			    </h1>
			
			    <label for="nom">
				Pi&egrave;ces:
				</label>
				</br>
				<select class="réponse1" name="piece_h">
					
					<?php
					try
					{
					$bdd = new PDO('mysql:host=localhost;dbname=bdd_a;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // A modifier lors de l'hebergement
					}
					catch (Exception $e)
					{
				        die('Erreur : '.$e->getMessage());
					}
					$reponse = $bdd->query('SELECT piece.nom FROM piece JOIN maison ON (piece.IDmaison = maison.IDmaison) WHERE  selection = 1');
				
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
				</div>
				<div class="selection_stats">
 							<input type="submit" id="stats" value="Consulter" />
 				</div>
		</article>
		</form>
	</div>
	<div>
		<?php 
			
			$temp = $_
		
		?>
	</div>
</article>
<footer>						<!--  d&eacute;but du bas de la page -->
			<?php
                require("footer.php");
            ?>
</footer>
</body>
</html>