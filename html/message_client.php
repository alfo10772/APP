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
                require("en_tete_connexion.php");
                
        	?>
        </header>

		<article>
        
        <?php
        include('../modele/config_init.php');
        $id=$_SESSION['ID'];
        $mess = $bdd->prepare('SELECT * FROM message WHERE IDclient = :id');
        $mess->execute(array(':id' => $id));
        ?>

        <table id='notification'>
            <tr>
                <th id="not"> Objet du Message </th>
                <th id="date"> date </th>
                <th id="vu"> Voir le Message </th>
            </tr>

            <?php 
       		        foreach ($mess->fetchAll() as $donnees) {
       		           
       		       ?>
       		       <form action="vu_message_client.php" method="post">
  					<tr>
     					<td id="not2"><?php echo $donnees['Objet'];?></td>
     					<td id="not2"><?php echo $donnees['date'];?></td>
     					<input type="hidden" name="ID" value=<?php echo $donnees['IDmessage'] ?>></input>
     					<td id="not2">       		        	
       		        	
       		            <input type="submit" id="vu" value="Voir">
     					
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
            <a href="envoi_client_vers_admin.php">				
				<input type="submit" value="Envoyer un message à l'administrateur" />	
			</a>
		</div>

		</article>

        </body>

		<footer>
    		<?php
				require('footer.php');
    		?>
		</footer>

</html>

    