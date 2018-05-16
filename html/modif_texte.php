<!DOCTYPE html>
 <html>
<head>
 <meta charset="utf-8">
 

  
    <link rel="stylesheet" href="../css/style.css">		<!--  lien vers style -->

 	<title>modifier le texte</title>				<!--  titre de la page -->
</head>
 <body>

	
		
 <div id="conteneur3">
 <header>
 	<?php
         require("en_tete_connexion.php");
	?>
 </header>
  	
  	
  	
 <article>
 
 
 <button type="button" style="background-color:lightgray;width:200px;height:40px;"><a href="tableau_de_bord.php" >Retour à la page d'accueil</a></button>
 <br/>
 <br/>
 <br/>
 
 <div id="text"  align="center">
 <textarea placeholder="Modifier le texte de la page" style="width:500px; height:125px"></textarea>
 <br/>
 <button type="button" style="background-color:lightgray;width:75px;height:30px; margin-left:425px">Enregistrer</button>
 <br/>
 <br/>

 		
 		<textarea placeholder="Modifier les conditions générales d'utilisation" style="width:500px; height:125px"></textarea>
 		<br/>
 		<button type="button" style="background-color:lightgray;width:75px;height:30px; margin-left:425px">Enregistrer</button>
 
 	
 	  <br/>
 	  <br/>
 	  <br/>
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
				Condition générales d'utilisation
			</a>
		</p>
		<p>
			<a href="mentions_legales.html">
				Mentions légales
			</a>
		</p>
		<div>
			Date et heure
			</div>
			<div id="afficherheure">
			
			<script type="text/javascript">
			setInterval(function(){
    		document.getElementById('afficherheure').innerHTML = new Date().toLocaleTimeString();
			}, 1000);
			</script>
		
		</div>
		</div>	
  </footer>
  </body>
  </html>
	
