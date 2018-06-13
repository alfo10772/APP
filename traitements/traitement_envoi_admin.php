<?php
session_start();
require_once '../modele/config_init.php'; //Connexion et chargement bdd


print_r($_POST);
print_r($_SESSION);

$reponse = $bdd->prepare('SELECT * FROM utilisateur WHERE mail =:mail');
$reponse->execute(array(':mail' => $_SESSION['envoi']));
$IDclient = $reponse->fetch();

$req = $bdd->prepare('INSERT INTO message(IDclient,envoie, message, objet, etatadmin) VALUES(:id,:admin,:message,:objet, :etat)');
$req->execute(array(':id' => $IDclient['IDutilisateur'], ':admin' => $_SESSION['mail'],':message' => $_POST['message'], ':objet' => $_POST['objet'], ':etat' => 0));

header('location: ../html/admin_message.php');
