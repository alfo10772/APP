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
			    	<abbr title="Les valeurs moyennes de température pour 
			    	des pièces comme le salon, la cuisine, le bureau, etc.. doivent 
			    	tourner autour des 19°C. Pour la salle de bain, la température doit 
			    	être d'environ 20°. Enfin les chambres doivent être à une température 
			    	de 16° durant la nuit car un espace frais peut favoriser un sommeil 
			    	réparateur. Pour les bébés, 3° de plus sont nécessaires du fait 
			    	de leur fragilité.">
			    		Température
			    	</abbr>.
			    </h1>
			
			    <label for="nom">
				Pièces:
				</label>
				</br>
				<select classe="réponse1">
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
				<select classe="réponse1">
					<option value="valeur1">Moyenne de ce jour</option> 
				    	<option value="valeur2"selected>Moyenne de ce mois</option>
				   	<option value="valeur3">Moyenne de cette année</option>
				</select>
			
			    
			    <h2>
			    	<abbr title="Le taux d'humidité relative tolérée est 
			    	situé entre 40 et 60% d'humidité. Un air trop humide peut provoquer 
			    	des dégâts dans la maison et entrainer des problèmes de santé. Un air 
			    	trop sec peut favoriser la présence de poussière et créer un 
			    	assèchement des muqueuses.">
			    	Humidité
			    	</abbr>.
			    </h2>
			
			    <label for="nom">
				Pièces:
				</label>
				</br>
				<select classe="réponse1">
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
				<select classe="réponse1">
					<option value="valeur1">Moyenne de ce jour</option> 
				    	<option value="valeur2"selected>Moyenne de ce mois</option>
				    	<option value="valeur3">Moyenne de cette année</option>
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