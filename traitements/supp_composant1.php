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

$id=$_SESSION['ID'];
$idmaison = $_SESSION['maisonselect'];
$_SESSION['piececomposant'] = $_POST['piece'];

header('location: ../html/suppression_composant.php');
?>