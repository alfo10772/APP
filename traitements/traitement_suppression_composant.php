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
$piece = $_SESSION['piececomposant'];

$composant = $_POST['composant'];
$notif=$composant.' a bien &eacute;t&eacute; supprim&eacute;e';

$requetepiece = $bdd->query('SELECT IDpiece FROM piece WHERE (nom="'. $piece .'" AND IDutilisateur= "'. $id .'" AND IDmaison = "'. $idmaison .'") ');
$piece = $requetepiece ->fetch();
$piece = $piece['IDpiece'];
$reqid1 = $bdd->query('SELECT type FROM capteur WHERE nom= "'. $composant .'" AND IDutilisateur= "'. $id .'" AND IDpiece = "'. $piece .'" ');
$idtype=$reqid1->fetch();
$idtype= $idtype['type'];

if($idtype == NULL)

{
    $reqid1 = $bdd->query('SELECT type FROM actionneur WHERE nom= "'. $composant .'" AND IDutilisateur= "'. $id .'" AND IDpiece = "'. $piece .'"');
    $idtype=$reqid1->fetch();
    $idtype= $idtype['type'];
}


if($idtype == 0)
{
    $req = $bdd->prepare('DELETE FROM capteur WHERE (nom= :composant AND IDutilisateur = :id AND IDpiece = :piece)');
    $req->execute(array(':composant' => $composant, ':id' => $id, ':piece' => $piece));
}

else
{ 
    $req = $bdd->prepare('DELETE FROM actionneur WHERE (nom= :composant AND IDutilisateur = :id AND IDpiece = :piece)');
    $req->execute(array(':composant' => $composant, ':id' => $id, ':piece' => $piece));  
}
$req2 = $bdd->prepare('INSERT INTO notification(texte, IDutilisateur) VALUES(:notif, :id)');
$result2 = $req2->execute(array(':notif' => $notif, ':id' => $id));


header('location: ../html/page_des_composants.php');
?>