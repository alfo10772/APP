<?php 
session_start()
?>

 <p>
			
				<img src="../images/LogoHabilis.png" alt="Logo Habilis" width="150">
			
			<br />
				Un produit de Domisep
			</p>
			
			<p>
				<br />
				
			</p>
						
			<div id="conteneur3">
				<br />
				<br />
				<a href="informations.php">			
					Mes informations
				</a>
				<br />
				<br />
				
				<a href="redirection.php">			
					Se d&eacute;connecter
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
  