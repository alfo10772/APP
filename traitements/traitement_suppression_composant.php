<?php
session_start();
require_once '../modele/config_init.php'; //Connexion et chargement bdd

$id=$_SESSION['ID'];    //ID de l'utilisateur principal
$idmaison = $_SESSION['maisonselect'];  //Nom de la maison s�lectionn�e
$piece = $_SESSION['piececomposant'];   //Nom de la pi�ce s�lectionn�e

$reponse = $bdd -> query('SELECT IDmaison FROM maison WHERE selection = 1 AND IDutilisateur= "'. $id .'"');
$maisons = $reponse->fetchAll();
$maison = $maisons[0]['IDmaison'];
//R�cup�re l'ID de la maison s�lectionn�e

$data = $_POST['composant'];
list($idcomposant, $idtype) = explode("/", $data);
//S�pare un $_POST en deux valeurs: l'ID du composant s�lectionn� et son type

$requetepiece = $bdd->query('SELECT IDpiece FROM piece WHERE (nom="'. $piece .'" AND IDutilisateur= "'. $id .'" AND IDmaison = "'. $maison .'") ');
$piece = $requetepiece ->fetch();
$piece = $piece['IDpiece'];
//R�cup�re l'ID de la pi�ce

if($idtype == 0)    //Test pour savoir s'il s'agit d'un capteur
{
    $requetecompo = $bdd->query('SELECT * FROM capteur WHERE IDcapteur= "'.$idcomposant.'" ');
    $composant1 = $requetecompo ->fetch();
    $composant = $composant1['nom'];
    //R�cup�re le nom du capteur � supprimer
    $req = $bdd->prepare('DELETE FROM capteur WHERE (IDcapteur= :idcomposant AND IDutilisateur = :id AND IDpiece = :piece)');
    $req->execute(array(':idcomposant' => $idcomposant, ':id' => $id, ':piece' => $piece));
    //Supprime le capteur de la BDD
}

elseif($idtype == 1)    //Test pour savoir s'il s'agit d'un actionneur
{ 
    $requetecompo = $bdd->query('SELECT * FROM actionneur WHERE IDactionneur= "'.$idcomposant.'" ');
    $composant1 = $requetecompo ->fetch();
    $composant = $composant1['nom'];
    //R�cup�re le nom de l'actionneur � supprimer
    $req = $bdd->prepare('DELETE FROM actionneur WHERE (IDactionneur= :idcomposant AND IDutilisateur = :id AND IDpiece = :piece)');
    $req->execute(array(':idcomposant' => $idcomposant, ':id' => $id, ':piece' => $piece));
    //Supprime l'actionneur de la BDD
}

$notif=$composant.' a bien &eacute;t&eacute; supprim&eacute;e';
$req2 = $bdd->prepare('INSERT INTO notification(texte, IDutilisateur) VALUES(:notif, :id)');
$result2 = $req2->execute(array(':notif' => $notif, ':id' => $id));
//Ajoute le message de confirmation de suppression dans la BDD


header('location: ../html/page_des_composants.php');    //Redirection vers la page des composants
?>