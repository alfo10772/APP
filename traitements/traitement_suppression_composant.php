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


$req = $bdd->prepare('DELETE FROM composant WHERE (nom= :composant)');
$req->execute(array(':composant' => $composant));
header('location: page_des_composants.php');
?>