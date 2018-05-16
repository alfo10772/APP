<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<link rel="stylesheet" href="../css/style.css">	
		<title>Param&egrave;tres</title>
	</head>

	<body>

		<header>
			<?php
        require("en_tete_connexion.php");
        	?>
        </header>
        
    <article>
          <h1>Param&egrave;tres du tableau de bord<h1>

			  <?php 
       		include('config_init.php');
       	?>

		<div id="conteneur2">

		

		<div type="formulaire1">
			        Maison principale:
			        
			        
					<br />
			        <select name="nom_maison">
			        
			        	<?php 
       					
       					$reponse = $bdd->query('SELECT * FROM maison');
       					
       					while ($donnees = $reponse->fetch())
       					{
       					?>
                    		<option value ="<?php echo $donnees['nom']; ?>"><?php echo $donnees['nom'] ?></option>
                    	<?php 
       					}
                    	?>
                    
                    </select>
			<br />
			<br />
			Affichage dans le tableau de bord
			<br />
			<br />
			<?php
			$reponse = $bdd->query('SELECT * FROM utilisateur');
			$user = array();
			$i = 0;
			while ($donnees = $reponse->fetch())
			{

				$user[$i] = array($donnees['nom']);
				$i++;
				
			}
			for ($j = 0,$size = count($user);$j<$size;$j++)
			{
			echo implode (" ",$user[$j]);
			?>
			<select name="nom_piece">
			<option value="moyenne"> En moyenne </option>
			<?php 
       					
       					$reponse = $bdd->query('SELECT * FROM piece');
       					
       					while ($donnees = $reponse->fetch())
       					{
       					?>
                    		<option value ="<?php echo $donnees['nom']; ?>"><?php echo $donnees['nom'] ?></option>
                    	<?php 
       					}
                    	?>      
            </select> 
			<?php
			} 
			?>     
        </div>  
					

	</article>
	

    <footer>
		<p class="bordure1">
			<a href="faq.html">
				<strong>
					FAQ
				</strong>
			</a>
		</p>
		<p>
			<a href="condition_d'utilisation.html">
				Conditions g&eacute;n&eacute;rales d'utilisation
			</a>
		</p>
		<p>
			<a href="mentions_legales.html">
				Mentions l&eacute;gales
			</a>
		</p>
		<div>
			Date et heure
			<div id="afficherheure">
			</div>
			<script type="text/javascript">
			setInterval(function(){
    		document.getElementById('afficherheure').innerHTML = new Date().toLocaleTimeString();
			}, 1000);
			</script>
		</div>
	</footer>
</body>

