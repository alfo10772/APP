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
	<br/>
	
	<div id="conteneur2">
	
	<div id="Nom de la maison"  style="text-align:left;width:350px;height:50px;" >
			        Nom:
			        <br />
			        <select name="maison" id="maison">
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
                    <br/>
                    <br/>
                    <br/>
                    </div>
              
                    <script type="text/javascript">
                    function del(){
                    	if(!confirm("Etes-vous sur de vouloir supprimer cette maison?")){
                    		window.event.returnValue=false;	
                    	}
                    }
                    
                    </script>
                    <div id="button1" text-align="center">
                    <button type="button" style="background-color:lightgray;width:75px;height:30px; margin-left:500px"><a href="" onclick="javascript:return del();">Supprimer</a></button>
                    <button type="button" style="background-color:lightgray;width:75px;height:30px; margin-left:50px">Annuler</button>
                    
	                </div>
    
    
    
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