<?php
session_start();
require_once '../modele/config_init.php'; //Connexion et chargement bdd


$reponse = $bdd->prepare('SELECT * FROM utilisateur WHERE mail =:mail');          // on récupère les données du destinataire
$reponse->execute(array(':mail' => $_SESSION['envoi']));
$IDclient = $reponse->fetch();

$req = $bdd->prepare('INSERT INTO message(IDclient,envoie, message, objet, etatadmin) VALUES(:id,:admin,:message,:objet, :etat)');                                             // on rentre le message dans la base de données
$req->execute(array(':id' => $IDclient['IDutilisateur'], ':admin' => 'administrateur',':message' => $_POST['message'], ':objet' => $_POST['objet'], ':etat' => 0));

header('location: ../vues/admin_message.php');            // on revient sur la page des messages de l'administrateur
