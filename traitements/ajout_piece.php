<?php 

session_start();

require_once '../modele/config_init.php'; // Connexion à la bdd

$nom = htmlspecialchars($_POST['nom']);     //Récupération du nom de la pièce entré par l'utilisateur
$iduser=$_SESSION['ID'];    //Récupère l'ID de l'utilisateur connecté

$reponse = $bdd -> query('SELECT IDmaison FROM maison WHERE selection = 1 AND IDutilisateur = "'. $iduser .'"');
$maisons = $reponse->fetchAll();
$maison = $maisons[0]['IDmaison'];
//Sélectionne l'ID de la maison sélectionnée de l'utilisateur connecté

$req = $bdd->prepare('INSERT INTO piece(nom, IDmaison, IDutilisateur) VALUES(:nom, :id, :iduser)');
$result = $req->execute(array(':nom' => $nom, ':id' => $maison, ':iduser' => $iduser));
//Ajout de la nouvelle pièce dans la BDD

$notif=$nom.' a bien &eacute;t&eacute; ajout&eacute;e';    
$req2 = $bdd->prepare('INSERT INTO notification(texte, IDutilisateur) VALUES(:notif, :iduser)');
$result2 = $req2->execute(array(':notif' => $notif, ':iduser' => $iduser));
//Ajout du texte de confirmation dans les notifications

header('location: ../html/piece.php');  //Redirection sur la page des pièces
?>