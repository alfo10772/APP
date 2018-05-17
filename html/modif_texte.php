<!DOCTYPE html>
 <html>
<head>
 <meta charset="utf-8">
 

  
    <link rel="stylesheet" href="../css/style.css">		<!--  lien vers style -->

 	<title>Modifier les textes</title>				<!--  titre de la page -->
</head>
 <body>

	
		

 <header>
 	<?php
         require("en_tete_connexion.php");
	?>
 </header>
  	
  	
  	
 <article>
 
		<h1>Modification des textes</h1>
			
		<div style="float:left">
				<a href="tableau_de_bord.php">		
					<input type="submit" id="retour" value="Retour &agrave; la page d'accueil" />
				</a>
		</div> 
 
 
 <br/>
 <br/>
 <br/>
 <br/>
 <br/>
 
 	<div id=conteneurtexte>
 
 		<form  method="post" action=".php">
 			<div id="formulaire1">
 				<input type="text" placeholder="Modifier le texte de pr�sentation de l'entreprise" style="width:500px; height:125px">
 				<br/>
 				<br/>
 				<input type="submit" id="supprimer" value="Enregistrer" />
 	
 			</div>
 		</form>
 	<br/>
 	<br/>
 	<br/>
 	<br/>

 		<form  method="post" action=".php">
 			<div id="formulaire1">
 				<input type="text" placeholder="Modifier les conditions générales d'utilisation" style="width:500px; height:125px">
 				<br/>
 				<br/>
 				<input type="submit" value="Enregistrer" />
 			</div>
 		</form>
 	  <br/>
 	  <br/>
 	  <br/>
 	  
 	  </div>
 	 
  	</article>
 	
 	
 	
 	<footer>
		<?php
         require("footer.php");
	    ?>
 	 </footer>
 	 
  </body>
</html>
	
