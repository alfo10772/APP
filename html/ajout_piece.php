<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<link rel="stylesheet" href="../css/style.css">	
		<title>ajout_piece</title>
	</head>

	<body>

		<header>
			<p>
			<a href="../images/LogoHabilis.png">
				<img src="../images/LogoHabilis.png" alt="Logo Habilis" width="150">
			</a>
			<br />
				Un produit de Domisep
			</p>
			
			
			<div id="conteneur1">
				<br />
				<br />
				<a href="informations.html">			
					Mes informations
				</a>
				
				<a href="page_de_connexion.php">			
					Se déconnecter
				</a>
				<br />
				<br />
				<br />
			
			</div>
			<div id="conteneur1">
	   		
	   			<a href="../images/photo.png">
					<img src="../images/photo.png" alt="Photo profil" width="125">
	   			</a>
	   			
	   				Nom d'utilisateur
	   				
	   			<br />
	   			<br />
			</div>
		</header>


	<section id="PremiereSection">
		<h1>
			Ajout de pièce
		</h1>
		
	</section>
	
	<section id="PremiereSection">	
		<nav>
		
		<ul> 

  
            <li class="menu_maison.html"> 
            	<a href="maison.php">
                	Maison 
         		</a>
         			
         			<ul class="submenu">
         			
         				<li><a href="#"> Maison 1</a></li>
         				<li><a href="#"> Maison 2</a></li>
         				<li><a href="#"> Maison 3</a></li>
         				
         			</ul>
                
      		</li>
        
      		
		</ul>
		
		</nav>
		
	</section>
		
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
