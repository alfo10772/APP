<?php

session_start();

require_once '../modele/config_init.php'; //Connexion à la bdd

$nom = htmlspecialchars($_POST['nom']);    //Nom de la maison entré par l'utilisateur
$adresse = htmlspecialchars($_POST['adresse']);    //Adresse de la maison entrée par l'utilisateur
$id=$_SESSION['ID'];    //ID de l'utilisateur connecté

$req = $bdd->prepare('INSERT INTO maison(nom, adresse, IDutilisateur) VALUES(:nom,:adresse,:id)');
$result = $req->execute(array(':nom' => $nom,':adresse' => $adresse, ':id' => $id));
//Ajout de la nouvelle maison dans la BDD

$notif=$nom.' a bien &eacute;t&eacute; ajout&eacute;e';
$req2 = $bdd->prepare('INSERT INTO notification(texte, IDutilisateur) VALUES(:notif, :id)');
$result2 = $req2->execute(array(':notif' => $notif, ':id' => $id));
//Ajout du message de confirmations dans la table des notifications

header('location: ../vues/maison.php');     //Redirection vers la page des maisons

?>