<?php
require_once '../modele/config_init.php'; //Connexion � la bdd

$nom = $_POST['nom'];
$type = $_POST['type'];
$unite = $_POST['unite'];


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