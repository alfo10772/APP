<?php

session_start();
require_once '../modele/config_init.php'; //Connexion à la bdd

$id=$_SESSION['ID'];
$nom = $_POST['name'];
$mail = $_POST['mail'];
$type=1;
$IDprincipal=$_SESSION['ID'];
$mdp='utilisateur';
$hash = password_hash($mdp, PASSWORD_BCRYPT);
$notif="L'utilisateur secondaire " .$nom. " a &eacute;t&eacute; ajout&eacute;" ;

$req = $bdd->prepare('INSERT INTO utilisateur(nom, type, IDprincipal, mail, motdepasse) VALUES(:nom, :type, :id, :mail, :mdp)');
$result = $req->execute(array(':nom' => $nom, ':type' => $type, ':id' => $IDprincipal, ':mail' => $mail, ':mdp' => $hash));
$req2 = $bdd->prepare('INSERT INTO notification(texte, IDutilisateur) VALUES(:notif, :id)');
$result2 = $req2->execute(array(':notif' => $notif, ':id' => $id));
header('location: ../html/tableau_de_bord.php');

?>