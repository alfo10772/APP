<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../css/style.css">	
		<title>R&eacute;cup&eacute;ration du Mot de Passe</title>
	</head>

	<body>
	
		<header>
			<?php
        		require("header_connexion.php");
        	?>
        </header>

		<article>
		<h1>
		R&eacute;cup&eacute;ration du Mot de Passe
		</h1>

        <section class='conteneur2'>
		<div id='conteneur2'>
			<form name='myForm' method='post' action='../traitements/traitement_mdp3.php' onsubmit="return validateForm()">
            <script src="../javascript/inscription.js"></script>
                <br />
				<br />
				Confirmer l'Adresse mail :
				<br />
				
				<input type="email" name="mail" id="mail" required />
				<br />
				<br />
				Nouveau Mot de Passe :
				<br />
				<span id='results'> </span>
				<input type="password" name="password" id='password' required />
				<br />
                <br />
                Confirmer le Nouveau Mot de Passe :
                <br />
                <span id='result'> </span>
                <input type="password" name="confirmed_password" id='confirmed_password' required />
            
				<br />
				<input type='submit' value='Suivant'>
			</form>
		</div>
		</section>