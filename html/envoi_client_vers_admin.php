<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<link rel="stylesheet" href="../css/style.css">	
		<title>Mes Messages</title>
	</head>

	<body>
	
		<header>
			<?php
                require("en_tete_connexion.php");
                
        	?>
        </header>

		<article>
			<h1> Envoi d'un Message &agrave; l'administrateur <h1>

			<section class='conteneur2'>
			<div id='conteneur2'>
				<form action='../traitements/traitement_message_client.php' method='post'>
					<input type='text' name='objet' placeholder='Objet du message'>
					<br/>
					<br/>
					<textarea name='message' placeholder='Votre message' style="height:100%; width:100%"></textarea>
					<br/>
					<br/>
					<input type='submit' id='envoi' value='Envoyer'>
				</form>
			</div>
			</section>

		</article>

	</body>

	<footer>
		<?php
			require("footer.php");
		?>
	</footer>

</html>
        