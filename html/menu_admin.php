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
		<div class="menu"><a href="admin_message.php">Messages</a>
		<?php
				include('../modele/config_init.php');
				$rep= $bdd->query('SELECT * FROM message');
				
					

				$sum=0;
				foreach ($rep->fetchAll() as $don) {
					$sum+=$don['etatadmin'];
				}
				if($sum!=0)
				{
                ?>		
				<img src="../images/alarm2.png" alt="Photo profil" width="18">
				<?php
				}
				?>
		</div>
		<div class="menu"><a href="modif_texte.php">Modifier les textes</a></div>
		<div class="menu"><a href="modif_article.php">Modifier les articles</a></div>
		<div class="menu"><a href="vu_faq.php">Modifier la FAQ</a></div>
		<div class="menu"><a href="redirection.php">Se d&eacute;connecter</a></div>
		
</div>

