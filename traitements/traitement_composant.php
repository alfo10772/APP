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
$type = $_POST['type'];
$reqid1 = $bdd->query('SELECT type FROM typecomposant WHERE nom= "'. $type .'" ');
$idtype=$reqid1->fetch();
$idtype= $idtype['type'];
$nom = $_POST['nom'];
$piece = $_POST['piece'];
$requetepiece = $bdd->query('SELECT IDpiece FROM piece WHERE nom="'. $piece .'" ');
$piece = $requetepiece ->fetch();
$piece = $piece['IDpiece'];
$notif=$nom.' a bien &eacute;t&eacute; ajout&eacute;e';
$id=$_SESSION['ID'];

if($idtype==0)
{
    $req = $bdd->prepare('INSERT INTO capteur(nom, IDpiece, nomtype) VALUES(:nom,:piece,:type)');
    $result = $req->execute(array(':nom' => $nom, ':piece' => $piece, ':type' => $type));
}
else
{
    $req = $bdd->prepare('INSERT INTO actionneur(nom, IDpiece, nomtype) VALUES(:nom,:piece, :type)');
    $result = $req->execute(array(':nom' => $nom, ':piece' => $piece, ':type' => $type));
}
$req2 = $bdd->prepare('INSERT INTO notification(texte, IDutilisateur) VALUES(:notif, :id)');
$result2 = $req2->execute(array(':notif' => $notif, ':id' => $id));
header('location: ../html/page_des_composants.php');
?>