
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
       require("menu_admin.php");                         //on ajoute le menu de l'administrateur
       include('../modele/config_init.php');              // on importe la base de données
	?>
    <div class='contenu'>


<table>
<tr>                                            <!-- On définit les colonnes de la table -->
    
    
	<th id="nom3">Boite de réception:</th>

  
	<th id="nom3">Boite d'envoi</th>
    

    <th id="nom2">
    Vos contacts:
    </th>


	</br>
	

</tr>
<tr>

    <th id="nom2">
    <form method="post" action="admin_vu_message.php">
    <select name='selectmessage' classe="réponse1" size='30'>                                            <!-- on sélectionne le message à voir dans la boite de réception -->
    <?php
        $rep = $bdd->prepare('SELECT * FROM message WHERE envoie != :emetteur');                         // on prend dans la base de données tous les messages des clients
        $rep->execute(array(':emetteur' => 'administrateur'));
        foreach ($rep->fetchAll() as $don) {                                                            // on va afficher chaque message dans le select
            $emetteur = $don['envoie'];
            $objet = $don['Objet'];
            $date = $don['date'];

            if ($don['etatadmin']) {                                                                      // affichage en fonction de l'état de "vu" ou "non vu" de l'administrateur
                ?>
                <option value=<?php echo $don['IDmessage']; ?>> [Non Vu] <?php echo "[$date] < $emetteur > $objet";?> </option>
                <?php
            }
            else {
                ?>
                <option value=<?php echo $don['IDmessage']; ?>><?php echo "[$date] < $emetteur > $objet";?> </option>
                <?php
            }


        }
        ?>
    
    </select>                                                                                 
    <input type="submit" value="Voir le message">                       <!-- bouton pour voir le message sélectionné -->
    </th>
    </form>


    <th id="nom3">
    <form method="post" action="admin_vu_message.php">
    <select name='selectmessage' classe="réponse1" size='30'>                             <!--On sélectionne le message à voir dans la boite d'envoi -->
    <?php
        $rep = $bdd->prepare('SELECT * FROM message WHERE envoie = :emetteur');           // on prend dans la base de données tous les messages de l'administrateur
        $rep->execute(array(':emetteur' => 'administrateur'));
        foreach ($rep->fetchAll() as $don) {
            $emetteur = $don['envoie'];
            $objet = $don['Objet'];
            $date = $don['date'];

            if ($don['etatadmin']) {
                ?>
                <option value=<?php echo $don['IDmessage']; ?>> [Non Vu] <?php echo "[$date] < $emetteur > $objet";?> </option>
                <?php
            }
            else {
                ?>
                <option value=<?php echo $don['IDmessage']; ?>><?php echo "[$date] < $emetteur > $objet";?> </option>
                <?php
            }


        }
        ?>
    
    </select>
    <input type="submit" value="Voir le message">                             <!-- bouton pour voir le message sélectionné -->
    </th>
    </form>


    <th id="nom2">
    <form method="post" action="envoi_admin_vers_client.php">       
	<select name='mail' class="réponse1" size='30'>                                        <!-- On sélectionne le client à qui envoyer un message -->
    <?php 
   
        $reponse = $bdd->query('SELECT * FROM utilisateur WHERE type = 0');                   // on prend dans la base de données tous les clients
           
       	foreach ($reponse->fetchAll() as $donnees) {

    ?>	
    
	<option value=<?php echo $donnees['mail']; ?>><?php echo $donnees['mail'];?></option>           <!-- On affiche chacun d'entre eux dans le select -->
    
	
    <?php
    }
    ?>
    

    </select>
    <input type="submit" value="&Eacute;crire un message">                           <!-- bouton pour écrire un message au client -->
    </form>
    </th>

    
</tr>
</table>

</div>
</div>
</body>
</html>