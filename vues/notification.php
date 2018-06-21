<!DOCTYPE html>
<html>                                                  
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/style.css">
	<title>Page des notifications</title>
</head>
<body>

	<header>
		<?php
            require("en_tete_connexion.php");       //Affichage du header
        ?>
	</header>

	<article>
		
		<h1>Notifications</h1>
		
		<?php 
       		include('../modele/config_init.php');

       		$id=$_SESSION['ID'];       //récupération de l'ID de l'utilisateur
       		$not = $bdd->query('SELECT notification.texte, notification.date, notification.IDnotification, notification.etat FROM notification INNER JOIN utilisateur ON notification.IDutilisateur=utilisateur.IDutilisateur WHERE(utilisateur.IDutilisateur= "'.$id.'")  ORDER BY IDnotification DESC');     //sélection du texte, de la date, de l'ID et de l'état des notifcations rangées dans l'ordre DECROISSANT selon l'ID
       		?>
       		<br>
       		<br>
       		    <table id="notification">		<!-- Tableau des notifications (de 3 colonnes) -->
       		     	<tr>
       		       		<th id="not">Notifications</th>
       		        	<th id="date">Date</th>
       		       		<th id="vu"></th>
      	    		</tr>
       		        
       		      <?php 
       		        foreach ($not->fetchAll() as $donnees) {
       		           
       		       ?>
       		       <form action="../traitements/traitement_vu.php" method="post">		<!-- Début du formulaire -->
  					<tr>
     					<td id="not2"><?php echo $donnees['texte'];?></td>
     					<td id="not2"><?php echo $donnees['date'];?></td>
     					<input type="hidden" name="ID" value=<?php echo $donnees['IDnotification'] ?>></input>	<!-- Bouton hidden qui récupère l'ID de la notification -->
     					<td id="not2">       		        	
       		        	<?php
       		        	if($donnees['etat'])      //l'etat d'une notification est à 0 si elle a été vue, et à 1 sinon
       		        	{
       		            ?>
       		            <input type="submit" id="vu" value="Vu">
     					<?php
       		        	}
       		        	?>
     					</td>
     				</tr>
     				</form>		<!-- Fin du formulaire -->
  					<?php
                        }
                    ?>
  				</table>
       	
    </article>
	
	<footer>
			<?php
                require("footer.php");      //Affichage du footer
            ?>
	</footer>
</body>