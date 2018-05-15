<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">

		<link rel="stylesheet" href="../css/style.css">		<!--  lien vers style -->
		<title>Suppression d'une maison</title>
	</head>
	
	<body>
		<header>
			<?php
        require("en_tete_connexion.php");
        	?>
		</header>
		
	<article>
	
	<h1>Suppression d'une maison</h1>
	
	<?php 
       		include('config_init.php');
       	?>
       	
	<div style="float:left;width:250px;height:10px;">
			<a href="maison.php">		
				<input type="submit" id="supprimer" value="Retour &agrave; la page des maisons" />
			</a>
		</div>
	
	<br/> 
	<br/>
	<br/>
	
	<div id="conteneur2">
	
		<form action="traitement_suppression_maison.php" method="post">
			<div type=formulaire1>
			        Nom:
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
              </div> 
              
              <br/>
              <br/>
                    
              <input type="submit" id="supprimer" value="Supprimer" />
              <input type="submit" id="supprimer" value="Annuler" />
              
         </form>
                    
       </div>
       
   		<br/>
   		<br/>
    
     
    
	
	</article>
	<footer>						<!--  début du bas de la page -->
		<p>
			<a href="faq.html">		<!--  lien vers la FAQ -->
				<strong>
					FAQ
				</strong>
			</a>
		</p>
		<p>
			<a href="condition_d'utilisation.html">		<!--  lien vers les conditions d'utilisations -->
				Condition générales d'utilisation
			</a>
		</p>
		<p>
			<a href="mentions_legales.html">			<!--  lien vers les mentions légales -->
				Mentions légales
			</a>
		</p>
		<div>
			Date et heure								<!--  affichage de la date et l'heure -->
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
	</html>