
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
       include('../modele/config_init.php');
	?>
    <div class='contenu'>


<table>
<tr>
	<label for="nom" style="float:left;">
	<th>Boite de réception:</th>
	</label>
    <th>
    <label for="nom" style="float:left">
	Vos contacts:
	</label>
    </th>
	</br>
	

</tr>
<tr>
<th>
    <form method="post" action="vu_message_admin.php">
    <select classe="réponse1" size='30'>
    <?php
        $rep = $bdd->query('SELECT * FROM message');
        foreach ($rep->fetchAll() as $don) {
            $emetteur = $don['envoie'];
            $objet = $don['Objet'];
            $date = $don['date'];

            if ($don['etatadmin']) {
                ?>
                <option value=<?php $don['IDmessage'] ?>> [Non Vu] <?php echo "[$date] < $emetteur > $objet";?> </option>
                <?php
            }
            else {
                ?>
                <option value=<?php $don['IDmessage'] ?>><?php echo "[$date] < $emetteur > $objet";?> </option>
                <?php
            }


        }
        ?>
    
    </select>
    <input type="submit" value="Voir le message">
    </th>
    </form>
	</br>
    <th>
    <form method="post" action="envoi_admin_vers_client.php">
	<select  name="mail" classe="réponse1" size='30'>
    <?php 
        $message = "message000";
    
        $reponse = $bdd->query('SELECT * FROM utilisateur WHERE type != 2');
           
       	foreach ($reponse->fetchAll() as $donnees) {

    ?>	
    
	<option value=<?php $donnees['mail'] ?>><?php echo $donnees['mail']; ?></option> 
    
	
    <?php
    }
    ?>
    

    </select>
    <input type="submit" value="&Eacute;crire un message">
    </form>
    </th>
</tr>



</div>
</div>
</body>
</html>