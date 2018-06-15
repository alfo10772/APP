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
                require("en_tete_connexion.php");    // on affiche l'en-tête de la page
                
        	?>
        </header>

		<article>
			<h1> Envoi d'un Message &agrave; l'administrateur <h1>

			<section class='conteneur2'>
			<div id='conteneur2'>
				<form action='../traitements/traitement_message_client.php' method='post'>       <!-- formulaire pour envoyer le message à l'administrateur avec l'objet du message et le message-->
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
			require("footer.php");                                          // on affiche le footer de la page
		?>
	</footer>

</html>
        