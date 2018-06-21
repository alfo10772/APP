<?php 
session_start()
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">

		<link rel="stylesheet" href="../css/style.css">		

		<title>Contacts</title>
	</head>
	
	<body>
	
	<header>
		<?php
        if(empty($_SESSION)) {
            require('header_connexion.php');           //Si aucun utilisateur n'est connecte            
        }
        else {
            include('en_tete_connexionbis.php');       // Si un utilisateur est deja connectee
        }
        ?>
	</header>
	
	<article>
		<h1> Page des contacts </h1>
	
		<br />
		<br />
		<br />
		
		<?php 
       		include('../modele/config_init.php');
       	?>
       	
		<div id="conteneurinfo">
			<?php	
       		   $reponse = $bdd->query('SELECT * FROM contact ');
       		   $donnees = $reponse->fetch();
       		   
       	    ?>
       	    
       	    Num&eacute;ro de t&eacute;l&eacute;phone : <?php echo $donnees[1];?>
       	    
       	    <br />
       	    <br />
       	    
       	    Mail : <?php echo $donnees[2];?>
       	    
       	    <br />
       	    <br />
       	    
       	    Service apr&egrave;s vente : <?php echo $donnees[3];?>
       	
       	</div>
	
	</article>
	
	<footer>
						
		<?php
            require("footer.php");
        ?>
	
	</footer>