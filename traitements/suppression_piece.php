<?php 
session_start();

require_once '../modele/config_init.php'; //Connexion et chargement de la bdd

$idpiece = $_POST['nom_piece'];

$requete = $bdd -> query('SELECT nom FROM piece WHERE IDpiece = "'. $idpiece .'"');     //Récuperation du nom de la piece selectionnée
$nom=$requete->fetch()[0];
var_dump($nom);

$notif=$nom.' a bien &eacute;t&eacute; supprim&eacute;e';
$id=$_SESSION['ID'];

$req = $bdd ->prepare('DELETE FROM piece WHERE IDpiece = :idpiece ');               //Suppression de la piece en fonction de l'id
$req2 = $bdd->prepare('INSERT INTO notification(texte, IDutilisateur) VALUES(:notif, :id)');        //Ajout de la notification 
$req-> execute(array(':idpiece' => $idpiece));
$result2 = $req2->execute(array(':notif' => $notif, ':id' => $id));
header('location: ../html/piece.php');

?>
