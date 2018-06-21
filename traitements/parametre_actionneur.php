<?php
session_start();
require_once '../modele/config_init.php'; //Connexion et chergement de la bdd

$id=$_SESSION['ID'];    //ID de l'utilisateur connecté
$piece= $_SESSION['piececomposant'];

$requetemaison= $bdd->query('SELECT IDmaison FROM maison WHERE maison.IDutilisateur= "'. $id .'" AND maison.selection = 1');
$idmaison=$requetemaison->fetch();
$idmaison= $idmaison['IDmaison'];
// On récupère l'ID de la maison sélectionnée par défaut

$reqidp = $bdd->query('SELECT IDpiece FROM piece WHERE nom= "'. $piece .'" AND IDutilisateur= "'. $id .'" AND IDmaison = "'. $idmaison .'" ');
$piece=$reqidp->fetch();
$piece= $piece['IDpiece'];
//Récupération de l'ID de la pièce


$idcompo= $_POST['id']; //ID de l'actionneur

$heuredebut=htmlspecialchars($_POST['heuredebut']);     //Heure de début entrée par l'utilisateur
$heurefin=htmlspecialchars($_POST['heurefin']);     //Heure de fin entrée par l'utilisateur

$req = $bdd ->prepare('UPDATE actionneur SET heuredebut=:heuredebut, heurefin=:heurefin WHERE (IDpiece=:piece AND IDutilisateur=:id AND IDmaison =:idmaison AND IDactionneur =:idcompo)');
$req-> execute(array(':heuredebut' => $heuredebut, ':heurefin' => $heurefin, ':piece' => $piece, ':id' => $id, ':idmaison' => $idmaison, ':idcompo' => $idcompo));
//On modifie les nouvelles valeurs dans la BDD

header('location: ../vues/page_des_composants.php');    //Redirection vers la page des composants

?>