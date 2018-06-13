<?php
session_start();
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
       require("menu_admin.php");
       include('../modele/config_init.php');
       
	?>
    <div class='contenu'>
<?php 
    $id = $_POST['selectmessage'];
    $rep = $bdd->prepare('SELECT * FROM message WHERE IDmessage = :id');
    $rep->execute(array(':id' => $id));
    $don = $rep->fetch();
    if($don['etatadmin']) {
        $etat = $bdd->prepare('UPDATE message SET etatadmin=0 WHERE IDmessage = :id');
        $etat->execute(array(':id' => $id));
    }
    $idclient = $don['IDclient'];
    $reponse = $bdd->prepare('SELECT * FROM utilisateur WHERE IDutilisateur =:IDclient');
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
	Objet : "<?php echo $don['Objet'];?>" 
	</label>
    </th>
	</br>
    <br />
	</tr>
    <tr>
    <th>
    <label for="nom" style="float:left">
    <?php echo $don['message'];?>
    </label>
    </th>
    <tr />
</table>
</div>
</div>
</body>

</html>
