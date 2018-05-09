<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<link rel="stylesheet" href="../css/style.css">	
		<title>Ajout d'une maison</title>
	</head>
	
	<body>
		<header>
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
				
				<a href="page_de_connexion.php">			
					Se d&eacute;connecter
				</a>
			
			</div>
			
			<div id="profil">
	   		
				<img src="../images/photo.png" alt="Photo profil" width="125">
	   			<p>
	   				Nom d'utilisateur
	   			</p>	
			</div>
		</header>
		
		<article>
		
		<h1>Page des maisons</h1>
		
		<div style="float:left">
			<a href="tableau_de_bord.php">		
				<input type="submit" id="supprimer" value="Retour &agrave; la page d'accueil" />
			</a>
		</div> 
		
		<div style="float:right">
			<a href="suppression_piece.php">		
				<input type="submit" id="supprimer" value="Supprimer une maison" />
				
			</a>
		</div>
		
		
		<div id="conteneurcercle">
			<div>Maison 1</div>
			<div>Maison 2</div>
			<div>Maison 3</div>
			<div><font size="+4"><a href="ajout_maison.html">+</a></font></div>
		</div>
	
		
	</article>
	
	<footer>						<!--  d&eacute;but du bas de la page -->
		<p>
			<a href="faq.html">		<!--  lien vers la FAQ -->
				<strong>
					FAQ
				</strong>
			</a>
		</p>
		<p>
			<a href="condition_d'utilisation.html">		<!--  lien vers les conditions d'utilisations -->
				Conditions g&eacute;n&eacute;rales d'utilisation
			</a>
		</p>
		<p>
			<a href="mentions_legales.html">			<!--  lien vers les mentions l&eacute;gales -->
				Mentions l&eacute;gales
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