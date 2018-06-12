<?php
session_start();
require_once '../modele/config_init.php'; //Connexion et chergement de la bdd

$id=$_SESSION['ID'];
$idmaison = $_SESSION['maisonselect'];
$piece= $_SESSION['piececomposant'];
$reqidp = $bdd->query('SELECT IDpiece FROM piece WHERE nom= "'. $piece .'" AND IDutilisateur= "'. $id .'" AND IDmaison = "'. $idmaison .'" ');
$piece=$reqidp->fetch();
$piece= $piece['IDpiece'];
$idcompo= $_POST['id'];

$heuredebut=$_POST['heuredebut'];
$heurefin=$_POST['heurefin'];

$req = $bdd ->prepare('UPDATE actionneur SET heuredebut=:heuredebut, heurefin=:heurefin WHERE (IDpiece=:piece AND IDutilisateur=:id AND IDmaison =:idmaison AND IDactionneur =:idcompo)');
$req-> execute(array(':heuredebut' => $heuredebut, ':heurefin' => $heurefin, ':piece' => $piece, ':id' => $id, ':idmaison' => $idmaison, ':idcompo' => $idcompo));

header('location: ../html/page_des_composants.php');

?>