<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<link rel="stylesheet" href="../css/style.css">	
		<title>Mes Messages</title>
	</head>

	<body>
	
		<header>
			<?php
                require("en_tete_connexion.php");        // on affiche l'en-tête de la page
                
        	?>
        </header>

		<article>
        
        <?php
        include('../modele/config_init.php');              // on importe la base de données
        $id=$_SESSION['ID'];                                          // on récupère l'id du client
        $mess = $bdd->prepare('SELECT * FROM message WHERE IDclient = :id');                               // on prend dans la base de données tous les messages du client
        $mess->execute(array(':id' => $id));
        ?>

        <table id='notification'>
            <tr>                                                        <!-- On définit les colonnes du tableau qui sert à afficher les messages -->
				<th id="date"> &Eacute;metteur </th>           
                <th id="obj"> Objet du Message </th>
                <th id="date"> date </th>
                <th id="vu"> Voir le Message </th>
            </tr>

            <?php                                                         // on affiche dans le tableau chacun des messages
       		        foreach ($mess->fetchAll() as $donnees) {
       		           
       		       ?>
       		       <form action="vu_message_client.php" method="post">               <!--formulaire pour accéder au message -->
  					<tr>
						<td id="not2"><?php echo $donnees['envoie'];?></td>            <!--affichage de chaque message avec son objet, date et emetteur -->
     					<td id="not2"><?php echo $donnees['Objet'];?></td>
     					<td id="not2"><?php echo $donnees['date'];?></td>
     					<input type="hidden" name="ID" value=<?php echo $donnees['IDmessage'] ?>></input>
     					<td id="not2"> 
						<?php      		        	
       		        	if ($donnees['etatclient']) {                                     // On affiche le bouton pour voir le message, qui change si le client a vu ou non le message
							?>
						   <input type="submit" id="vu" value="New">
						   <?php
						   }
						   else {
							   ?>
							<input type="submit" id="vu" value="Voir">
							<?php
						   }
     					?>
     					</td>
     				</tr>
     				</form>
  					<?php
                        }
                    ?>
        </table>
        <br />
        <br />
        <div id='conteneur2'>
            <form action="envoi_client_vers_admin.php" method="post">	                                 <!-- formulaire qui mène à la page pour envoyer un message à l'administrateur-->
				<input type="submit" value="Envoyer un message à l'administrateur" />	
			</form>
		</div>

		</article>

        </body>

		<footer>
    		<?php
				require('footer.php');           // on affiche le bas-de-page de la page
    		?>
		</footer>

</html>
