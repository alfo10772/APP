<?php
require_once '../modele/config_init.php'; //Connexion et chargement bdd

$reponse = $bdd->query('SELECT * FROM notification');   //S�lection les donn�es de la table notification
$donnees = $reponse->fetch();


if ($_POST['ID'] !=0) {
$id = $_POST['ID'];     //r�cup�re l'ID de la notification s�lectionn�e

$req = $bdd ->prepare('UPDATE notification SET etat=0 WHERE IDnotification = :ID');
//Change l'�tat de la notification s�lectionn�e dans la BDD

$req-> execute(array(':ID' => $id));
}
else {
    $req = $bdd ->prepare('UPDATE notification SET etat=0');
    $req-> execute();
}

header('location: ../vues/notification.php');   //Redirection sur la page des notifications

?>