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

$_SESSION['idpiece'] = $_POST['id'];

$reponse = $bdd->query('SELECT nom FROM piece WHERE IDpiece = "'.$_SESSION['idpiece'].'"');
$donnees = $reponse->fetch()[0];


$_SESSION['nompiece'] = $donnees;


header('location: ../html/exemplepiece.php');

?>