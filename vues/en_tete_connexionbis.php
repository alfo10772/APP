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
				
				<a href="redirection.php">			
					Se d&eacute;connecter
				</a>
				<br />
				
				<a href="notification.php">
					Notifications	
					<?php
					include('../modele/config_init.php');
					$id=$_SESSION['ID'];
					$nom= $bdd->query('SELECT utilisateur.nom FROM utilisateur WHERE IDutilisateur = "'. $id .'" ');
					$nom= $nom->fetch();
					$nom= $nom['nom'];
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
			
			
			
			
			
			
			
<style>
*{ margin:0; padding:0}
.box{ height:155px; width:155px; position:relative;padding:20px;}
.mask{ position:absolute; height:45px; width:150px; top:5; left:20px; background:#000; opacity:.3; display:none}
.sub{ position:absolute;top:5; left:20px; padding:22px; color:#fff; font-size:15px; line-height:2; display:none}
.txtShow .mask,.txtShow .sub{ display:block;}
</style>


<script>
window.onload=function(){
var oDiv=document.getElementById('imgBox');

oDiv.onmouseover=function(){
this.className='box txtShow';
};
oDiv.onmouseout=function(){
this.className='box';
}


}
</script>
<div id="imgBox" class="box">
<a href="informations.php">
<img src="../images/photo.png" alt="Photo profil" height="155" width="150"></a>
				
    <div class="mask"></div> 
    <p class="sub">Changer la photo</p>

			
			
		
		<p>
			
	   				<?php
	   				
                         echo $nom;
                    ?>
	   		</p>	
			</div>
  