<?php
session_start();
require_once '../modele/config_init.php'; //Connexion et chargement bdd
$req = $bdd->prepare('INSERT INTO message(IDclient,envoie, message, objet, etatclient) VALUES(:id,:client,:message,:objet, :etat)');                                  // on insère le nouveau message dans la base de données
$req->execute(array(':id' => $_SESSION['ID'], ':client' => $_SESSION['mail'],':message' => $_POST['message'], ':objet' => $_POST['objet'], ':etat' => 0));
header('location: ../html/message_client.php');                  // on revient ensuite à la page des messages du client