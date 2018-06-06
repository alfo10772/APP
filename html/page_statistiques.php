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
	 <div>
		<form method="post" action="traitement.php">
		
			<p>  
			    <h1>
			    	<abbr title="Les valeurs moyennes de temp�rature pour 
			    	des pi�ces comme le salon, la cuisine, le bureau, etc.. doivent 
			    	tourner autour des 19�C. Pour la salle de bain, la temp�rature doit 
			    	�tre d'environ 20�. Enfin les chambres doivent �tre � une temp�rature 
			    	de 16� durant la nuit car un espace frais peut favoriser un sommeil 
			    	r�parateur. Pour les b�b�s, 3� de plus sont n�cessaires du fait 
			    	de leur fragilit�.">
			    		Temp�rature
			    	</abbr>.
			    </h1>
			
			    <label for="nom">
				Pi�ces:
				</label>
				</br>
				<select classe="r�ponse1">
					<option value="valeur1"selected>Salon</option> 
				    	<option value="valeur2">Cuisine</option>
				    	<option value="valeur3">Salle de bain</option>
				   	<option value="valeur4">Chambre 1</option> 
				   	<option value="valeur5">Chambre 2</option>
				    	<option value="valeur6">Chambre 3</option>
				</select>
			
			
			    <label for="nom">
				Date:
				</label>
				</br>
				<select classe="r�ponse1">
					<option value="valeur1">Moyenne de ce jour</option> 
				    	<option value="valeur2"selected>Moyenne de ce mois</option>
				   	<option value="valeur3">Moyenne de cette ann�e</option>
				</select>
			
			    
			    <h2>
			    	<abbr title="Le taux d'humidit� relative tol�r�e est 
			    	situ� entre 40 et 60% d'humidit�. Un air trop humide peut provoquer 
			    	des d�g�ts dans la maison et entrainer des probl�mes de sant�. Un air 
			    	trop sec peut favoriser la pr�sence de poussi�re et cr�er un 
			    	ass�chement des muqueuses.">
			    	Humidit�
			    	</abbr>.
			    </h2>
			
			    <label for="nom">
				Pi�ces:
				</label>
				</br>
				<select classe="r�ponse1">
					<option value="valeur1"selected>Salon</option> 
					<option value="valeur2">Cuisine</option>
					<option value="valeur3">Salle de bain</option>
					<option value="valeur4">Chambre 1</option> 
					<option value="valeur5">Chambre 2</option>
					<option value="valeur6">Chambre 3</option>
				</select>
			
			
			    <label for="nom">
				Date:
				</label>
				</br>
				<select classe="r�ponse1">
					<option value="valeur1">Moyenne de ce jour</option> 
				    	<option value="valeur2"selected>Moyenne de ce mois</option>
				    	<option value="valeur3">Moyenne de cette ann�e</option>
				</select>
		
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