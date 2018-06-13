<?php
require_once '../modele/config_init.php'; //Connexion et chargement bdd

$reponse = $bdd->query('SELECT * FROM notification');   //Sélection les données de la table notification
$donnees = $reponse->fetch();

$id = $_POST['ID'];     //récupère l'ID de la notification sélectionnée

$req = $bdd ->prepare('UPDATE notification SET etat=0 WHERE IDnotification = :ID');
//Change l'état de la notification sélectionnée dans la BDD

$req-> execute(array(':ID' => $id));

header('location: ../html/notification.php');   //Redirection sur la page des notifications

?>