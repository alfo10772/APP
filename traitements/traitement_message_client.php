<?php
session_start();
require_once '../modele/config_init.php'; //Connexion et chargement bdd

$req = $bdd->prepare('INSERT INTO message(IDclient,envoie, message, objet) VALUES(:id,:client,:message,:objet)');
$req->execute(array(':id' => $_SESSION['ID'], ':client' => $_SESSION['mail'],':message' => $_POST['message'], ':objet' => $_POST['objet']));

header('location: ../html/message_client.php');
