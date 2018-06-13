<?php 
session_start()
?>
<!DOCTYPE html>
<html>                                                  
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/style.css">
	<title>Mention légale</title>
</head>
<body>

	<header>
        <?php
        if(empty($_SESSION)) {
            require('header_connexion.php');
        }
        else {
            include('en_tete_connexionbis.php');
        }
        ?>
	</header>
	<article>
	<div id="condition">
		<p class="titre_condition">
			MENTIONS LEGALES
		</p>
		<p class="titre_condition">
			EDITEUR DU SITE
		</p>
		<p>	
			ISEP , 28 rue Notre Dame des Champs, 75006 PARIS – SIRET 784 280 745 00026 – APE
		</p>
		<p class="titre_condition">
			DÉCLARATION A LA CNIL
		</p>
		<p>
			Conformément à la Loi Informatique et Libertés, nous vous informons que la collecte de données personnelles associée à ce site a fait l’objet d’’une déclaration de traitement automatisé d’’informations nominatives auprès de la CNIL.
		</p>
		<p class="titre_condition">
			COLLECTE DE DONNEES NOMINATIVES
		</p>
		<p>
			Par donnée nominative nous entendons toute information qui permet de vous identifier soit directement soit indirectement.
		</p>
		<p class="titre_condition">
			LES FORMULAIRES
		</p>
		<p>
			Nous recueillons des données nominatives par l’intermédiaire des formulaires de demande d’information. Les informations recueillies font l’objet d’un traitement informatique destiné à vous informer et répondre à votre demande.
		<p class="titre_condition">
			DIVULGATION DES DONNEES
		</p>
		<p>
			ISEP s’engage à garantir le respect de la vie privée des internautes qui visitent ce site web et à veiller dans les limites de l’état de l’art à la confidentialité des informations personnelles qui lui sont transmises.
			Les destinataires des données sont  ISEP et ses collaborateurs uniquement.
		</p>
		<p class="titre_condition">
			DROITS D’ACCES, DE MODIFICATION ET DE SUPPRESSION DES DONNEES
		</p>
		<p>
			Conformément à la loi «informatique et libertés» du 6 janvier 1978, vous bénéficiez d’un droit d’accès et de rectification aux informations qui vous concernent. Si vous souhaitez exercer ce droit et obtenir communication des informations vous concernant, veuillez adresser un courrier à M. Michel Ciazynski,  ISEP ,  28 rue Notre Dame des Champs, 75006 Paris, en joignant une photocopie de votre carte d’identité.
			Afin de répondre à votre demande, merci de nous fournir quelques indications (date et contexte de votre dernier contact avec ISEP.  Merci également d’indiquer un numéro de téléphone pour vous joindre si nous avons besoin de précision pour traiter avec célérité votre demande.
			Vous pouvez également, pour des motifs légitimes, vous opposer au traitement des données vous concernant.
		</p>
		<p class="titre_condition">
			COOKIES
		</p>
		<p>
			Vous êtes visiteur du site web Vous pouvez consulter le site sans avoir à vous identifier. Nous respectons l’anonymat de nos visiteurs. Nous n’établissons pas de profil des visiteurs
			Les données de connexion au site (fichiers log) sont utilisées uniquement pour la sécurité du site (détection d’éventuelles intrusions) et pour estimer la fréquentation générale du site (exemple : les rubriques les plus consultées).
			Nous utilisons des cookies persistants (Un cookie est un petit bloc de données envoyé par un serveur web et stocké sur le disque dur de votre ordinateur).
			Les cookies que nous utilisons (si nécessaire) ne permettent pas de vous identifier. Ils nous permettent juste de mémoriser les caractéristiques d’un utilisateur durant l’une de ses visites, pour lui éviter notamment de saisir plusieurs fois ses coordonnées.
			Dès que vous quitterez notre site web, le cookie que nous avons généré va disparaître du disque dur de votre ordinateur. Notre objectif n’est pas de reconnaître votre machine lors de vos consultations ultérieures.
			Vous pouvez refuser les cookies en configurant votre navigateur, notre site vous restera accessible. En modifiant les options de votre navigateur, vous pouvez demander d’être averti lors de l’activation d’un cookie, ou refuser l’ensemble des cookies. Si vous choisissez cette dernière option, notre site web vous restera accessible, mais il est possible que votre navigation soit moins confortable.
		</p>
		<p class="titre_condition">
			CHAMP D’APPLICATION
		</p>
		<p>
			La présente ne s’applique qu’aux données collectées sur ce Site Web. Ce dernier contient des liens vers d’autres sites. Veuillez noter que ISEP n’exerce aucun contrôle ni aucune influence sur les polices de protection des autres sites. Nous encourageons nos utilisateurs à être attentifs, lorsqu’ils quittent le Site Web, et à lire les chartes de protection des données personnelles de chacun des autres sites qu’ils visitent.
		</p>
		<p class="titre_condition">
			ACCEPTATION
		</p>
		<p>
			En utilisant ce site Web, vous acceptez implicitement les termes de notre politique de traitement des données personnelles et vous nous autorisez à traiter ces données conformément aux objectifs énoncés ci-dessus.
		<p class="titre_condition">
			MISE A JOUR
		</p>
		<p>
			Nous nous réservons le droit de modifier périodiquement cette page. Veuillez de ce fait lire régulièrement les présentes.
		</p>
	</article>
	<footer>
        <?php
        require('footer.php');
        ?>
	</footer>
</body>