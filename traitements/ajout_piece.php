<?php 

session_start();

require_once '../modele/config_init.php'; // Connexion � la bdd

$nom = htmlspecialchars($_POST['nom']);     //R�cup�ration du nom de la pi�ce entr� par l'utilisateur
$iduser=$_SESSION['ID'];    //R�cup�re l'ID de l'utilisateur connect�

$reponse = $bdd -> query('SELECT IDmaison FROM maison WHERE selection = 1 AND IDutilisateur = "'. $iduser .'"');
$maisons = $reponse->fetchAll();
$maison = $maisons[0]['IDmaison'];
//S�lectionne l'ID de la maison s�lectionn�e de l'utilisateur connect�

$req = $bdd->prepare('INSERT INTO piece(nom, IDmaison, IDutilisateur) VALUES(:nom, :id, :iduser)');
$result = $req->execute(array(':nom' => $nom, ':id' => $maison, ':iduser' => $iduser));
//Ajout de la nouvelle pi�ce dans la BDD

$notif=$nom.' a bien &eacute;t&eacute; ajout&eacute;e';    
$req2 = $bdd->prepare('INSERT INTO notification(texte, IDutilisateur) VALUES(:notif, :iduser)');
$result2 = $req2->execute(array(':notif' => $notif, ':iduser' => $iduser));
//Ajout du texte de confirmation dans les notifications

header('location: ../html/piece.php');  //Redirection sur la page des pi�ces
?>