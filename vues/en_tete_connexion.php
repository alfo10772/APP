<?php 
session_start();
if (empty($_SESSION)) {
 header('location: page_de_connexion.php'); //Redirige l'utilisateur vers la page de connexion s'il n'est pas encore connect�
}
if ($_SESSION['utilisateur']==2){
    header('location: client.php');         //Si l'utlisateur est administrateur le rediriger vers sa page admin
}
?>


 <p>
			<a href="tableau_de_bord.php">
				<img src="../images/LogoHabilis.png" alt="Logo Habilis" width="150">
			</a>	
			
			<br />
				Un produit de Domisep
			</p>
			
			<p>
				<br />
				
			</p>
			
			<?php    
			
			include('../modele/config_init.php');
			$id=$_SESSION['ID'];
			$nom= $bdd->query('SELECT utilisateur.nom FROM utilisateur WHERE IDutilisateur = "'. $id .'" ');
			$nom= $nom->fetch();
			$nom= $nom['nom'];
			
		    if ($_SESSION['utilisateur']==1){
		     ?>			
		     	<div id="conteneur3bis">
					<a href="informations.php">			
						Mes informations
					</a>
					<br />
				
					<a href="redirection.php">			
						Se d&eacute;connecter
					</a>
		     	</div>
		     
		     <?php 
		    }
		    
		    elseif ($_SESSION['utilisateur']==0){
		    ?>
			<div id="conteneur3">
				<a href="informations.php">			
					Mes informations
				</a>
				<br />
				
				<a href="redirection.php">			
					Se d&eacute;connecter
				</a>
				<br />
				
				<a href="notification.php">
					Notifications	
					<?php
					
					$not= $bdd->query('SELECT * FROM notification WHERE IDutilisateur = "'. $id .'" ');
				
					

					$sum=0;
					foreach ($not->fetchAll() as $donnees) {
					    $sum+=$donnees['etat'];
					}
					if($sum!=0)
					{
                    ?>		
					<img src="../images/alarm2.png" alt="Photo profil" width="18">
					<?php
					}
					?>
				</a>
				<br />
				
				<a href="message_client.php">
					Mes Messages
					<?php

					$rep= $bdd->query('SELECT * FROM message WHERE IDclient = "'. $id .'" ');
				
					

					$sum=0;
					foreach ($rep->fetchAll() as $don) {
					    $sum+=$don['etatclient'];
					}
					if($sum!=0)
					{
                    ?>		
					<img src="../images/alarm2.png" alt="Photo profil" width="18">
					<?php
					}
					?>
				</a>
			
			</div>
			<?php 
		    }
			?>
			

		<div id="imgBox" class="box">
			<a href="informations.php">
				<img src="../images/photo.png" alt="Photo profil" height="155" width="150">
			</a>

		<p>
	   	<?php
	   				
            echo $nom;          //Afficher le nom du client 
         ?>
	   	</p>	
		</div>