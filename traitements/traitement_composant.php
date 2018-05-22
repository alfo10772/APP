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
$type = $_POST['type'];
$nom = $_POST['nom'];
$valeurmin = $_POST['valeurmin'];
$valeurmax = $_POST['valeurmax'];
$piece = $_POST['piece'];
$requetepiece = $bdd->query("SELECT IDpiece FROM piece WHERE nom='". $piece ."' ;");
$piece = $requetepiece ->fetch();
$piece = $piece['IDpiece'];

$req = $bdd->prepare('INSERT INTO composant(type, nom, valeurmin, valeurmax, IDpiece) VALUES(:type,:nom,:valeurmin,:valeurmax,:piece)');
$result = $req->execute(array(':type' => $type, ':nom' => $nom,':valeurmin' => $valeurmin,':valeurmax' => $valeurmax, ':piece' => $piece));
header('location: ../html/page_des_composants.php');
?>