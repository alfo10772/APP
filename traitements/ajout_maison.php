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
$adresse = $_POST['adresse'];
$id=$_SESSION['ID'];


$req = $bdd->prepare('INSERT INTO maison(nom, IDadresse, IDutilisateur) VALUES(:nom,:adresse,:id)');

$result = $req->execute(array(':nom' => $nom,':adresse' => $adresse, ':id' => $id));

header('location: ../html/maison.php');
?>