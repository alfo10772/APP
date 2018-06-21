<?php 
session_start();
if (empty($_SESSION)) {
    header('location: page_de_connexion.php'); //Redirige l'utilisateur vers la page de connexion s'il n'est pas encore connect�
}
?>

<div class="menu-vertical">  <!--  Cr�ation du menu vertical -->
		<p>
			<a href= "../vues/administration.php">
			<img src="../images/Logo4.png" alt="Logo Habilis" width="150">
			</a>
		</p>
		<a href="client.php"><div class="menu">Clients</div></a>
		<a href="admin_message.php"><div class="menu">Messages
									
		<?php
				include('../modele/config_init.php');          //Connexion � la bdd 
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
		</div></a>
		<a href="modif_texte.php"><div class="menu">Modifier les textes</div></a>
		<a href="modif_article.php"><div class="menu">Modifier les articles</div></a>
		<a href="vu_faq.php"><div class="menu">Modifier la FAQ</div></a>
		<a href="redirection.php"><div class="menu">Se d&eacute;connecter</div></a>
		
</div>

