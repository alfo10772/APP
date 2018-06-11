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
        $idm = $_POST['ID'];
        $mess = $bdd->prepare('SELECT * FROM message WHERE IDmessage = :id');
        $mess->execute(array(':id' => $idm));
        $don = $mess->fetch();

        ?>

        <table id='notification'>
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
                <td id="not2"><?php echo $don['message'];?></td>
            </tr>
        </table>
            
                       
		</article>

        </body>
                            
		<footer>
    		<?php
				require('footer.php');
    		?>
		</footer>

</html>