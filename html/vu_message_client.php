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
                require("en_tete_connexion.php");           // on affiche l'en-tête de la page
                
        	?>
        </header>

		<article>
        
        <?php 
        include('../modele/config_init.php');               // on charge la base de données
        $id=$_SESSION['ID'];                                // on récupère l'id du client
        $idm = $_POST['ID'];                                // on récupère l'id du message
        $mess = $bdd->prepare('SELECT * FROM message WHERE IDmessage = :id');            // on récupère depuis la base de données le message grâce à l'id
        $mess->execute(array(':id' => $idm));
        $don = $mess->fetch();
        if($don['etatclient']) {                                                                    // update état vu
            $etat = $bdd->prepare('UPDATE message SET etatclient=0 WHERE IDmessage = :id');
            $etat->execute(array(':id' => $idm));
        }

        ?>

        <table id='notification'>                           <!-- création de la table de vu du message -->
            <tr>
                <th id="date"> &Eacute;metteur </th>
                <th id="not"> Objet du Message </th>
                <th id="date"> date </th>
            </tr>
            <tr>
                <td id="not2"><?php echo $don['envoie'];?></td>
                <td id="not2"><?php echo $don['Objet'];?></td>
                <td id="not2"><?php echo $don['date'];?></td>
            </tr>
        </table>
        <br />
        <br />
        <table id='notification'>
            <tr>
                <th id="not"> Message </th>
            </tr>
            <tr>
                <td id="not2"><?php echo $don['message'];?></td>                <!-- On affiche le message -->
            </tr>
        </table>
            
                       
		</article>

        </body>
                            
		<footer>
    		<?php
				require('footer.php');                          // on affiche le bas de page
    		?>
		</footer>

</html>