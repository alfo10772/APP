<?php
require_once '../modele/config_init.php'; //Connexion à la bdd

$nom = htmlspecialchars($_POST['nom']);
$type = htmlspecialchars($_POST['type']);
$unite = htmlspecialchars($_POST['unite']);


if($type=='capteur'){
    $id=0;
}
else{
    $id=1;
}

$req = $bdd->prepare('INSERT INTO typecomposant(nom, type, unite) VALUES(:nom, :type, :unite)');

$result = $req->execute(array(':nom' => $nom, ':type' => $id, ':unite' => $unite));

header('location: ../html/modif_article.php');
?>