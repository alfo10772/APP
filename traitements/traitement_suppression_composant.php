<?php

$bdd = NULL;

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_a;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // A modifier lors de l'hebergement
}
catch (Exception $e)
{
    die('Erreur :' . $e->getMessage());
}

$piece = $_POST['piece'];
$composant = $_POST['composant'];
$notif=$nom.' a bien &eacute;t&eacute; supprim&eacute;e';

$req = $bdd->prepare('DELETE FROM composant WHERE (nom= :composant)');
$req2 = $bdd->prepare('INSERT INTO notification(texte) VALUES(:notif)');
$req->execute(array(':composant' => $composant));
$result2 = $req2->execute(array(':notif' => $notif));
header('location: page_des_composants.php');
?>