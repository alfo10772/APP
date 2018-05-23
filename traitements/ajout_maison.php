<?php

session_start();

$bdd = NULL;

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_a;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // A modifier lors de l'hebergement
}
catch (Exception $e)
{
    die('Erreur :' . $e->getMessage());
}


$nom = $_POST['nom'];
$adresse = $_POST['adresse'];
$id=$_SESSION['ID'];
$notif='Votre maison a bien &eacute;t&eacute; ajout&eacute;e';

$req = $bdd->prepare('INSERT INTO maison(nom, IDadresse, IDutilisateur) VALUES(:nom,:adresse,:id)');
$req2 = $bdd->prepare('INSERT INTO notification(texte) VALUES(:notif)');
$result = $req->execute(array(':nom' => $nom,':adresse' => $adresse, ':id' => $id));
$result2 = $req2->execute(array(':notif' => $notif));
header('location: ../html/maison.php');
?>