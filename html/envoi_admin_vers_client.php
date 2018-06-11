<?php
session_start();
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
	   require("menu_admin.php");
	   include("../modele/config_init.php");
    ?>

    <div class='contenu'>

<form method='post' action='../traitements/traitement_envoi_admin.php'>
<table>
<tr>
	<br />
	<br />
	<?php 
	$mail = $_POST['mail'];
	$_SESSION['envoi'] = $mail;
	echo "Envoi à $mail"; ?>
	<br />
	<br />
<textarea name='objet' placeholder='Objet du Message' style="height:2em; width:60%"></textarea>

    <br />
	<br />
	
	

</tr>
<tr>
<textarea name='message' placeholder='Votre message' style="height:20em; width:60%"></textarea>
<br />
<br />
<String mail= <?php echo $mail; ?>>
</tr>
<tr>
<div id='conteneur1'>
<input type='submit' id='envoi' value='Envoyer'>
</div>
</tr>
</table>
</form>
</div>
</div>

</body> 
</html>
