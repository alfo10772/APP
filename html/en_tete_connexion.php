<?php 
session_start();
if (empty($_SESSION)) {
 header('location: page_de_connexion.php'); //Redirige l'utilisateur vers la page de connexion s'il n'est pas encore connecté
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
					$id=$_SESSION['ID'];
					$nom= $bdd->query('SELECT utilisateur.nom FROM utilisateur WHERE IDutilisateur = "'. $id .'" ');
					$nom= $nom->fetch();
					$nom= $nom['nom'];
					

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
			
			
			
			
			
			
			
<style>
*{ margin:0; padding:0}
.box{ height:50px; width:125px; position:relative}
.mask{ position:absolute; height:100%; width:100%; top:5; left:0; background:#000; opacity:.3; display:none}
.sub{ position:absolute;top:5; left:0; padding:20px; color:#fff; font-size:12px; line-height:2; display:none}
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
<img src="../images/photo.png" alt="Photo profil" width="125"></a>
				
    <div class="mask"></div> 
    <p class="sub">Changer la photo</p>

			
		
		<p>
			
	   				<?php
	   				
                         echo $nom;
                    ?>
	   		</p>	
			</div>
  