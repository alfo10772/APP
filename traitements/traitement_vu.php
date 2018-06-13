<?php
require_once '../modele/config_init.php'; //Connexion et chargement bdd

$reponse = $bdd->query('SELECT * FROM notification');
$donnees = $reponse->fetch();

$id = $_POST['ID'];

$req = $bdd ->prepare('UPDATE notification SET etat=0 WHERE IDnotification = :ID');

$req-> execute(array(':ID' => $id));

header('location: ../html/notification.php');

?>