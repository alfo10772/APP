<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">

		<link rel="stylesheet" href="../css/style.css">		<!--  lien vers style -->



		<title>page de connexion</title>				<!--  titre de la page -->
	</head>
	<body>
	
		<header>
			<p>

				<a href="../images/LogoHabilis.png">
					<img  src="../images/LogoHabilis.png" alt="Logo Habilis"  width="200">		<!--  logo Habilis -->
				</a>
				<br/>
					un produit de Domisep
			</p>
			<div id="conteneur1">
				<form  method="post" action="traitement.php">		<!-- début formulaire -->
					<div type="formulaire1">
					<label for="mail">								<!-- texte adresse mail -->
						adresse mail
					</label>
					<br />
						<input type="text" name="mail" placeholder="ex: nom.prenom@gmail.com" id="mail" required />	<!-- entrer l'adresse mail -->					
					<label for="password">							<!--  mot de passe -->
					<br />
						mot de passe
					</label>
					<br />
						<input type="password" name="password" id="password" required />	<!--  entrer le mot de passe -->
					<a href="recuperation_mdp.html">				<!--  lien vers la page de récupération de mot de passe -->
					<br />
						mot de passe oublié
					</a>
					<br />
					<a href="tableau_de_bord.html">					<!--  lien pour la page de tableau de bord -->
						<input type="submit" value="connexion" />	<!--  bouton pour se connecter -->
					</a>
					<br />
					<a href="page_d'inscriptionn.html">				<!--  lien vers la page d'incription -->
						<input type="submit" value="inscription" />	<!--  bouton pour aller à la page de connexion -->
					</a>
					<br />
					</div>	
				</form>
			</div>
	</header>
	<article>
	<br />
	<br />
	<br />
	<br />
	<br />


	Texte représentatif de l'entreprise

	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />


	Texte représentatif de l'entreprise
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	Texte représentatif de l'entreprise
	<br />
	<br />
	<br />
	<br />
	<br />

	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	Texte représentatif de l'entreprise
	<br />
	<br />
	Texte représentatif de l'entreprise
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />

	Texte représentatif de l'entreprise

	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />

	<br />


	Texte représentatif de l'entreprise
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	Texte représentatif de l'entreprise	
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />


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
		</div>
	</footer>
	</body>
	</html>