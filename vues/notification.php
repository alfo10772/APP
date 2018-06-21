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

       		$id=$_SESSION['ID'];       //r�cup�ration de l'ID de l'utilisateur
       		$not = $bdd->query('SELECT notification.texte, notification.date, notification.IDnotification, notification.etat FROM notification INNER JOIN utilisateur ON notification.IDutilisateur=utilisateur.IDutilisateur WHERE(utilisateur.IDutilisateur= "'.$id.'")  ORDER BY IDnotification DESC');     //s�lection du texte, de la date, de l'ID et de l'�tat des notifcations rang�es dans l'ordre DECROISSANT selon l'ID
       		?>
       		<br>
       		<br>
       		    <table id="notification">		<!-- Tableau des notifications (de 3 colonnes) -->
       		     	<tr>
       		       		<th id="not">Notifications</th>
						<th id="date">Date</th>
						<th id="vu">
						
       		       		</th>
      	    		</tr>
       		        
       		      <?php 
       		        foreach ($not->fetchAll() as $donnees) {
       		           
       		       ?>
       		       <form action="../traitements/traitement_vu.php" method="post">		<!-- D�but du formulaire -->
  					<tr>
     					<td id="not2"><?php echo $donnees['texte'];?></td>
     					<td id="not2"><?php echo $donnees['date'];?></td>
     					<input type="hidden" name="ID" value=<?php echo $donnees['IDnotification'] ?>></input>	<!-- Bouton hidden qui r�cup�re l'ID de la notification -->
     					<td id="not2">       		        	
       		        	<?php
       		        	if($donnees['etat'])      //l'etat d'une notification est � 0 si elle a �t� vue, et � 1 sinon
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
					<tr>
						<td id="not2"></td>
						<td id="not2"></td>
						<td id="not2">
						<form action="../traitements/traitement_vu.php" method="post">
						<input type="hidden" name="ID" value="0"></input>
						<input type="submit" id="toutvu" value="J'ai tout vu">
						
						</input>
						</form>
					</td>

  				</table>
       	
    </article>
	
	<footer>
			<?php
                require("footer.php");      //Affichage du footer
            ?>
	</footer>
</body>