<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/style.css">
	<title>Page d'inscription</title>
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
	</header>
	<article>
	<h1>
			Page d'inscription
	</h1>
	<section class="conteneur2">
	<div id="conteneur2">
		<form method="post" action="traitement_inscription.php">
			<script src="https://www.google.com/recaptcha/api.js" async defer></script>
			
       		<label for="nom_d'utilisateur">
       				Nom d'utilisateur :
       				<em>
       					*
       				</em>
       			</label>
       			<br />
       				<input type="text" name="username" id="nom_d'utilisateur" required />
				<br />
				<br />
       			<label for="password">
       				Mot de passe :
       				<em>
       					*
       				</em>
       			</label>
       			<br />
       				<input type="password" name="password" id="password" required />
       			<br />
       			<br />
       			<label for="confirmed_password">
       				Confirmer le mot de passe :
       				<em>
       					*
       				</em>
       			</label>
       			<br />
       				<input type="password" name="confirmed_password" id="confirmed_password" required />
       			<br />
       			<br />
       			<label for="mail">
       				Adresse mail :
       				<em>
       					*
       				</em>
       			</label>
       			<br />
       				<input type="email" name="mail" id="mail" required />
       			<br />
       			<br />
       			<label for="numero_de_tel">
       				Num�ro de t�l�phone :
       			</label>
       			<br />
       				<input type="tel" name="numero_de_tel" id="numero_de_tel" />
       			<br />
       		<div class="g-recaptcha" data-sitekey="la_cl�_du_site"></div> <!-- rentrer les informations dans la balise apr�s avoir rempli les champs sur ce site https://www.google.com/recaptcha/admin#list -->	
				
				<label for="accept_use_condition">
					<p>
						<a href="condition_d'utilisation.html">
       						J'accepte les conditions g&eacute;n&eacute;rales d'utilisation
       					</a>
       				<em>
       					*
       				</em>
       				</p>
       			</label>
       			<input type="checkbox" name="accept_use_condition" id="accept_use_condition" />
				<br />
       		<input type="submit" value="Valider" />	
		</form>
	</div>
	<p class="obligatoire">
		* : Champs obligatoires
	</p>
	</section>
	</article>
	<footer>
		<p class="bordure1">
			<a href="faq.html">
				<strong>FAQ</strong>
			</a>
		</p>
		<p>
			<a href="condition_d'utilisation.html">
				Conditions g�n�rales d'utilisation
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