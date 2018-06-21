<?php

require_once '../modele/config_init.php'; //Connexion et chargement bdd


$mail = $_POST['mail'];
$mdp = $_POST['password'];
$hash = password_hash($mdp, PASSWORD_BCRYPT);
$req = $bdd->prepare('UPDATE utilisateur SET reinitialisation = :code, motdepasse = :mdp WHERE mail =:mail');
$req->execute(array(':code' => 0, ':mdp' => $hash, ':mail' => $mail));

header('location: ../vues/page_de_connexion.php');