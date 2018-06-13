<?php 
session_start();

require_once '../modele/config_init.php'; //Connexion et chargement de la bdd

$idmaison = $_POST['nom_maison'];

$requete = $bdd -> query('SELECT nom FROM maison WHERE IDmaison = "'. $idmaison .'"');      //Récuperation du nom de la maison selectionnée
$nom=$requete->fetch()[0];
var_dump($nom);
$notif=$nom.' a bien &eacute;t&eacute; supprim&eacute;e';
$id=$_SESSION['ID'];



$req = $bdd ->prepare('DELETE FROM maison WHERE IDmaison = :idmaison ');            //Suppression de la maison
$req2 = $bdd->prepare('INSERT INTO notification(texte, IDutilisateur) VALUES(:notif, :id)');        //Ajout de la notification en fonction du nom de la maison
$req-> execute(array(':idmaison' => $idmaison));
$result2 = $req2->execute(array(':notif' => $notif, ':id' => $id));
header('location: ../html/maison.php');

?>