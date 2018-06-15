<?php
session_start();          // on démarre une session
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
       require("menu_admin.php");                                  // on affiche le menu de l'administrateur
       include('../modele/config_init.php');                       // on charge la base de données
       
	?>
    <div class='contenu'>
<?php 
    $id = $_POST['selectmessage'];                                             // on récupère l'id du message
    $rep = $bdd->prepare('SELECT * FROM message WHERE IDmessage = :id');       // on récupère ensuite le message grâce à son id
    $rep->execute(array(':id' => $id));
    $don = $rep->fetch();
    if($don['etatadmin']) {                                                                         // met à jour l'etat de vision de l'administrateur
        $etat = $bdd->prepare('UPDATE message SET etatadmin=0 WHERE IDmessage = :id');
        $etat->execute(array(':id' => $id));
    }
    $idclient = $don['IDclient'];
    $reponse = $bdd->prepare('SELECT * FROM utilisateur WHERE IDutilisateur =:IDclient');             // on récupère les données de l'utilisateur
    $reponse->execute(array(':IDclient'=> $idclient));
    $c = $reponse->fetch();
    $client = $c['mail'];
    $date = $don['date'];

?>
<table>
    <tr>
	<label for="nom" style="float:left;">
	<th>
    <?php
    if ($don['envoie'] == $client) {
        echo "[$date] Message de $client vers l'administrateur (vous)";
    }
    else {
        echo "[$date] Message de l'administrateur (vous) vers $client";
    }
    ?>
	</label>
    </tr>
    <br />
    <br />
    <tr>
    <th>
    <label for="nom" style="float:left">
	Objet : "<?php echo $don['Objet'];?>"              <!-- On affiche l'objet du message -->
	</label>
    </th>
	</br>
    <br />
	</tr>
    <tr>
    <th>
    <label for="nom" style="float:left">
    <?php echo $don['message'];?>                             <!-- On affiche le message -->
    </label>
    </th>
    <tr />
</table>
</div>
</div>
</body>

</html>
