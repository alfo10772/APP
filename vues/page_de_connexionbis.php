<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">

		<link rel="stylesheet" href="../css/style.css">		<!--  lien vers style -->



		<title>Page de connexion</title>				<!--  titre de la page -->
	</head>
	<body>
		<?php 
       		include('../modele/config_init.php');
       	?>
		<header>
			<p>
                <a href = 'page_de_connexion.php'>
					<img  src="../images/LogoHabilis.png" alt="Logo Habilis"  width="200">		<!--  logo Habilis -->
                </a>
				<br/>
					Un produit de Domisep
			</p>
			<div id="conteneur1">
				<form  method="post" action="../traitements/traitement.php">		<!-- début formulaire -->
					<div type="formulaire1">
					<label for="mail">								<!-- texte adresse mail -->
						Adresse mail
					</label>
					<br />
						<input type="email" name="mail" placeholder="ex: nom.prenom@gmail.com" id="mail" required />	<!-- entrer l'adresse mail -->					
					<label for="password">	
					<br />						<!--  mot de passe -->
					<br />
						Mot de passe
					</label>
					<br />
						<input type="password" name="password" id="password" required />	<!--  entrer le mot de passe -->
					<br />
					<a href="tableau_de_bord.php">					<!--  lien pour la page de tableau de bord -->
						<input type="submit" value="Connexion" />	<!--  bouton pour se connecter -->
					</a>
					<a href="page_d'inscription.php">				<!--  lien vers la page d'incription -->
						<input type="button" value="Inscription" />	<!--  bouton pour aller à la page de connexion -->
					</a>
					</div>	
				</form>
			
				<span> Adresse mail ou Mot de passe incorrect, veuillez r&eacute;essayer !</span>
			</div>
	</header>
	<article>
		<br />
		<br />
		<div id=conteneurtxt>
		<?php	
            $reponse = $bdd->query('SELECT * FROM texte ');
       		$donnees = $reponse->fetch();	
       		
       		echo $donnees[1];
        ?>
		</div>

	</article>
	<footer>
		<?php
            require("footer.php");
        ?>
	</footer>
	</body>
	</html>