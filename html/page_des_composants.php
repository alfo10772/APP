<!DOCTYPE html>
<html>                                                  <!--squelette pour en-t�te et bas de page -->
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/style.css">
	<title>page des composants</title>
</head>
<body>

	<header>
		<p>
			<a href="../images/LogoHabilis.png">
				<img src="../images/LogoHabilisPetit.png" alt="Logo Habilis" width="150">
			</a>
			<br />
			
				Un produit de Domisep
				
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
					Se d�connecter
				</a>
			
			</div>
		<div id="profil">
			<img src="../images/photo.png" alt="Photo profil" width="125">
	   			<p>
	   			&nbspNom d'utilisateur
	   			</p>	
		</div>
	</header>
	<article>
	<h1>Page des composants</h1>
	
		<div style="float:left">
			<a href="tableau_de_bord.php">		
				<input type="submit" id="supprimer" value="Retour � la page d'accueil" />
			</a>
		</div> 
		
		<div style="float:right">
			<a href="suppression_composant.php">		
				<input type="submit" id="supprimer" value="Supprimer un composant"> 
			</a>
		</div>

	<div id="conteneurcercle">
		<div>Donn�es</div>
		<div>Donn�es</div>
		<div>Donn�es</div>
		<div>Donn�es</div>
		<div>Donn�es</div>
		<div>Donn�es</div>
		<div>Donn�es</div>
		<div>Donn�es</div>
		<div>Donn�es</div>
		<div>
		<a href="ajout_composant.php">
			<font size="+4">+</font>
		</a>
		</div>
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
				Condition g�n�rales d'utilisation
			</a>
		</p>
		<p>
			<a href="mentions_legales.html">
				Mentions l�gales
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