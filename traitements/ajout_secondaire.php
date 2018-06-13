<?php

session_start();
require_once '../modele/config_init.php'; //Connexion à la bdd

$id=$_SESSION['ID'];    //ID de l'utilisateur connecté
$nom = htmlspecialchars($_POST['name']);    //Nom de l'utilisateur secondaire a ajouter (entré par l'utilisateur principal connecté)
$mail = htmlspecialchars($_POST['mail']);   //Adresse mail de l'utilisateur secondaire a ajouter (entré par l'utilisateur principal connecté)
$type=1;    //Type=1 pour un utilisateur secondaire
$IDprincipal=$_SESSION['ID'];   
$mdp='utilisateur';
$hash = password_hash($mdp, PASSWORD_BCRYPT);   //Cryptage du mot de passe

$req = $bdd->prepare('INSERT INTO utilisateur(nom, type, IDprincipal, mail, motdepasse) VALUES(:nom, :type, :id, :mail, :mdp)');
$result = $req->execute(array(':nom' => $nom, ':type' => $type, ':id' => $IDprincipal, ':mail' => $mail, ':mdp' => $hash));
//Ajout de l'utilisateur secondaire dans la BDD

$notif="L'utilisateur secondaire " .$nom. " a &eacute;t&eacute; ajout&eacute;" ;
$req2 = $bdd->prepare('INSERT INTO notification(texte, IDutilisateur) VALUES(:notif, :id)');
$result2 = $req2->execute(array(':notif' => $notif, ':id' => $id));
//Ajout du message de confirmations dans la table des notifications dans la BDD

header('location: ../html/gestion_secondaire.php');    //Redirection vers la page de gestion des utilisateurs secondaires

?>