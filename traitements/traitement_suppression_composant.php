<?php
session_start();
require_once '../modele/config_init.php'; //Connexion et chargement bdd

$id=$_SESSION['ID'];
$idmaison = $_SESSION['maisonselect'];
$piece = $_SESSION['piececomposant'];

$reponse = $bdd -> query('SELECT IDmaison FROM maison WHERE selection = 1 AND IDutilisateur= "'. $id .'"');
$maisons = $reponse->fetchAll();
$maison = $maisons[0]['IDmaison'];

$data = $_POST['composant'];
list($idcomposant, $idtype) = explode("/", $data);

$requetepiece = $bdd->query('SELECT IDpiece FROM piece WHERE (nom="'. $piece .'" AND IDutilisateur= "'. $id .'" AND IDmaison = "'. $maison .'") ');
$piece = $requetepiece ->fetch();
$piece = $piece['IDpiece'];

if($idtype == 0)
{
    $requetecompo = $bdd->query('SELECT * FROM capteur WHERE IDcapteur= "'.$idcomposant.'" ');
    $composant1 = $requetecompo ->fetch();
    $composant = $composant1['nom'];
    $req = $bdd->prepare('DELETE FROM capteur WHERE (IDcapteur= :idcomposant AND IDutilisateur = :id AND IDpiece = :piece)');
    $req->execute(array(':idcomposant' => $idcomposant, ':id' => $id, ':piece' => $piece));
}

elseif($idtype == 1)
{ 
    $requetecompo = $bdd->query('SELECT * FROM actionneur WHERE IDactionneur= "'.$idcomposant.'" ');
    $composant1 = $requetecompo ->fetch();
    $composant = $composant1['nom'];
    $req = $bdd->prepare('DELETE FROM actionneur WHERE (IDactionneur= :idcomposant AND IDutilisateur = :id AND IDpiece = :piece)');
    $req->execute(array(':idcomposant' => $idcomposant, ':id' => $id, ':piece' => $piece));  
}

$notif=$composant.' a bien &eacute;t&eacute; supprim&eacute;e';
$req2 = $bdd->prepare('INSERT INTO notification(texte, IDutilisateur) VALUES(:notif, :id)');
$result2 = $req2->execute(array(':notif' => $notif, ':id' => $id));


header('location: ../html/page_des_composants.php');
?>