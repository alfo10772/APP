<?php 

session_start();

require_once '../modele/config_init.php'; // Connexion à la bdd

$nom = htmlspecialchars($_POST['nom']);
$iduser=$_SESSION['ID'];
$notif=$nom.' a bien &eacute;t&eacute; ajout&eacute;e';

$reponse = $bdd -> query('SELECT IDmaison FROM maison WHERE selection = 1 AND IDutilisateur = "'. $iduser .'"');
$maisons = $reponse->fetchAll();
$maison = $maisons[0]['IDmaison'];

$req = $bdd->prepare('INSERT INTO piece(nom, IDmaison, IDutilisateur) VALUES(:nom, :id, :iduser)');
$req2 = $bdd->prepare('INSERT INTO notification(texte, IDutilisateur) VALUES(:notif, :iduser)');
$result = $req->execute(array(':nom' => $nom, ':id' => $maison, ':iduser' => $iduser));
$result2 = $req2->execute(array(':notif' => $notif, ':iduser' => $iduser));
    
header('location: ../html/piece.php');
?>