<?php 
session_start()
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
						
			<div id="conteneur3">
				<a href="informations.php">			
					Mes informations
				</a>
				<br />
				<br />
				
				<a href="redirection.php">			
					Se d&eacute;connecter
				</a>
				<br />
				<br />
				<a href="notification.php">
					Notifications	
					<?php
					include('../modele/config_init.php');
					
					$not = $bdd->query('SELECT * FROM notification');
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
			
			</div>
			
			<div id="profil">
	   		
				<img src="../images/photo.png" alt="Photo profil" width="125">
	   			<p>
	   				<?php
	   				
                         echo $_SESSION['mail'];
                    ?>
	   		</p>	
			</div>
  