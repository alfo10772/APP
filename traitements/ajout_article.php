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

$nom = $_POST['nom'];
$type = $_POST['type'];


if($type=='capteur'){
    $id=0;
}
else{
    $id=1;
}

$req = $bdd->prepare('INSERT INTO typecomposant(nom, type) VALUES(:nom, :type)');

$result = $req->execute(array(':nom' => $nom, ':type' => $id));

header('location: ../html/modif_article.php');
?>