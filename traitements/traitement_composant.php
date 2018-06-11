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
$type = $_POST['type'];
$reqid1 = $bdd->query('SELECT type FROM typecomposant WHERE nom= "'. $type .'" ');
$idtype=$reqid1->fetch();
$idtype= $idtype['type'];
$nom = $_POST['nom'];


$reponse = $bdd -> query('SELECT IDmaison FROM maison WHERE selection = 1');
$maisons = $reponse->fetchAll();
$maison = $maisons[0]['IDmaison'];


$piece = $_POST['piece'];
$requetepiece = $bdd->query('SELECT IDpiece FROM piece WHERE (nom="'. $piece .'" AND IDutilisateur= "'. $id .'" AND IDmaison = "'. $maison .'") ');
$piece = $requetepiece ->fetch();
$piece = $piece['IDpiece'];
$notif=$nom.' a bien &eacute;t&eacute; ajout&eacute;e';


if($idtype==0)
{
    $req = $bdd->prepare('INSERT INTO capteur(nom, IDpiece, nomtype, IDutilisateur, IDmaison) VALUES(:nom,:piece,:type, :id, :idmaison)');
    $result = $req->execute(array(':nom' => $nom, ':piece' => $piece, ':type' => $type, ':id' => $id, ':idmaison' => $maison)); 
}
else
{   
    $req = $bdd->prepare('INSERT INTO actionneur(nom, IDpiece, nomtype, IDutilisateur, IDmaison) VALUES(:nom,:piece, :type, :id, :idmaison)');
    $result = $req->execute(array(':nom' => $nom, ':piece' => $piece, ':type' => $type, ':id' => $id, ':idmaison' => $maison));  
}
$req2 = $bdd->prepare('INSERT INTO notification(texte, IDutilisateur) VALUES(:notif, :id)');
$result2 = $req2->execute(array(':notif' => $notif, ':id' => $id));
header('location: ../html/page_des_composants.php');
?>