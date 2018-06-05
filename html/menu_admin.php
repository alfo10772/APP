<?php 
session_start();
if (empty($_SESSION)) {
    header('location: page_de_connexion.php'); //Redirige l'utilisateur vers la page de connexion s'il n'est pas encore connect�
}
?>

<div class="menu-vertical">
		<p>
			<img src="../images/Logo4.png" alt="Logo Habilis" width="150">
		</p>
		<div class="menu"><a href="client.php">Clients</a></div>
		<div class="menu"><a href="admin_message.php">Messages</a></div>
		<div class="menu"><a href="modif_texte.php">Modifier les textes</a></div>
		<div class="menu"><a href="modif_article.php">Modifier les articles</a></div>
		<div class="menu"><a href="repondre_FAQ.php">Modifier la FAQ</a></div>
		<div class="menu"><a href="page_de_connexion.php">Se d&eacute;connecter</a></div>
		
</div>

