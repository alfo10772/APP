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

$id = $_POST['id'];
$etat = $_POST['etat'];

$req = $bdd ->prepare('UPDATE actionneur SET etat=0 WHERE IDactionneur = :id');
$req-> execute(array(':id' => $id));

header('location: ../html/page_des_composants.php');

?>