<?php
session_start();
require_once '../modele/config_init.php'; //Connexion et chargement bdd

$id=$_SESSION['ID'];
$piece= $_SESSION['piececomposant'];
$reqidp = $bdd->query('SELECT piece.IDpiece FROM piece JOIN maison ON (piece.IDmaison = maison.IDmaison) WHERE piece.nom= "'. $piece .'" AND piece.IDutilisateur= "'. $id .'" AND maison.selection = 1');
$piece=$reqidp->fetch();
$piece= $piece['IDpiece'];
$idcompo= $_POST['id'];

$valeurmin=$_POST['valeurmin'];
$valeurmax=$_POST['valeurmax'];

$req = $bdd ->prepare('UPDATE capteur SET valeurmin=:valeurmin, valeurmax=:valeurmax WHERE (IDpiece=:piece AND IDutilisateur=:id AND IDmaison =:idmaison AND IDcapteur =:idcompo)');
$req-> execute(array(':valeurmin' => $valeurmin, ':valeurmax' => $valeurmax, ':piece' => $piece, ':id' => $id, ':idmaison' => $idmaison, ':idcompo' => $idcompo));

header('location: ../html/page_des_composants.php');

?>