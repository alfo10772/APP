<?php
session_start();             // on commence une session
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../css/style.css">
	<title>Page des contacts</title>
</head>
<body>

 
<div id='article2'> 
    <?php  
	   require("menu_admin.php");                        // on affiche le menu de l'administrateur
	   include("../modele/config_init.php");			 // on importe la base de données
    ?>

    <div class='contenu'>

<form method='post' action='../traitements/traitement_envoi_admin.php'>            <!-- formulaire d'envoi du message -->
<table>
<tr>
	<br />
	<br />
	<?php 
	$mail = $_POST['mail'];
	$_SESSION['envoi'] = $mail;                             // on récupère le mail du destinataire
	echo "Envoi à $mail"; ?>
	<br />
	<br />
<textarea name='objet' placeholder='Objet du Message' style="height:2em; width:60%"></textarea>           <!-- On entre l'objet du message -->

    <br />
	<br />
	
	

</tr>
<tr>
<textarea name='message' placeholder='Votre message' style="height:20em; width:60%"></textarea>           <!-- On entre le message -->
<br />
<br />
<String mail= <?php echo $mail; ?>>
</tr>
<tr>
<div id='conteneur1'>
<input type='submit' id='envoi' value='Envoyer'>                       <!-- On appuie sur le bouton pour envoyer le message -->
</div>
</tr>
</table>
</form>
</div>
</div>

</body> 
</html>
